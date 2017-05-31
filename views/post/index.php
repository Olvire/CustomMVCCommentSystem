<div class="content_page">
  <?php
  if($data){
    echo '<ul>';
    foreach ($data as $key => $value) {
      $link = Utils::getLink("post/view/".$value['id']);
      $d_link = Utils::getLink("post/delete/".$value['id']);
      $desc = Utils::makeLinksClickable($value['body']);
      echo "<li> Title : <b> {$value['title']} </b>  <span class='btn_act'><a href='{$link}' > View </a> &nbsp;|&nbsp; <a href='{$d_link}'> Delete </a><span></li>";
      echo "<li> Email : {$value['email']} </li>";
      echo "<li> Body : {$desc} </li>";
      echo "</br></br></br>";
    }
    echo '</ul>';
  }else{
    echo 'No Post found';
  }
  ?>
</div>
