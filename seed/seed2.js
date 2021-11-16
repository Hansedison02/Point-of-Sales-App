const mongoose = require('mongoose');
const product1 = require('../models/ARProduct');

const ARProduct = require('../models/ARProduct')
const Product = require("../models/products");

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const ARProducts = [
    new Product({
        id: 'RF0006',
        imagePath: '../../Assets/Mosin%20Nagant.png',
        name: 'Mosin Nagant',
        modelType: 'Rifle',
        price: 212,
        detail: 'Remember the Finland special Force White Death? He used this gun for victory.',
        urlink: 'MNDetail.ejs'
    })
]

let done = 0;
for (let i = 0; i < ARProducts.length; i++) {
    ARProducts[i].save((err, res) => {
        done++;
        if(done === product1.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}