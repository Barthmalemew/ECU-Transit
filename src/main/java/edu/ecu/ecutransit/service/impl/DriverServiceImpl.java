package edu.ecu.ecutransit.service.impl;

import edu.ecu.ecutransit.dto.DriverDto;
import edu.ecu.ecutransit.entity.Driver;
import edu.ecu.ecutransit.mapper.DriverMapper;
import edu.ecu.ecutransit.repository.DriverRepository;
import edu.ecu.ecutransit.service.DriverService;
import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Collectors;

@Service
@AllArgsConstructor
public class DriverServiceImpl implements DriverService{

    private DriverRepository driverRepository;

    @Override
    public DriverDto createDriver(DriverDto driverDto) {

        Driver driver = DriverMapper.mapToDriver(driverDto);
        Driver savedDriver = driverRepository.save(driver);
        return DriverMapper.mapToDriverDto(savedDriver);
    }

    @Override
    public List<DriverDto> getAllDrivers() {
        List<Driver> drivers = driverRepository.findAll();
        return drivers.stream().map((driver) -> DriverMapper.mapToDriverDto(driver))
                .collect(Collectors.toList());
    }

}
