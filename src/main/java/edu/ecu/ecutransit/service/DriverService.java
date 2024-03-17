package edu.ecu.ecutransit.service;

import edu.ecu.ecutransit.dto.DriverDto;

import java.util.List;

public interface DriverService {
    DriverDto createDriver(DriverDto driverDto);

    List<DriverDto> getAllDrivers();

}
