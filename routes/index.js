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