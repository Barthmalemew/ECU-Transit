package edu.ecu.ecutransit.repository;

import edu.ecu.ecutransit.entity.Driver;
import org.springframework.data.jpa.repository.JpaRepository;

public interface DriverRepository extends JpaRepository<Driver, Long> {
}