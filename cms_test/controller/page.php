<?php

include 'libs/template.php';
include 'model/pages.php';

function renderPage($config) {
  
  if( isset($_GET['name']) ){ // проверяем естьл ли в урле имя страницы
    $name = $_GET['name']; 
  }else{
  $name = '404'; // выставляем страницу по умолчанию - 404 - ничего не найдено
  }
  $pageData = getPage($name, $config);
  
  if( !$pageData ) { // если нет зафигачиваем сами инфу, что такой страницы нет
    $replaces = [
      '{TITLE}' => '404 - страница не найдена',
      '{BODY}' => 'Вы запросили адрес несуществующей страницы.'
    ];
  } else { // если есть подставляем репоейсы
    $replaces = [
      '{TITLE}' => $pageData['caption'],
      '{BODY}' => $pageData['body']
    ];
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
