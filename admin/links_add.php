<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] )
  {
    
    $query = 'INSERT INTO links (
        name,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Link has been added' );
    
  }
  
  header( 'Location: links.php' );
  die();
  
}

?>

<h2>Add Link</h2>
<div id="error-messages"></div>
<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  
  <input type="submit" value="Add Link">
  
</form>

<p><a href="links.php"><i class="fas fa-arrow-circle-left"></i> Return to Link List</a></p>

<script src="./js/validateLinksAdd.js"></script>
<?php

include( 'includes/footer.php' );

?>