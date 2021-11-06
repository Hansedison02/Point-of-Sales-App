const express = require('express');

const app = express();

app.use(express.static('public'));

app.set('view engine', 'ejs');



app.listen('3000', ()=> {
    console.log('Server is running on port 3000')
})

app.get('/', function (req, res) {
    res.render('pages/index');
});

