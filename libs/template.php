<?php

function renderTemplate($filePath, $replaces) {
  $template = file_get_contents($filePath);
  
  foreach($replaces as $key => $val)
    $template = str_replace($key, $val, $template);
  
  return $template;
}

?>
