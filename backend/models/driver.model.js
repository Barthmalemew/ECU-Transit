const mongoose = require('mongoose');

const DriverSchema = mongoose.Schema(
    {
        name: {
            type: String,
            required: [true, "Please enter a driver name"],
        },

        image: {
            type: String,
            required: false
        },

        schedule: {
            type: String,
            default: "N/A"
        } 
    },
    {
        timestamps: true
    }
);

const Driver = mongoose.model("Driver", DriverSchema);

module.exports = Driver;
