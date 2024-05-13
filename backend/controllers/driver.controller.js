const Driver = require('../models/driver.model');

const getDrivers = async (req,res) => {
    try{
        const drivers = await Driver.find({});
        res.status(200).json(drivers);
    } catch (error){
        res.status(500).json({message: error.message});
    } 
}

const getDriver = async (req,res) => {
    try{
        const { id } = req.params;
        const driver = await Driver.findById(id);
        res.status(200).json(driver);
    } catch (error){
        res.status(500).json({message: error.message});
    }
}


const postDriver = async (req, res) => {
    try{
        const driver = await Driver.create(req.body);
        res.status(200).json(driver);
    } catch (error){
        res.status(500).json({message: error.message});
    }
}

const putDriver = async (req, res) => {
    try{
        const {id} = req.params;

        const driver = await Driver.findByIdAndUpdate(id, req.body);

        if(!driver){
            return res.status(404).json({message: "Driver not found"});
        }

        const updatedDriver = await Driver.findById(id);
        res.status(200).json(updatedDriver);

    } catch (error){
        res.status(500).json({message: error.message});
    }
}

const deleteDriver = async (req,res) => {
    try{
        const {id} = req.params;

        const driver = await Driver.findByIdAndDelete(id);

        if(!driver){
            return res.status(404).json({message: "Driver not found"});
        }

        res.status(200).json({message: "Driver deleted successfully"});
    }catch (error) {
        res.status(500).json({message:error.message});
    }
}


module.exports = {
    getDrivers,
    getDriver,
    postDriver,
    putDriver,
    deleteDriver,
}
