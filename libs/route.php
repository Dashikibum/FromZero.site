<?php

function getRoute() {
  if( isset($_GET['route']) )
    return $_GET['route'];
  if( isset($_GET['searching']) )
    return 'search';
  if( isset($_GET['email']) )  
    return 'mail';
  else
    return 'home';
}

?>
