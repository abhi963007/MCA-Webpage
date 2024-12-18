const express = require('express');
const router = express.Router();
const multer = require('multer');
const { authenticateToken } = require('../middleware/auth');
const Gallery = require('../models/Gallery');

// Configure multer for image uploads
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'uploads/gallery');
    },
    filename: (req, file, cb) => {
        const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1E9);
        cb(null, uniqueSuffix + '-' + file.originalname);
    }
});

const upload = multer({ 
    storage,
    fileFilter: (req, file, cb) => {
        if (file.mimetype.startsWith('image/')) {
            cb(null, true);
        } else {
            cb(new Error('Not an image! Please upload an image.'), false);
        }
    }
});

// Get all gallery images
router.get('/', authenticateToken, async (req, res) => {
    try {
        const images = await Gallery.find().sort('-createdAt');
        res.json(images);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Upload images
router.post('/upload', authenticateToken, upload.array('images', 10), async (req, res) => {
    try {
        const uploadedImages = req.files.map(file => ({
            url: `/uploads/gallery/${file.filename}`,
            title: file.originalname
        }));

        const images = await Gallery.insertMany(uploadedImages);
        res.status(201).json(images);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Delete image
router.delete('/:id', authenticateToken, async (req, res) => {
    try {
        const image = await Gallery.findByIdAndDelete(req.params.id);
        if (!image) {
            return res.status(404).json({ error: 'Image not found' });
        }
        // You might want to also delete the physical file here
        res.json({ message: 'Image deleted successfully' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

module.exports = router; 