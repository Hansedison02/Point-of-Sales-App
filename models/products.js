const mongoose = require('mongoose')

const productSchema = mongoose.Schema({

    imagePath: {
        type: String,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    type: {
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
    }
});

module.exports = mongoose.model('Product', productSchema, 'products')