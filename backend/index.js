const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const Driver = require('./models/driver.model.js');
const driverRoute = require('./routes/driver.route.js');
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended: false}));

app.use(cors());

app.use("/api/drivers", driverRoute);


app.get('/', (req, res) => {
    res.send("Hello from node API");
});

mongoose.connect("mongodb+srv://barthmalemew:832506@drivers.63uhdix.mongodb.net/Drivers?retryWrites=true&w=majority&appName=Drivers")
.then(() => {
    console.log("Connected to database!");
    app.listen(3000, () => {
        console.log('Server is running on port 3000');
    });
})
.catch(() => {
    console.log("Connection failed!");
});
