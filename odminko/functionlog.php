
<?php

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

if(isset($_POST['submit'])){

    $link=mysqli_connect('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');
    
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['user_password'] === md5(md5($_POST['password']))){
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip'])){

            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        
        session_start();
        
        $_SESSION['name'] = $_POST['login'];
        
        header("Location: pageform.php"); 
        
    }else{
        print "Вы ввели неправильный логин/пароль";
    }
}

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
        
        header("Location: answer.php"); exit();
}

function generate_pagelog($href){
session_start();
 if(isset($_SESSION['name'])){
 
    include("$href");
  }else{
  print_r("сначала авторизируйтесь" . "<a href="."login.php".">Войти</a>");
  }
}


?>
 
