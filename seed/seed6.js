const mongoose = require('mongoose');
const product3 = require('../models/HGProduct');

const HGProduct = require('../models/HGProduct')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const HGProducts = [
    new HGProduct({
        id: 'HG0001',
        imagePath: '../../Assets/FNX-TAC45.png',
        name: 'FN X TAC-45',
        modelType: 'Handgun',
        price: 175,
        detail: 'Common handgun in the Battlefield with reliable accuracy.',
        urlink: '/Product/HG0001'
    }),
    new HGProduct({
        id: 'HG0002',
        imagePath: '../../Assets/FN-BHP3.png',
        name: 'FN Browning Hi-Power Mk.3',
        modelType: 'Handgun',
        price: 211,
        detail: 'One of the first suitable handgun for laser sight equipment.',
        urlink: '/Product/HG0002'
    }),
    new HGProduct({
        id: 'HG0003',
        imagePath: '../../Assets/G18C.png',
        name: 'Glock 18C',
        modelType: 'Handgun',
        price: 99,
        detail: 'A quick Automatic Handgun for Beginners.',
        urlink: '/Product/HG0003'
    }),
    new HGProduct({
        id: 'HG0004',
        imagePath: '../../Assets/G17.png',
        name: 'Glock 17',
        modelType: 'Handgun',
        price: 235,
        detail: 'A stable powerful common Handgun for Personal Defense.',
        urlink: '/Product/HG0004'
    }),
    new HGProduct({
        id: 'HG0005',
        imagePath: '../../Assets/H&KVP9.png',
        name: 'Heckler & Koch VP9',
        modelType: 'Handgun',
        price: 135,
        detail: 'A very reliable Personal Defense Handgun.',
        urlink: '/Product/HG0005'
    })
]

let done = 0;
for (let i = 0; i < HGProducts.length; i++) {
    HGProducts[i].save((err, res) => {
        done++;
        if(done === product3.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}