const mongoose = require('mongoose')

const productSchema = mongoose.Schema({
    cid: {
        type: String,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    mid: {
        type: String,
        required: true
    },
   date: {
        type: Date,
        required: true
    },
    qty: {
        type: Number,
        required: true
    }
});

module.exports = mongoose.model('Customer', productSchema, 'Customers')