const express = require('express');

const app = express();

app.use(express.static('Website/public'));

app.listen('3000', ()=> {
    console.log('Server is running on port 3000')
})


