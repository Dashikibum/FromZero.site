
<?php 
$name="css_grid";
function getmy($name){

 mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");

  $query = "select caption, body, previu, adddate, Name, metky from pages where Name LIKE '%" . $name . "%'";
  
  $result = $mysqli->query($query);

  print_r($query);
}
  ?> 
