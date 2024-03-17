package edu.ecu.ecutransit.controller;

import edu.ecu.ecutransit.dto.DriverDto;
import edu.ecu.ecutransit.service.DriverService;
import lombok.AllArgsConstructor;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@CrossOrigin("*")
@RestController
@AllArgsConstructor
@RequestMapping("/drivers")
public class DriverController {

    private DriverService driverService;

    @PostMapping
    public ResponseEntity<DriverDto> createDriver(@RequestBody DriverDto driverDto){
        DriverDto savedDriver = driverService.createDriver(driverDto);
        return new ResponseEntity<>(savedDriver, HttpStatus.CREATED);
    }

    @GetMapping()
    public ResponseEntity<List<DriverDto>> getAllDrivers(){
        List<DriverDto> drivers = driverService.getAllDrivers();
        return ResponseEntity.ok(drivers);
    }
}
