const mongoose = require('mongoose');
const product1 = require('../models/ARProduct');

const ARProduct = require('../models/ARProduct')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const ARProducts = [
    new ARProduct({
        id: 'RF0001',
        imagePath: '../../Assets/EMK3.png',
        name: 'Enfield Mk-3',
        modelType: 'Rifle',
        price: 121,
        detail: 'A replica of the rifle used by British Forces during WW2.',
        urlink: '/'
    }),
    new ARProduct({
        id: 'RF0002',
        imagePath: '../../Assets/FR%20F2.png',
        name: 'FR-F2',
        modelType: 'Sniper Rifle',
        price: 231,
        detail: 'Used by French snipers, Awesome stability and high FPS.',
        urlink: 'FRF2Detail.ejs'
    }),
    new ARProduct({
        id: 'RF0003',
        imagePath: '../../Assets/Krag-Jorgensen.png',
        name: 'Krag-Jørgensen',
        modelType: 'Rifle',
        price: 255,
        detail: 'A rifle known for its lightweight and fits for user with light body.',
        urlink: 'KJDetail.ejs'
    }),
    new ARProduct({
        id: 'RF0004',
        imagePath: '../../Assets/A38.png',
        name: 'Arisaka Type-38',
        modelType: 'Rifle',
        price: 220,
        detail: 'Used by WW2 Japanese soldiers, famous and deadly.',
        urlink: '/RProduct/Arisaka38'
    }),
    new ARProduct({
        id: 'RF0005',
        imagePath: '../../Assets/M110K1.png',
        name: 'M110-K1',
        modelType: 'Sniper Rifle',
        price: 255,
        detail: 'American nowadays favorite Sniper Rifle. High accuracy and showcased at RE:Village.',
        urlink: 'M110K1Detail.ejs'
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