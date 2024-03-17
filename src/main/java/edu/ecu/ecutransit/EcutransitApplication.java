package edu.ecu.ecutransit;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.security.servlet.SecurityAutoConfiguration;

@SpringBootApplication(exclude = {SecurityAutoConfiguration.class})
public class EcutransitApplication {

    public static void main(String[] args) {
        SpringApplication.run(EcutransitApplication.class, args);
    }

}
