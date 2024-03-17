package edu.ecu.ecutransit.dto;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class DriverDto {
    private Long id;
    private String name;
    private String monday;
    private String tuesday;
    private String wednesday;
    private String thursday;
    private String friday;
}