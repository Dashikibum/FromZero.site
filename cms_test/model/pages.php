<?php

// а это типа запрос в бд
function getLastPages($limit) {
  global $pagesData; // должны объявить, что используем глобальную переменную, иначе она будет невидна внутри функции

  $count = 0; // это счётчик, сколько записей мы уже положиди в массив
  $previews = [];
  
  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");
  
  $query = "select caption, previu, Name from pages order by id desc";
  $result = $mysqli->query($query);
  
  while($ind = $result->fetch_assoc()){

    $previews[ $ind['caption'] ] = $ind;
    $count ++; // положили ещё 1 запись
    if( $count >= $limit ) // если записей уже достаточно, то возвращаем результат
      return $previews;    
  }

  return $previews;// либо возвращаем сколько есть
}

function getPage($name) {
  global $pagesData; // должны объявить, что используем глобальную переменную, иначе она будет невидна внутри функции

  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");
  
  $query = "select Name, caption, body, adddate from pages where Name LIKE '%" . $name . "%'";
  $result = $mysqli->query($query);
      
  $pagesData = $result->fetch_assoc();
  
    if( isset($pagesData) ) {// а есть ли статья с таким ключём?
    return $pagesData;
    }else 
    return false; // статьи нет
}


?>
