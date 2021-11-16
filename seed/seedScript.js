const mongoose = require('mongoose');
const product = require('../models/products');

const Product = require('../models/products')

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority&ssl=true'), (err, res) => {
    if (err) {
        console.error(err);
    }
    else {
        console.log('Database terhubung untuk proses seeding!')
    }
})

const products = [
    new Product({
        id: 'RF0001',
        imagePath: '../../Assets/EMK3.png',
        name: 'Enfield Mk-3',
        modelType: 'Rifle',
        price: 121,
        detail: 'A replica of the rifle used by British Forces during WW2.',
        urlink: 'EMK3Detail.ejs'
    }),
    new Product({
        id: 'RF0002',
        imagePath: '../../Assets/FR%20F2.png',
        name: 'FR-F2',
        modelType: 'Sniper Rifle',
        price: 231,
        detail: 'Used by French snipers, Awesome stability and high FPS.',
        urlink: 'FRF2Detail.ejs'
    }),
    new Product({
        id: 'RF0003',
        imagePath: '../../Assets/Krag-Jorgensen.png',
        name: 'Krag-Jørgensen',
        modelType: 'Rifle',
        price: 255,
        detail: 'A rifle known for its lightweight and fits for user with light body.',
        urlink: 'KJDetail.ejs'
    }),
    new Product({
        id: 'RF0004',
        imagePath: '../../Assets/A38.png',
        name: 'Arisaka Type-38',
        modelType: 'Rifle',
        price: 220,
        detail: 'Used by WW2 Japanese soldiers, famous and deadly.',
        urlink: '/RProduct/Arisaka38'
    }),
    new Product({
        id: 'RF0005',
        imagePath: '../../Assets/M110K1.png',
        name: 'M110-K1',
        modelType: 'Sniper Rifle',
        price: 255,
        detail: 'American nowadays favorite Sniper Rifle. High accuracy and showcased at RE:Village.',
        urlink: 'M110K1Detail.ejs'
    }),
    new Product({
        id: 'RF0006',
        imagePath: '../../Assets/Mosin%20Nagant.png',
        name: 'Mosin Nagant',
        modelType: 'Rifle',
        price: 212,
        detail: 'Remember the Finland special Force White Death? He used this gun for victory.',
        urlink: 'MNDetail.ejs'
    }),
    new Product({
        id: 'MG0001',
        imagePath: '../../Assets/H&KMP5.png',
        name: 'Heckler & Koch MP5',
        modelType: 'Sub-Machine Gun',
        price: 221,
        detail: 'Perfect Sub-Machine Gun for Indoor DeathMatch.',
        urlink: 'HKMP5Detail.ejs'
    }),
    new Product({
        id: 'MG0002',
        imagePath: '../../Assets/H&KUMP.png',
        name: 'Heckler & Koch UMP',
        modelType: 'Sub-Machine Gun',
        price: 180,
        detail: 'Newer but less strong than the MP5, for PDW.',
        urlink: 'HKUMPDetail.ejs'
    }),
    new Product({
        id: 'MG0003',
        imagePath: '../../Assets/H&KMP7.png',
        name: 'Heckler & Koch MP7',
        modelType: 'Sub-Machine Gun',
        price: 241,
        detail: 'Machine Gun with less weight than it\'s ancestor, for PDW.',
        urlink: 'HKMP7Detail.ejs'
    }),
    new Product({
        id: 'MG0004',
        imagePath: '../../Assets/FNP90.png',
        name: 'FN P-90',
        modelType: 'Sub-Machine Gun',
        price: 325,
        detail: 'Been around in the Asian market but limited due to licensing issues.',
        urlink: 'FNP90Detail.ejs'
    }),
    new Product({
        id: 'MG0005',
        imagePath: '../../Assets/CZSEVO3.png',
        name: 'CZ Scorpion Evo-3 A1',
        modelType: 'Sub-Machine Gun',
        price: 450,
        detail: 'Experience the EVO 3 Like a real gun. Equipped with BET Carbine.',
        urlink: 'CZSEVO3Detail.ejs'
    }),
    new Product({
        id: 'MG0006',
        imagePath: '../../Assets/MP40.png',
        name: 'MP-40',
        modelType: 'Sub-Machine Gun',
        price: 300,
        detail: 'The realistic replica of the famous WW2 SMG made by Umarex.',
        urlink: 'MP40Detail.ejs'
    }),
    new Product({
        id: 'MG0007',
        imagePath: '../../Assets/KrissSVD.png',
        name: 'Kriss SVD',
        modelType: 'Sub-Machine Gun',
        price: 255,
        detail: 'This flexible lightweight Sub-Machine Gun also made us easier to Dash.',
        urlink: 'KSVDDetail.ejs'
    }),
    new Product({
        id: 'MG0008',
        imagePath: '../../Assets/KrissV.png',
        name: 'Kriss Vector',
        modelType: 'Sub-Machine Gun',
        price: 355,
        detail: 'Improvement of Kriss SVD Sub-Machine Gun.',
        urlink: 'KVDetail.ejs'
    }),
    new Product({
        id: 'HG0001',
        imagePath: '../../Assets/FNX-TAC45.png',
        name: 'FN X TAC-45',
        modelType: 'Handgun',
        price: 175,
        detail: 'Common handgun in the Battlefield with reliable accuracy.',
        urlink: 'FNXDetail.ejs'
    }),
    new Product({
        id: 'HG0002',
        imagePath: '../../Assets/FN-BHP3.png',
        name: 'FN Browning Hi-Power Mk.3',
        modelType: 'Handgun',
        price: 211,
        detail: 'One of the first suitable handgun for laser sight equipment.',
        urlink: 'FNBHP3Detail.ejs'
    }),
    new Product({
        id: 'HG0003',
        imagePath: '../../Assets/G18C.png',
        name: 'Glock 18C',
        modelType: 'Handgun',
        price: 99,
        detail: 'A quick Automatic Handgun for Beginners.',
        urlink: 'G18CDetail.ejs'
    }),
    new Product({
        id: '4',
        imagePath: '../../Assets/G17.png',
        name: 'Glock 17',
        modelType: 'Handgun',
        price: 235,
        detail: 'A stable powerful common Handgun.',
        urlink: 'TPT99Detail.ejs'
    }),
    new Product({
        id: 'HG0005',
        imagePath: '../../Assets/H&KVP9.png',
        name: 'Heckler & Koch VP9',
        modelType: 'Handgun',
        price: 135,
        detail: 'A very reliable Personal Defense Handgun.',
        urlink: 'TPT99Detail.ejs'
    }),
    new Product({
        id: 'HG0006',
        imagePath: '../../Assets/H&KUSP.png',
        name: 'Heckler & Koch USP',
        modelType: 'Handgun',
        price: 155,
        detail: 'An Elite handgun usable for Elite Spec-Ops.',
        urlink: 'HKUSPDetail.ejs'
    }),
    new Product({
        id: 'HG0007',
        imagePath: '../../Assets/B92FS.png',
        name: 'Baretta 92-FS "Samurai Edge',
        modelType: 'Handgun',
        price: 259,
        detail: 'For those who liked Resident Evil Series.',
        urlink: 'B92FSDetail.ejs'
    }),
    new Product({
        id: 'HG0008',
        imagePath: '../../Assets/TPT99.png',
        name: 'Taurus PT-99',
        modelType: 'Handgun',
        price: 235,
        detail: 'Handgun with an awesome stability, for those who liked rapid battles.',
        urlink: 'TPT99Detail.ejs'
    }),
    new Product({
        id: 'AR0001',
        imagePath: '../../Assets/M14.png',
        name: 'USS M14',
        modelType: 'Battle Rifle',
        price: 188,
        detail: 'An excellent Battle Rifle for Desert Skirmish.',
        urlink: 'M14Detail.ejs'
    }),
    new Product({
        id: 'AR0002',
        imagePath: '../../Assets/FAMAS.png',
        name: 'FAMAS',
        modelType: 'Assault Rifle',
        price: 260,
        detail: 'High FPS and Suitable for Indoor Skirmishes.',
        urlink: 'FAMASDetail.ejs'
    }),
    new Product({
        id: 'AR0003',
        imagePath: '../../Assets/SSMCXV.png',
        name: 'SIG Sauer MCX Virtus SBR',
        modelType: 'Assault Rifle',
        price: 500,
        detail: 'Deadly Assault Rifle for Skirmishes.',
        urlink: 'SSMCXVDetail.ejs'
    }),
    new Product({
        id: 'AR0004',
        imagePath: '../../Assets/SIG%20550.png',
        name: 'SIG SG-550',
        modelType: 'Assault Rifle',
        price: 350,
        detail: 'Build with higher suppression.',
        urlink: 'SIG550Detail.ejs'
    }),
    new Product({
        id: 'AR0005',
        imagePath: '../../Assets/AK-47%20Mini%20Draco%20Full%20Upgrade.png',
        name: 'AK-47 Mini Draco Full Upgrade',
        modelType: 'Assault Rifle',
        price: 255,
        detail: 'Awesome stability for Sparring.',
        urlink: 'AK47Detail.ejs'
    }),
    new Product({
        id: 'AR0006',
        imagePath: '../../Assets/AK103.png',
        name: 'AK-103',
        modelType: 'Assault Rifle',
        price: 232,
        detail: 'Different feels of using AK.',
        urlink: 'AK103Detail.ejs'
    }),
    new Product({
        id: 'AR0007',
        imagePath: '../../Assets/HT64.png',
        name: 'Howa Type-64',
        modelType: 'Assault Rifle',
        price: 355,
        detail: 'Replica of AR used by JSDF since Cold War.',
        urlink: 'HT64Detail.ejs'
    }),
    new Product({
        id: 'AR0008',
        imagePath: '../../Assets/HT89.png',
        name: 'Howa Type-89',
        modelType: 'Assault Rifle',
        price: 455,
        detail: 'Type-64 Successor made for JSDF used since Iraq.',
        urlink: 'HT89Detail.ejs'
    }),
    new Product({
        id: 'AR0009',
        imagePath: '../../Assets/HT20.png',
        name: 'Howa Type-20',
        modelType: 'Assault Rifle',
        price: 611,
        detail: 'The newest version of Howa Assault Rifle.',
        urlink: 'HT20Detail.ejs'
    }),
    new Product({
        id: 'AR0010',
        imagePath: '../../Assets/FNSCAR.png',
        name: 'FN-SCAR',
        modelType: 'Assault Rifle',
        price: 349,
        detail: 'USS Navy Seal standard High caliber Assault Rifle.',
        urlink: 'FNSCARDetail.ejs'
    }),
    new Product({
        id: 'AR0011',
        imagePath: '../../Assets/H&K416.png',
        name: 'Heckler & Koch HK-416',
        modelType: 'Assault Rifle',
        price: 288,
        detail: 'Powerful as the original Assault Rifle with outstanding BB capacity.',
        urlink: 'HK416Detail.ejs'
    }),
    new Product({
        id: 'AR0012',
        imagePath: '../../Assets/H&KG36.png',
        name: 'Heckler & Koch G-36',
        modelType: 'Assault Rifle',
        price: 325,
        detail: 'Tired of using the 416 and having more funds? Try this out.',
        urlink: 'HKG36Detail.ejs'
    })
]

let done = 0;
for (let i = 0; i < products.length; i++) {
    products[i].save((err, res) => {
        done++;
        if(done === product.length) {
            console.log('Berhasil tersimpan!');
            exit();
        }
    })
}

function exit() {
    mongoose.disconnect();
}