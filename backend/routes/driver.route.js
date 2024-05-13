const express = require("express");
const Driver = require("../models/driver.model.js");
const router = express.Router();
const {getDrivers, getDriver, postDriver, putDriver, deleteDriver} = require('../controllers/driver.controller.js');

router.get("/", getDrivers);

router.get("/:id", getDriver);

router.post("/", postDriver);

router.put("/:id", putDriver);

router.delete("/:id", deleteDriver);

module.exports = router;
