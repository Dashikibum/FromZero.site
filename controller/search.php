<?php

include 'libs/template.php';
include 'model/pages.php';

function renderPage($config) {
    
  if( isset($_GET['searching']) ){
    $searching = $_GET['searching']; 
  
    if( strlen($searching)< 4){
      $replaces = array(
      '{TITLE}' => "Результаты поиска:",
      '{BODY}' => "слишком короткий поисковой запрос"
      );
      }else if(strlen($searching)>100){
       $replaces = array(
      '{TITLE}' => "Результаты поиска:",
      '{BODY}' => "слишком длинный поисковой запрос"
      );
      }else{
        $pageData = get_search($searching, $config);
        $replaces = [
        '{TITLE}' => $pageData['caption'],
        '{BODY}' => $pageData['previu']
        ];
      }
  } 
  $header = renderTemplate('view/header.html', $replaces); 
  $footer = renderTemplate('view/footer.html', $replaces);
  $sidebar = renderTemplate('view/sidebar.html', $replaces);
  
  $replaces['{HEADER}'] = $header;
  $replaces['{FOOTER}'] = $footer;
  $replaces['{SIDEBAR}'] =$sidebar;
  
  return renderTemplate('view/search.html', $replaces);
}

?>
 
