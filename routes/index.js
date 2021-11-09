const express = require('express')

const router = express.Router()

router.get('/', async (req, res) => {
    res.render('pages/index')
})

router.get(('/HGProduct'), async (req, res) => {
    res.render('pages/HGProduct')
})
router.get(('/SMGProduct'), async (req, res) => {
    res.render('pages/SMGProduct')
})
router.get(('/ARProduct'), async (req, res) => {
    res.render('pages/ARProduct')
})
router.get(('/RProduct'), async (req, res) => {
    res.render('pages/RProduct')
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

module.exports = router;