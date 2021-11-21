const express = require('express')
const Product1 = require('../models/RProduct')
const Product2 = require('../models/ARProduct')
const Product3 = require('../models/SMGProduct')
const Product4 = require('../models/HGProduct')
const Customer = require('../models/Customer')
const { data } = require('jquery');
const customer = require('../models/Customer');

const router = express.Router()

router.get('/', async (req, res) => {
    res.render('pages/index')
})
router.get(('/Product'), async (req, res) => {
    const data1 = await Product1.find();
    const data2 = await Product2.find();
    const data3 = await Product3.find();
    const data4 = await Product4.find();
    res.render('pages/Product', {RProducts: data1, ARProducts: data2, SMGProducts: data3, HGProducts: data4})
})
router.get(('/Product/RF0001'), async (req, res) => {
    res.render('pages/EMK3Detail')
})
router.get(('/Product/RF0002'), async (req, res) => {
    res.render('pages/FRF2Detail')
})
router.get(('/Product/RF0003'), async (req, res) => {
    res.render('pages/KJDetail')
})
router.get(('/Product/RF0004'), async (req, res) => {
    res.render('pages/a38detail')
})
router.get(('/Product/RF0005'), async (req, res) => {
    res.render('pages/M110K1Detail')
})
router.get(('/Product/RF0006'), async (req, res) => {
    res.render('pages/MNDetail')
})
router.get(('/Product/MG0001'), async (req, res) => {
    res.render('pages/HKMP5Detail')
})
router.get(('/Product/MG0002'), async (req, res) => {
    res.render('pages/HKUMPDetail')
})
router.get(('/Product/MG0003'), async (req, res) => {
    res.render('pages/HKMP7Detail')
})
router.get(('/Product/MG0004'), async (req, res) => {
    res.render('pages/FNP90Detail')
})
router.get(('/Product/MG0005'), async (req, res) => {
    res.render('pages/CZSEVO3Detail')
})
router.get(('/Product/MG0006'), async (req, res) => {
    res.render('pages/MP40Detail')
})
router.get(('/Product/MG0007'), async (req, res) => {
    res.render('pages/KSVDDetail')
})
router.get(('/Product/MG0008'), async (req, res) => {
    res.render('pages/KVDetail')
})
router.get(('/Product/HG0001'), async (req, res) => {
    res.render('pages/FNXDetail')
})
router.get(('/Product/HG0002'), async (req, res) => {
    res.render('pages/FNBHP3Detail')
})
router.get(('/Product/HG0003'), async (req, res) => {
    res.render('pages/G18CDetail')
})
router.get(('/Product/HG0004'), async (req, res) => {
    res.render('pages/G17Detail')
})
router.get(('/Product/HG0005'), async (req, res) => {
    res.render('pages/HKVP9Detail')
})
router.get(('/Product/HG0006'), async (req, res) => {
    res.render('pages/HKUSPDetail')
})
router.get(('/Product/HG0007'), async (req, res) => {
    res.render('pages/B92FSDetail')
})
router.get(('/Product/HG0008'), async (req, res) => {
    res.render('pages/TPT99Detail')
})
router.get(('/Product/AR0001'), async (req, res) => {
    res.render('pages/M14Detail')
})
router.get(('/Product/AR0002'), async (req, res) => {
    res.render('pages/FAMASDetail')
})
router.get(('/Product/AR0003'), async (req, res) => {
    res.render('pages/SSMCXVDetail')
})
router.get(('/Product/AR0004'), async (req, res) => {
    res.render('pages/SIG550Detail')
})
router.get(('/Product/AR0005'), async (req, res) => {
    res.render('pages/AK47Detail')
})
router.get(('/Product/AR0006'), async (req, res) => {
    res.render('pages/AK103Detail')
})
router.get(('/Product/AR0007'), async (req, res) => {
    res.render('pages/HT64Detail')
})
router.get(('/Product/AR0008'), async (req, res) => {
    res.render('pages/HT89Detail')
})
router.get(('/Product/AR0009'), async (req, res) => {
    res.render('pages/HT20Detail')
})
router.get(('/Product/AR0010'), async (req, res) => {
    res.render('pages/FNSCARDetail')
})
router.get(('/Product/AR0011'), async (req, res) => {
    res.render('pages/HK416Detail')
})
router.get(('/Product/AR0012'), async (req, res) => {
    res.render('pages/HKG36Detail')
})
router.get(('/Product/Order'), async (req, res) => {
    res.render('pages/Order')
})


router.get(('/Order'), async(req, res) => {
    res.render('pages/Order')
})

router.get(('/about'), async(req, res) => {
    res.render('pages/about')
})
router.get(('/Stock'), async(req, res) => {
    const data1 = await Product1.find();
    const data2 = await Product2.find();
    const data3 = await Product3.find();
    const data4 = await Product4.find();
    res.render('pages/Stock', {RProducts: data1, ARProducts: data2, SMGProducts: data3, HGProducts: data4})
})
router.get(('/History'), async(req, res) => {
    const data = await Customer.find();
    res.render('pages/History', {Customers: data})
})
router.get(('/Report'), async(req, res) => {
    const data1 = await Product1.find();
    const data2 = await Product2.find();
    const data3 = await Product3.find();
    const data4 = await Product4.find();
    res.render('pages/Report', {RProducts: data1, ARProducts: data2, SMGProducts: data3, HGProducts: data4})
})
router.post('/Report', async(req,res) => {
    const mid = req.body.mid;
    const date = req.body.date;
    const cid = req.body.cid;
    const name = req.body.name;
    const qty = req.body.qty;

   const customers = new Customer ({
       cid: cid,
       name: name,
       mid: mid,
       date: date,
       qty: qty
   })
     await customers.save((err, res) => {
            if (err) console.error(err);
            else {
                console.log('Successful Input');
            }
        })
        req.session.submit = true;
        res.redirect('/History');
    })


module.exports = router;