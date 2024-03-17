package edu.ecu.ecutransit.mapper;

import edu.ecu.ecutransit.dto.DriverDto;
import edu.ecu.ecutransit.entity.Driver;

public class DriverMapper {
    public static DriverDto mapToDriverDto(Driver driver) {
        return new DriverDto(
                driver.getId(),
                driver.getName(),
                driver.getMonday(),
                driver.getTuesday(),
                driver.getWednesday(),
                driver.getThursday(),
                driver.getFriday()
        );
    }

    public static Driver mapToDriver(DriverDto driverDto) {
        return new Driver(
                driverDto.getId(),
                driverDto.getName(),
                driverDto.getMonday(),
                driverDto.getTuesday(),
                driverDto.getWednesday(),
                driverDto.getThursday(),
                driverDto.getFriday()
        );
    }
}
