<?php 

class Act_Liability {

  const driver_amount = 30;
  const passenger_per_seat = 45;
  const vat_rate = 15;

  private $cc;
  private $sitting_capacity;
  private $basic_amount;
  private $passenger_amount;
  private $vat;
  private $total_amount_before_vat;
  private $total_amount;

  public function __construct($cc, $sitting_capacity)
  {
    // all variable for calculating
    //premium are passing inside __construct
    $this->cc = $cc;
    $this->sitting_capacity = $sitting_capacity;
  }
  public function calculate()
  {
    // $capcity_basic_cost = [
    //   '1300' => '150',
    //   '1800' => '250',
    //   '3000' => '350',
    //   '3001' => '450',
    // ];

    // genrating cc
    if ($this->cc <= 1300) {
      $this->basic_amount = 150;
    } else if ($this->cc <= 1800) {
      $this->basic_amount = 250;
    } else if ($this->cc <= 3000) {
      $this->basic_amount = 350;
    } else if ($this->cc > 3000) {
      $this->basic_amount = 450;
    }


    // sitting cost 
    $this->passenger_amount =  ($this->sitting_capacity - 1) * self::passenger_per_seat;
    $this->total_amount_before_vat =  ($this->basic_amount + self::driver_amount + $this->passenger_amount);
    $vat = (self::vat_rate / 100) * $this->total_amount_before_vat;
    $this->vat = round($vat);
    $this->total_amount = $this->basic_amount + self::driver_amount + $this->passenger_amount + $this->vat;

    return [
      'basic' => $this->basic_amount,
      'driver' => self::driver_amount,
      'passenger_calculation' => sprintf('%s X %s', ($this->sitting_capacity - 1), self::passenger_per_seat ),
      'passenger' => $this->passenger_amount,
      'total_amount_before_vat' => $this->total_amount_before_vat,
      'vat' => $this->vat,
      'total_amount' => $this->total_amount,
    ];





  }
}