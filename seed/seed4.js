const mongoose = require('mongoose');
const product2 = require('../models/ARProduct');

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
        id: 'AR0006',
        imagePath: '../../Assets/AK103.png',
        name: 'AK-103',
        modelType: 'Assault Rifle',
        price: 232,
        detail: 'Different feels of using AK.',
        urlink: '/Product/AR0006'
    }),
    new ARProduct({
        id: 'AR0007',
        imagePath: '../../Assets/HT64.png',
        name: 'Howa Type-64',
        modelType: 'Assault Rifle',
        price: 355,
        detail: 'Replica of AR used by JSDF since Cold War.',
        urlink: '/Product/AR0007'
    }),
    new ARProduct({
        id: 'AR0008',
        imagePath: '../../Assets/HT89.png',
        name: 'Howa Type-89',
        modelType: 'Assault Rifle',
        price: 455,
        detail: 'Type-64 Successor made for JSDF used since Iraq.',
        urlink: '/Product/AR0008'
    }),
    new ARProduct({
        id: 'AR0009',
        imagePath: '../../Assets/HT20.png',
        name: 'Howa Type-20',
        modelType: 'Assault Rifle',
        price: 611,
        detail: 'The newest version of Howa Assault Rifle.',
        urlink: '/Product/AR0009'
    }),
    new ARProduct({
        id: 'AR0010',
        imagePath: '../../Assets/FNSCAR.png',
        name: 'FN-SCAR',
        modelType: 'Assault Rifle',
        price: 349,
        detail: 'USS Navy Seal standard High caliber Assault Rifle.',
        urlink: '/Product/AR0010'
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