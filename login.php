
<?php include("header.php")  ;?>
  
  
<form method="POST">
Логин <input name="login" type="text"><br>
Пароль <input name="password" type="password"><br>
<input name="submit" type="submit" value="Войти">
</form>
  
<?php include("footer.php"); ?> 

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

$link=mysqli_connect('127.0.0.1', 'from-zero', 'fTQI1tmD7zZt699b', 'from-zero');

if(isset($_POST['submit'])){
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['user_password'] === md5(md5($_POST['password']))){
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip'])){

            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true);
        header("Location: check.php"); exit();
    }else{
        print "Вы ввели неправильный логин/пароль";
    }
}?>
