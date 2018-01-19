<?php
$namepage ='';
if( isset($_GET['namepage']) ){
  $namepage = (string)$_GET['namepage'];
  }
  
$NamePage = '';
if( isset($_GET['NamePage']) ){
  $NamePage = (string)$_GET['NamePage'];
  $page = get_page($NamePage);
  if( !$page ) {
    // 404
    exit();
  }
}else{
  /*search form*/
  if( isset($_GET['searching']) ){
      $searching = $_GET['searching'];

      if( strlen($searching)< 3){
        $page = array(
        'caption' => "Результаты поиска:",
        'body' => "слишком короткий поисковой запрос"
        );
      }else if(strlen($searching)>100){
        $page = array(
        'caption' => "Результаты поиска:",
        'body' => "слишком длинный поисковой запрос"
        );
      }else{
        $page = get_search($searching);
      }
  }else 
    /*postform*/
    if(isset($_GET['email'])){
      
      if (!empty($_GET['wot'])) {
        $wot = $_GET['wot'];
        $imya =$_GET['imya'];
        $email = $_GET['email'];
        
        $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
        $mysqli->set_charset("utf8");

        $query = "INSERT INTO mail(email, Qwest, name) VALUES ('$email', '$wot', '$imya')";
        $result = $mysqli->query($query);
    
        $page=array(
          'caption' => "Cпасибо за обращение!",
          'body' => "Я отвечу на Ваше письмо в ближайшее время");
    }
      
  }else {
    $page0 = get_previu(0);
		$page1 = get_previu(1);
		$page2 = get_previu(2);
		$page3 = get_previu(3);
		$page4 = get_previu(4);
		$page5 = get_previu(5);

	}
}
/*function create page*/
function get_page($Name){
  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");
    $query = "select Name, caption, body, adddate from pages where Name LIKE '%" . $Name . "%'";
  $result = $mysqli->query($query);
  if( $result->num_rows > 0 ) {
  
    $data = $result->fetch_assoc();
  return $data;
  } else {
    return false;
  }

}
/*function create previu*/
function get_previu($index){
  
  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");
  $query = "select caption, previu, id from pages order by id desc";
  $result = $mysqli->query($query);
  $result->num_rows;
  $data = $result->fetch_all();
 
  return ($data[$index]);
}

/* function create search*/
function get_search($query){
  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");
 
  $q ="SELECT  id, caption, previu FROM pages WHERE previu LIKE '%" . $query . "%' OR caption LIKE '%" . $query ."%'";
  $result = $mysqli->query($q);
  if( $result->num_rows > 0 ) {
  	$text = $result->fetch_assoc();
  }else{
    $u = "select * from search where id=3";
    $res = $mysqli->query($u);
    $res->num_rows;
    $text = $res->fetch_assoc();
  }
   
  return $text;
}
?> 
