const mongoose = require('mongoose');
const product1 = require('../models/RProduct');

const RProduct = require('../models/RProduct')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const RProducts = [
    new RProduct({
        id: 'RF0001',
        imagePath: './public/Assets/EMK3.png',
        name: 'Enfield Mk-3',
        modelType: 'Rifle',
        price: 121,
        detail: 'A replica of the rifle used by British Forces during WW2.',
        urlink: '/Product/RF0001'
    }),
    new RProduct({
        id: 'RF0002',
        imagePath: './public/Assets/FRF2.png',
        name: 'FR-F2',
        modelType: 'Sniper Rifle',
        price: 231,
        detail: 'Used by French snipers, Awesome stability and high FPS.',
        urlink: '/Product/RF0002'
    }),
    new RProduct({
        id: 'RF0003',
        imagePath: './public/Assets/Krag-Jorgensen.png',
        name: 'Krag-Jørgensen',
        modelType: 'Rifle',
        price: 255,
        detail: 'A rifle known for its lightweight and fits for user with light body.',
        urlink: '/Product/RF0003'
    }),
    new RProduct({
        id: 'RF0004',
        imagePath: './public/Assets/A38.png',
        name: 'Arisaka Type-38',
        modelType: 'Rifle',
        price: 220,
        detail: 'Used by WW2 Japanese soldiers, famous and deadly.',
        urlink: '/Product/RF0004'
    }),
    new RProduct({
        id: 'RF0005',
        imagePath: './public/Assets/M110K1.png',
        name: 'M110-K1',
        modelType: 'Sniper Rifle',
        price: 255,
        detail: 'American nowadays favorite Sniper Rifle. High accuracy and showcased at RE:Village.',
        urlink: '/Product/RF0005'
    })
]

let done = 0;
for (let i = 0; i < RProducts.length; i++) {
    RProducts[i].save((err, res) => {
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