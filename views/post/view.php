<div class="content_page">
  <?php
  if ($data) {
    echo "<h3> {$data['title']} </h3>";
    echo "<h3> {$data['email']} </h3>";
    echo Utils::makeLinksClickable($data['body']);
  } else {
    echo 'Invalid Post Id';
  }
  ?>  
</div>
<div class="new_comment">  
  <ul style="list-style: none; padding: 0px;">
    <li>          
      <input type="hidden" id="post_id" name="post_id" value="<?php echo $data['id'] ?>"/> 
      <textarea rows="4" cols="50" name="description" id="desc" required="">
      </textarea>
    </li>        
    <li>

      <input id="btn_post_comment" type="submit" value="Comment!" onclick="postComments()" />
    </li> 
  </ul>  
</div>
<div id="comments">
  <ul id="comments_list">

  </ul>
  <a href="javascript: void(0)" id="btn_load_comments" onclick="loadComments()">Load More Comments..</a>
</div>