const express = require('express');

const app = express();

app.use(express.static('public'))

app.set('view engine', 'ejs');

const indexRouter = require('./routes/index');

app.use('/', indexRouter);

app.listen('3000', ()=> {
    console.log('Server is running on port 3000')
})


