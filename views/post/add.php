<?php
if (isset($error) && sizeof($error) > 0) {
  echo "Please fix below errors: </br>";
  echo "<ul style='list-style: none; color:red'>";
  
  foreach ($error['post'] as $key => $value) {
    $key = ucfirst($key);
    echo "<li> {$key} : $value </li>";
  }
  echo "</ul>";
}
?>
<div class="add_form">
  <fieldset>
    <legend>Add New Post</legend>
    <form action="<?php echo Utils::getLink("post/add") ?>" method="POST">
      <ul style="list-style: none">
        <li>
          <label>Title: </label>
          <input name="post[title]" type="text" size="25" value="<?php echo isset($data['title'])?$data['title']:''; ?>" required />
        </li>
        <li>
          <label>Email: </label>
          <input name="post[email]" type="email" size="25" value="<?php echo isset($data['email'])?$data['email']:''; ?>" required />
        </li>
        <li>
          <label>Body: </label>              
          <textarea rows="4" cols="50" name="post[body]" value="<?php echo isset($data['body'])?$data['body']:''; ?>" required></textarea>          
        </li>
        <li>
          <input type="submit" value="Submit!" />
        </li>
      </ul>  
    </form>
  </fieldset>
</div>