<?php

include 'libs/template.php';
function renderPage($config) {

  $replaces = [
    '{TITLE}' => $config['website_title'], 
  ];
  
  $header = renderTemplate('view/header.html', $replaces); // рендерим шаблоны только с 1 реплейсом, потомучто им пока больше не нужно
  $footer = renderTemplate('view/footer.html', $replaces);
  
  $replaces['{HEADER}'] = $header; // добавляем отрендереные шаблоны футера и хедера в реплесы, чтобы в главном шаблоне можно было подставить
  $replaces['{FOOTER}'] = $footer;

  return renderTemplate('view/contakty.html', $replaces);
}
?>
