<?php include("functions.php")?>
<?php include("header.php")  ;?>

<?php if( isset($_GET['NamePage']) ){
        include("page.php");
        }else if( isset($_GET['searching']) ){
        include("search.php");
        }else if( isset($_GET['email']) ){
        include("kontakty.php");
        }else{
          include("content.php");
        } ?> 
<?php include("sidebar.php"); ?> 
<?php include("footer.php"); ?> 
