<?php

  include('html.php');

  $days = array(
    0=>array(),
    1=>array(),
    2=>array(),
    3=>array(),
    4=>array(),
    5=>array(),
    6=>array(),
    7=>array(),
  );

  date_default_timezone_set('Indian/Reunion');
  // $week = date('l D F', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));
  // $week = date('r', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));

  // print_r($week);
  if(! file_exists('reservation.json')) {
    $weekReservation = array();
    $weekend = array('Saturday', 'Sunday');

    for($i=0; $i<8; $i++) {
      //don't make people work on weekends
      if( in_array(date('l', mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"))), $weekend ) ){
        continue;
      }
      $week[date('l', mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")))] = array(
        0=>array(),
        1=>array(),
        2=>array(),
        3=>array(),
        4=>array(),
        5=>array(),
        6=>array(),
        7=>array(),
      );

    }

  }

  // $reservation
  echo '<pre>';
  print_r($week);
  echo '</pre>';
?>
