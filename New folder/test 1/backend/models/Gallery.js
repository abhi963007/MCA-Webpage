const mongoose = require('mongoose');

const gallerySchema = new mongoose.Schema({
    title: String,
    url: {
        type: String,
        required: true
    },
    description: String,
    category: String,
    createdAt: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model('Gallery', gallerySchema); 