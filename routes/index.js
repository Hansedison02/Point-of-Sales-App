const express = require('express')

const router = express.Router()

router.get('/', async (req, res) => {
    res.render('pages/index')
})

router.get(('/HGProduct'), async (req, res) => {
    res.render('pages/HGProduct')
})

router.get(('/Order'), (req, res) => {
    res.render('pages/Order')
})

router.get(('/about'), (req, res) => {
    res.render('pages/about')
})

module.exports = router;