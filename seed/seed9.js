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
        id: 'MG0006',
        imagePath: '../../Assets/MP40.png',
        name: 'MP-40',
        modelType: 'Sub-Machine Gun',
        price: 300,
        detail: 'The realistic replica of the famous WW2 SMG made by Umarex.',
        urlink: '/Product/MG0006'
    }),
    new SMGProduct({
        id: 'MG0007',
        imagePath: '../../Assets/KrissSVD.png',
        name: 'Kriss SVD',
        modelType: 'Sub-Machine Gun',
        price: 255,
        detail: 'This flexible lightweight Sub-Machine Gun also made us easier to Dash.',
        urlink: '/Product/MG0007'
    }),
    new SMGProduct({
        id: 'MG0008',
        imagePath: '../../Assets/KrissV.png',
        name: 'Kriss Vector',
        modelType: 'Sub-Machine Gun',
        price: 355,
        detail: 'Improvement of Kriss SVD Sub-Machine Gun.',
        urlink: '/Product/MG0008'
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