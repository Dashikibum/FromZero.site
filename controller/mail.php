<?php

include 'libs/template.php';
include 'model/pages.php';

function renderPage($config) {
  
  if(isset($_GET['email'])){
    if (!empty($_GET['wot'])) {
      $wot = $_GET['wot'];
      $imya =$_GET['imya'];
      $email = $_GET['email'];
      
      get_mail($wot, $imya, $email, $config); 
      
      $replaces = [
      '{TITLE}' => "Cпасибо за обращение!",
      '{BODY}' => "Я отвечу на Ваше письмо в ближайшее время"
    ];
    }
  }
  
  $header = renderTemplate('view/header.html', $replaces); // рендерим шаблоны только с 1 реплейсом, потомучто им пока больше не нужно
  $footer = renderTemplate('view/footer.html', $replaces);
  $sidebar = renderTemplate('view/sidebar.html', $replaces);
  
  $replaces['{HEADER}'] = $header; // добавляем отрендереные шаблоны футера и хедера в реплесы, чтобы в главном шаблоне можно было подставить
  $replaces['{FOOTER}'] = $footer;
  $replaces['{SIDEBAR}'] =$sidebar;
  
  return renderTemplate('view/page.html', $replaces);
}

?>
 
