const express = require('express');
const path = require('path');
const phpExpress = require('php-express')({
  bin: 'php' 
});
const app = express();
const port = 3000;

app.use('/About', express.static(path.join(__dirname, 'About')));
app.use('/style', express.static(path.join(__dirname, 'style')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/Assets', express.static(path.join(__dirname, 'Assets')));
app.use('/admin', express.static(path.join(__dirname, 'admin')));
app.use('/connection', express.static(path.join(__dirname, 'connection')));

app.all('*.php', phpExpress.router);

app.listen(port, () => {
  console.log(`Server berjalan di http://192.168.0.103:${port}`);
});
