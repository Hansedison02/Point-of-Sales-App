const express = require('express');
const app = express();
const path = require('path');



// Setting EJS as templating engine
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.listen(3000, () => {
    console.log("APP IS LISTENING ON PORT 3000!")
});


app.use(express.static(path.join(__dirname, 'public')));

app.get('/', (req, res) => {
    res.render('index', {  })
});

app.get('/index', (req, res) => {
    res.render('index', {  })
});

app.get('/ARProduct', (req, res) => {
    res.render('ARProduct', {  })
});

app.get('/SMGProduct', (req, res) => {
    res.render('SMGProduct', {  })
});

app.get('/A38Detail', (req, res) => {
    res.render('A38Detail', {  })
});

app.get('/About', (req, res) => {
    res.render('About', {  })
});


app.get('/AK47Detail', (req, res) => {
    res.render('AK47Detail', {  })
});

app.get('/AK103Detail', (req, res) => {
    res.render('AK103Detail', {  })
});

app.get('/B92FSDetail', (req, res) => {
    res.render('B92FSDetail', {  })
});

app.get('/CZSEVO3Detail', (req, res) => {
    res.render('CZSEVO3Detail', {  })
});
app.get('/EMK3Detail', (req, res) => {
    res.render('EMK3Detail', {  })
});
app.get('/FAMASDetail', (req, res) => {
    res.render('FAMASDetail', {  })
});
app.get('/FNBHP3Detail', (req, res) => {
    res.render('FNBHP3Detail', {  })
});
app.get('/FNP90Detail', (req, res) => {
    res.render('FNP90Detail', {  })
});
app.get('/FNSCARDetail', (req, res) => {
    res.render('FNSCARDetail', {  })
});
app.get('/FNXDetail', (req, res) => {
    res.render('FNXDetail', {  })
});
app.get('/FRF2Detail', (req, res) => {
    res.render('FRF2Detail', {  })
});
app.get('/G18CDetail', (req, res) => {
    res.render('G18CDetail', {  })
});
app.get('/HGProduct', (req, res) => {
    res.render('HGProduct', {  })
});
app.get('/History', (req, res) => {
    res.render('History', {  })
});
app.get('/HK416Detail', (req, res) => {
    res.render('HK416Detail', {  })
});
app.get('/HKG36Detail', (req, res) => {
    res.render('HKG36Detail', {  })
});
app.get('/HKMP5Detail', (req, res) => {
    res.render('HKMP5Detail', {  })
});

app.get('/HKMP7Detail', (req, res) => {
    res.render('HKMP7Detail', {  })
});

app.get('/HKUMPDetail', (req, res) => {
    res.render('HKUMPDetail', {  })
});

app.get('/HKUSPDetail', (req, res) => {
    res.render('HKUSPDetail', {  })
});

app.get('/HT20Detail', (req, res) => {
    res.render('HT20Detail', {  })
});

app.get('/HT64Detail', (req, res) => {
    res.render('HT64Detail', {  })
});

app.get('/HT89Detail', (req, res) => {
    res.render('HT89Detail', {  })
});

app.get('/KJDetail', (req, res) => {
    res.render('KJDetail', {  })
});

app.get('/KSVDDetail', (req, res) => {
    res.render('KSVDDetail', {  })
});
app.get('/KVDetail', (req, res) => {
    res.render('KVDetail', {  })
});

app.get('/M14Detail', (req, res) => {
    res.render('M14Detail', {  })
});

app.get('/M110K1Detail', (req, res) => {
    res.render('M110K1Detail', {  })
});
app.get('/MNDetail', (req, res) => {
    res.render('MNDetail', {  })
});

app.get('/MP40Detail', (req, res) => {
    res.render('MP40Detail', {  })
});

app.get('/Order', (req, res) => {
    res.render('Order', {  })
});

app.get('/Report', (req, res) => {
    res.render('Report', {  })
});

app.get('/RProduct', (req, res) => {
    res.render('RProduct', {  })
});

app.get('/SIG550Detail', (req, res) => {
    res.render('SIG550Detail', {  })
});
app.get('/SMGProduct', (req, res) => {
    res.render('SMGProduct', {  })
});

app.get('/SSMCXVDetail', (req, res) => {
    res.render('SSMCXVDetail', {  })
});

app.get('/Stock', (req, res) => {
    res.render('Stock', {  })
});

app.get('/TPT99Detail', (req, res) => {
    res.render('TPT99Detail', {  })
});