<?php 

require 'Comprehensive.php';
require 'Act_liability.php';

$cc = 1300;
$sitting_capacity = 20;


function get_value_for_act_liabilities($cc, $sitting_capacity)
{
  $act_liability = new Act_Liability($cc, $sitting_capacity);
  $given = sprintf("given value cc %s and sitting capacity %s ", $cc, $sitting_capacity);
  ?>
  <h1><?php echo $given ?></h1>
  <table>
    <tr>
      <th>basic</th>
      <th>driver</th>
      <th>passenger calculation</th>
      <th>passenger</th>
      <th>total_amount_before_vat</th>
      <th>vat</th>
      <th>total</th>
    </tr>
    <tr>
  <?php foreach ($act_liability->calculate() as $key => $value): ?>

    <td><?php echo $key === 'passenger_calculation' ? $value : 'Tk - ' . $value ?></td>
  <?php endforeach ?>
    </tr>
  </table>
  <hr>
  <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>basic calculation</title>
  <style>
    table, tr, th, td {
      border: 1px solid #222;
      border-collapse: collapse;
    }
    tr, th, td {
      padding: 10px;
    }
  </style>
</head>
<body>

<?php get_value_for_act_liabilities(1300, 20) ?>
<?php get_value_for_act_liabilities(1200, 4) ?>
<?php get_value_for_act_liabilities(1700, 15) ?>
<?php get_value_for_act_liabilities(1800, 14) ?>
<?php get_value_for_act_liabilities(1900, 11) ?>
<?php get_value_for_act_liabilities(2300, 20) ?>
<?php get_value_for_act_liabilities(2200, 4) ?>
<?php get_value_for_act_liabilities(2700, 15) ?>
<?php get_value_for_act_liabilities(2800, 14) ?>
<?php get_value_for_act_liabilities(2900, 11) ?>
<?php get_value_for_act_liabilities(3300, 20) ?>
<?php get_value_for_act_liabilities(3200, 4) ?>
<?php get_value_for_act_liabilities(3700, 15) ?>
<?php get_value_for_act_liabilities(3800, 14) ?>
<?php get_value_for_act_liabilities(3900, 11) ?>

  
</body>
</html>
