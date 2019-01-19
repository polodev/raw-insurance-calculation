<?php
class OMC {
  const country_types = [
    '1' => 'schengen',
    '2' => 'schengen_us_canada_worldwide',
    '3' => 'worldwide'
  ];
  const age_group= [ 'till_40', '41_to_50', '51_to_55', '56_to_59', '60_to_65', '66_to_75', '76_to_80' ];
  const days = [ 7, 10, 14, 21, 28, 35, 47, 60, 75, 90, 120, 180 ];
  const vat = (15/100);
  const stamp_price = 50;

  private $country_type;
  private $age_group;
  private $days;
  private $omc_data;
  public function __construct($country_type, $age, $days, $omc_data)
  {
    $this->omc_data = $omc_data;
    $this->age_group = $this->calculate_age_group($age);
    $this->days = $this->calculate_days($days);
    $this->country_type = self::country_types[$country_type];
  }
  public function calculate()
  {
    $basic = $this->omc_data[$this->country_type][$this->age_group][$this->days];
    $vat = round($basic * self::vat);
    $total = $basic + $vat + self::stamp_price;
    return [
      'net_premium' => $basic,
      'gross_primium' => $total,
    ];
  }
  private function calculate_days ($days) {
    switch (true) {
      case $days <= 7:
        return 7;
      case $days <= 10:
        return 10;
      case $days <= 14:
        return 14;
      case $days <= 21:
        return 21;
      case $days <= 28:
        return 28;
      case $days <= 35:
        return 35;
      case $days <= 47:
        return 47;
      case $days <= 60:
        return 60;
      case $days <= 75:
        return 75;
      case $days <= 90:
        return 90;
      case $days <= 120:
        return 120;

    }
  }
  private function calculate_age_group($age)
  {
    switch (true) {
      case $age <= 40:
        return 'till_40';
      case $age >= 41 && $age <= 50:
        return '41_to_50';
      case $age >= 51 && $age <= 55:
        return '51_to_55';
      case $age >= 56 && $age <= 59:
        return '56_to_59';
      case $age >= 60 && $age <= 65:
        return '60_to_65';
      case $age >= 66 && $age <= 75:
        return '66_to_75';
      case $age >= 76 && $age <= 80:
        return '76_to_80';
      default:
        return '76_to_80';
    }
  }
}