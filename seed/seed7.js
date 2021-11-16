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
        id: 'HG0006',
        imagePath: '../../Assets/H&KUSP.png',
        name: 'Heckler & Koch USP',
        modelType: 'Handgun',
        price: 155,
        detail: 'An Elite handgun usable for Elite Spec-Ops.',
        urlink: '/Product/HG0006'
    }),
    new HGProduct({
        id: 'HG0007',
        imagePath: '../../Assets/B92FS.png',
        name: 'Baretta 92-FS "Samurai Edge',
        modelType: 'Handgun',
        price: 259,
        detail: 'For those who liked Resident Evil Series.',
        urlink: '/Product/HG0007'
    }),
    new HGProduct({
        id: 'HG0008',
        imagePath: '../../Assets/TPT99.png',
        name: 'Taurus PT-99',
        modelType: 'Handgun',
        price: 235,
        detail: 'Handgun with an awesome stability, for those who liked rapid battles.',
        urlink: '/Product/HG0008'
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