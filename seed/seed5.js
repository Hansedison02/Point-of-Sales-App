const mongoose = require('mongoose');
const product2 = require('../models/ARProduct');

const ARProduct = require('../models/ARProduct')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Seeding process!')
    }
})

const ARProducts = [
    new ARProduct({
        id: 'AR0011',
        imagePath: '../../Assets/H&K416.png',
        name: 'Heckler & Koch HK-416',
        modelType: 'Assault Rifle',
        price: 288,
        detail: 'Powerful as the original Assault Rifle with outstanding BB capacity.',
        urlink: '/Product/AR0011'
    }),
    new ARProduct({
        id: 'AR0012',
        imagePath: '../../Assets/H&KG36.png',
        name: 'Heckler & Koch G-36',
        modelType: 'Assault Rifle',
        price: 325,
        detail: 'Tired of using the 416 and having more funds? Try this out.',
        urlink: '/Product/AR0012'
    })
]

let done = 0;
for (let i = 0; i < ARProducts.length; i++) {
    ARProducts[i].save((err, res) => {
        done++;
        if(done === product2.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}