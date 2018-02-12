<?php

include 'libs/template.php';
include 'libs/previewGenerator.php';

include 'model/pages.php';

function renderPage($config) {
  $homeData = getLastPages($config['previews_on_home']);

  $replaces = [
    '{TITLE}' => $config['website_title'], // помещаем в реплейсы пока только одну титьлю
  ];

  $header = renderTemplate('view/header.html', $replaces); // рендерим шаблоны только с 1 реплейсом, потомучто им пока больше не нужно
  $footer = renderTemplate('view/footer.html', $replaces);
  $sidebar = renderTemplate('view/sidebar.html', $replaces);

  $replaces['{HEADER}'] = $header; // добавляем отрендереные шаблоны футера и хедера в реплесы, чтобы в главном шаблоне можно было подставить
  $replaces['{FOOTER}'] = $footer;
  $replaces['{SIDEBAR}'] =$sidebar;
  
  $replaces['{PREVIEWS}'] = ''; // создаём пустой реплейс с привьюхами
  
  foreach($homeData as $pageName => $pageData) {
    $replaces['{PREVIEWS}'] .= generatePreview($pageData, $config['website_root']);
  }

  return renderTemplate('view/home.html', $replaces);
}

?>
