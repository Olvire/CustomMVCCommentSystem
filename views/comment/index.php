<?php

foreach ($data as $key => $value) {
  $des = Utils::makeLinksClickable($value['description']);  
  echo "<li> {$des} </li>";
}
?>


