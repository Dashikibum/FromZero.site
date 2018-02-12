
<?php include("headerform.php");?>
<?php include("leftbar.php");?>

 <?php 
 
 $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
 $mysqli->set_charset("utf8");

  $query = "select Name from pages";
  
  $result = $mysqli->query($query);
  $data=$result->fetch_all();
  $p=$data[2];
  print_r($p[0]);
  
  ?>


<?php include("footerform.php");?>
