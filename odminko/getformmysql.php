<?php include("functionlog.php");?>
<?php include("headerform.php");?>
<?php include("leftbar.php");?>
    <div class="forma">
      <form class="postform" method="POST">
        <p>Заголовок</p>
        <input name="captions" required="" type ="text"><br> 
        <p>Статья</p>
        <textarea name="body" required="" type ="text"></textarea><br>
        <p>Превью</p>
        <textarea name="previu" required="" type ="text"></textarea><br>
        <p>Дата</p>
        <input name="data" pattern='[0-9]{8}' type ="text">
        <p>Имя страницы</p>
        <input name="pagename" required="" type ="text">
        <p>Метки</p>
        <textarea name="metky" type ="text"></textarea><br>
        <input name="goy" type="submit" value="Отправить">
      </form>
    </div>
</div>
<?php include("footerform.php");?>
