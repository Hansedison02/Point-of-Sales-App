const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const session = require('express-session');
const mongoose = require('mongoose');

app.set('view engine', 'ejs');
app.use(express.static('public'));
app.use(bodyParser.urlencoded());
//layouts

app.use(session({
    secret: '123asd21asg45',
}))

mongoose.connect(('mongodb+srv://Takahashi18:hanekawa@kairsoftdb.rgdna.mongodb.net/kairsoftdatabase?retryWrites=true&w=majority')
    , (err,res) => {
        if(err){
            console.error(err);
        }
        else{
            console.log('Database connected')
        }
    })


//routes
const homeRoute = require('./routes/index');
app.use('/', homeRoute)

app.listen('3000', () => {
    console.log('Server is active');
});


