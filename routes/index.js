const express = require('express')
const Product = require('../models/products')
const Product1 = require('../models/ARProduct')
const router = express.Router()

router.get('/', async (req, res) => {
    res.render('pages/index')
})
router.get(('/Product'), async (req, res) => {
    res.render('pages/Product')
})
router.get(('/HGProduct'), async (req, res) => {
    res.render('layouts/HGProduct')
})
router.get(('/SMGProduct'), async (req, res) => {
    res.render('pages/SMGProduct')
})
router.get(('/ARProduct'), async (req, res) => {
    res.render('layouts/ARProduct')
})
router.get(('/RProduct'), async (req, res) => {
    const data = await Product.find();
    const data1 = await Product1.find();
    res.render('pages/RProduct', {products: data, ARProducts: data1})
})
router.get(('/RProduct/Arisaka38'), async (req, res) => {
    res.render('pages/a38detail')
})

router.get(('/Order'), (req, res) => {
    res.render('pages/Order')
})

router.get(('/about'), (req, res) => {
    res.render('pages/about')
})
router.get(('/Stock'), (req, res) => {
    res.render('pages/Stock')
})
router.get(('/History'), (req, res) => {
    res.render('pages/History')
})
router.get(('/Report'), (req, res) => {
    res.render('pages/Report')
})


module.exports = router;