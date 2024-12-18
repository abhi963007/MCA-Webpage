const express = require('express');
const router = express.Router();
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const multer = require('multer');
const { authenticateToken, authorizeRole } = require('../middleware/auth');
const User = require('../models/User');
const Faculty = require('../models/Faculty');
const ActivityLog = require('../models/ActivityLog');

// Configure multer for file uploads
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'uploads/');
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + '-' + file.originalname);
    }
});
const upload = multer({ storage });

// Authentication
router.post('/login', async (req, res) => {
    try {
        console.log('Login attempt:', req.body);
        const { username, password } = req.body;
        const user = await User.findOne({ username });

        if (!user) {
            console.log('User not found:', username);
            return res.status(400).json({ error: 'User not found' });
        }

        const validPassword = await bcrypt.compare(password, user.password);
        if (!validPassword) {
            console.log('Invalid password for user:', username);
            return res.status(400).json({ error: 'Invalid password' });
        }

        console.log('Login successful for user:', username);
        const token = jwt.sign(
            { id: user._id, role: user.role },
            process.env.JWT_SECRET
        );

        res.json({ token });
    } catch (error) {
        console.error('Login error:', error);
        res.status(500).json({ error: error.message });
    }
});

// Faculty Management
router.get('/faculty', authenticateToken, async (req, res) => {
    try {
        const faculty = await Faculty.find();
        res.json(faculty);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

router.post('/faculty', authenticateToken, authorizeRole('admin'), upload.single('image'), async (req, res) => {
    try {
        const facultyData = {
            ...req.body,
            image: req.file ? `/uploads/${req.file.filename}` : undefined
        };
        const faculty = new Faculty(facultyData);
        await faculty.save();
        res.json(faculty);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Activity Logging
router.post('/activity-log', authenticateToken, async (req, res) => {
    try {
        const log = new ActivityLog({
            user: req.user.id,
            action: req.body.action,
            timestamp: req.body.timestamp
        });
        await log.save();
        res.json(log);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Dashboard Stats
router.get('/dashboard-stats', authenticateToken, async (req, res) => {
    try {
        const stats = {
            facultyCount: await Faculty.countDocuments(),
            courseCount: 6, // Replace with actual course count
            eventCount: 0 // We'll update this when we add the Event model
        };
        res.json(stats);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Temporary route to create first admin user
router.post('/setup', async (req, res) => {
    try {
        const salt = await bcrypt.genSalt(10);
        const hashedPassword = await bcrypt.hash('newpassword123', salt);
        
        const admin = new User({
            username: 'newadmin',
            password: hashedPassword,
            role: 'admin'
        });
        
        await admin.save();
        res.json({ message: 'Admin user created successfully' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

module.exports = router; 