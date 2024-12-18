const mongoose = require('mongoose');

const eventSchema = new mongoose.Schema({
    title: {
        type: String,
        required: true
    },
    description: String,
    date: {
        type: Date,
        required: true
    },
    venue: String,
    image: String,
    type: {
        type: String,
        enum: ['workshop', 'seminar', 'conference', 'other']
    },
    registrationLink: String,
    isActive: {
        type: Boolean,
        default: true
    },
    createdAt: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model('Event', eventSchema); 