<?php include("header.php")  ;?>
  
  
<form method="POST">
  Заголовок<br><input name="captions" required="" type ="text" ><br>
  Статья<br><textarea name="body" required="" type ="text"></textarea><br>
  Превью<br><textarea name="previu" required="" type ="text"></textarea><br>
  Дата<input name="data" pattern="[0-9]{8}" type ="text">
  Имя страницы<input name="pagename" required="" type ="text">
  Метки<br><textarea name="metky" type ="text"></textarea><br>
  <input name="goy" type="submit" value="go">
</form>
  
<?php include("footer.php"); ?> 


<?php

if(isset($_POST['goy'])) {

  $mysqli = new mysqli('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
  $mysqli->set_charset("utf8");

  $captions = $_POST['captions'];
  $body = $_POST['body'];
  $previu = $_POST['previu'];
  $data = $_POST['data'];
  $pagename = $_POST['pagename'];
  $metky =$_POST['metky'];
  
  
  
  $query = "INSERT INTO `pages` (`id`, `caption`, `body`, `previu`, `adddate`, `Name`, `metky`) VALUES (NULL, '$captions', '$body','$previu', '$data', '$pagename', '$metky')";
  $result = $mysqli->query($query);
        
        header("Location: form.php"); exit();
}
?>
