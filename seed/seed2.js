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
        id: 'RF0006',
        imagePath: '../../Assets/Mosin%20Nagant.png',
        name: 'Mosin Nagant',
        modelType: 'Rifle',
        price: 212,
        detail: 'Remember the Finland special Force White Death? He used this gun for victory.',
        urlink: '/Product/RF0006'
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