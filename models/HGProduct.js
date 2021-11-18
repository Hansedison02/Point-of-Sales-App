const mongoose = require('mongoose')

const productSchema = mongoose.Schema({
    id: {
        type: String,
        required: true
    },
    imagePath: {
        type: String,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    modelType: {
        type: String,
        required: true
    },
    price: {
        type: Number,
        required:true
    },
    detail: {
        type: String,
        required: true
    },
    urlink: {
        type: String,
        required: true
    },
    stock: {
        type: Number,
        required: true
    }
});

module.exports = mongoose.model('HGProduct', productSchema, 'HGProducts')