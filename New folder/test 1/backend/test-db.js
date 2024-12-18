const mongoose = require('mongoose');
require('dotenv').config();

async function testConnection() {
    try {
        await mongoose.connect(process.env.MONGODB_URI, {
            serverSelectionTimeoutMS: 5000, // Timeout after 5s instead of 30s
        });
        console.log('Successfully connected to MongoDB.');
        
        // Test creating a collection
        const testCollection = mongoose.connection.collection('test');
        await testCollection.insertOne({ test: 'data' });
        console.log('Successfully wrote to database.');
        
        // Clean up
        await testCollection.drop();
        await mongoose.connection.close();
        console.log('Test completed successfully.');
    } catch (error) {
        console.error('MongoDB connection test failed:', error);
        console.error('Error details:', error.message);
        if (error.name === 'MongoServerSelectionError') {
            console.log('Please make sure MongoDB server is running.');
        }
    }
}

testConnection(); 