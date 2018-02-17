<?php 

function generatePreview($pageData,$urlRoot) {
  $html = '<div class="block">';
  $html .= '<a href="' . $urlRoot . '/?route=page&name=' . $pageData['Name'] . '"><h1>' . $pageData['caption'] . '</h1></a>';
  $html .= '<p>' . $pageData['previu'] . '</p>';
  $html .= '</div>';
  return $html;
}

?>
