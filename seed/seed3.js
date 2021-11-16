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
        id: 'AR0001',
        imagePath: '../../Assets/M14.png',
        name: 'USS M14',
        modelType: 'Battle Rifle',
        price: 188,
        detail: 'An excellent Battle Rifle for Desert Skirmish.',
        urlink: '/Product/AR0001'
    }),
    new ARProduct({
        id: 'AR0002',
        imagePath: '../../Assets/FAMAS.png',
        name: 'FAMAS',
        modelType: 'Assault Rifle',
        price: 260,
        detail: 'High FPS and Suitable for Indoor Skirmishes.',
        urlink: '/Product/AR0002'
    }),
    new ARProduct({
        id: 'AR0003',
        imagePath: '../../Assets/SSMCXV.png',
        name: 'SIG Sauer MCX Virtus SBR',
        modelType: 'Assault Rifle',
        price: 500,
        detail: 'Deadly Assault Rifle for Skirmishes.',
        urlink: '/Product/AR0003'
    }),
    new ARProduct({
        id: 'AR0004',
        imagePath: '../../Assets/SIG%20550.png',
        name: 'SIG SG-550',
        modelType: 'Assault Rifle',
        price: 350,
        detail: 'Build with higher suppression.',
        urlink: '/Product/AR0004'
    }),
    new ARProduct({
        id: 'AR0005',
        imagePath: '../../Assets/AK-47%20Mini%20Draco%20Full%20Upgrade.png',
        name: 'AK-47 Mini Draco Full Upgrade',
        modelType: 'Assault Rifle',
        price: 255,
        detail: 'Awesome stability for Sparring.',
        urlink: '/Product/AR0005'
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