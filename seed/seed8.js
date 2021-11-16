const mongoose = require('mongoose');
const product4 = require('../models/SMGProduct');

const SMGProduct = require('../models/SMGProduct')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const SMGProducts = [
    new SMGProduct({
        id: 'MG0001',
        imagePath: '../../Assets/H&KMP5.png',
        name: 'Heckler & Koch MP5',
        modelType: 'Sub-Machine Gun',
        price: 221,
        detail: 'Perfect Sub-Machine Gun for Indoor DeathMatch.',
        urlink: '/Product/MG0001'
    }),
    new SMGProduct({
        id: 'MG0002',
        imagePath: '../../Assets/H&KUMP.png',
        name: 'Heckler & Koch UMP',
        modelType: 'Sub-Machine Gun',
        price: 180,
        detail: 'Newer but less strong than the MP5, for PDW.',
        urlink: '/Product/MG0002'
    }),
    new SMGProduct({
        id: 'MG0003',
        imagePath: '../../Assets/H&KMP7.png',
        name: 'Heckler & Koch MP7',
        modelType: 'Sub-Machine Gun',
        price: 241,
        detail: 'Machine Gun with less weight than it\'s ancestor, for PDW.',
        urlink: '/Product/MG0003'
    }),
    new SMGProduct({
        id: 'MG0004',
        imagePath: '../../Assets/FNP90.png',
        name: 'FN P-90',
        modelType: 'Sub-Machine Gun',
        price: 325,
        detail: 'Been around in the Asian market but limited due to licensing issues.',
        urlink: '/Product/MG0004'
    }),
    new SMGProduct({
        iid: 'MG0005',
        imagePath: '../../Assets/CZSEVO3.png',
        name: 'CZ Scorpion Evo-3 A1',
        modelType: 'Sub-Machine Gun',
        price: 450,
        detail: 'Experience the EVO 3 Like a real gun. Equipped with BET Carbine.',
        urlink: '/Product/MG0005'
    })
]

let done = 0;
for (let i = 0; i < SMGProducts.length; i++) {
    SMGProducts[i].save((err, res) => {
        done++;
        if(done === product4.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}