const mongoose = require('mongoose');
const customer = require('../models/Customer');

const Customer = require('../models/Customer')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const Customers = [
    new Customer({
        cid: 'CO0001',
        name: 'Takahashi Sora',
        mid: 'MG0001',
        date: "2018-11-10",
        qty: 1
    }),
    new Customer({
        cid: 'CO0002',
        name: 'Nicholas Sean',
        mid: 'AR0010',
        date: "2019-01-18",
        qty: 4
    }),
    new Customer({
        cid: 'CO0003',
        name: 'Kojima Hideo',
        mid: 'AR0011',
        date: "2019-11-08",
        qty: 2
    }),
    new Customer({
        cid: 'CO0004',
        name: 'Tessou Tsuduri',
        mid: 'AR0009',
        date: "2020-10-19",
        qty: 4
    }),
    new Customer({
        cid: 'CO0005',
        name: 'John Smith',
        mid: 'RF0003',
        date: "2021-03-29",
        qty: 1
    })
]

let done = 0;
for (let i = 0; i < Customers.length; i++) {
    Customers[i].save((err, res) => {
        done++;
        if(done === customer.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}