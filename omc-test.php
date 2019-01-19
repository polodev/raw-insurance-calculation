<?php

require 'omc-data.php';
require 'OMC.php';

function get_omc($country_type, $age, $days){
  global $omc_data;
  $country_types = [
    '1' => 'schengen',
    '2' => 'schengen_us_canada_worldwide',
    '3' => 'worldwide'
  ];
  $given = sprintf("Given value: country type - %s, age - %s, days - %s", $country_types[$country_type], $age, $days);
  $omc = new OMC($country_type, $age, $days, $omc_data);
  $premium = $omc->calculate() ;
  $premium_string = sprintf("Net Premium : %s & Gross Premium: %s", $premium['net_premium'], $premium['gross_primium']);
  echo "<h1>{$given}</h1>";
  echo "<h2>{$premium_string}</h2>";
  echo "<hr />";
  echo "<br />";
}


foreach (range(1, 20) as $value) {
  get_omc(
    rand(1, 3),
    rand(1, 80),
    rand(1, 120)
  );
}




