<?php

function getRoute() {
  if( isset($_GET['route']) )
    return $_GET['route'];
  else
    return 'home';
}

?>
