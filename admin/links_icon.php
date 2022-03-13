<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: links.php' );
  die();
  
}

if( isset( $_FILES['icon'] ) )
{
  
  if( isset( $_FILES['icon'] ) )
  {
  
    if( $_FILES['icon']['error'] == 0 )
    {

      switch( $_FILES['icon']['type'] )
      {
        case 'image/png': 
          $type = 'png'; 
          break;
        case 'image/jpg':
        case 'image/jpeg':
          $type = 'jpeg'; 
          break;
        case 'image/gif': 
          $type = 'gif'; 
          break;      
      }

      $query = 'UPDATE links SET
        icon = "data:image/'.$type.';base64,'.base64_encode( file_get_contents( $_FILES['icon']['tmp_name'] ) ).'"
        WHERE id = '.$_GET['id'].'
        LIMIT 1';
      mysqli_query( $connect, $query );

    }
    
  }
  
  set_message( 'Link icon has been updated' );

  header( 'Location: links.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  if( isset( $_GET['delete'] ) )
  {
    
    $query = 'UPDATE links SET
      icon = ""
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    $result = mysqli_query( $connect, $query );
    
    set_message( 'Link icon has been deleted' );
    
    header( 'Location: links.php' );
    die();
    
  }
  
  $query = 'SELECT *
    FROM links
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: links.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include 'includes/wideimage/WideImage.php';

?>

<h2>Edit Link</h2>

<p>
  Note: For best results, icons should be approximately 400 x 400 pixels.
</p>

<?php if( $record['icon'] ): ?>

  <?php

  $data = base64_decode( explode( ',', $record['icon'] )[1] );
  $img = WideImage::loadFromString( $data );
  $data = $img;

  ?>
  <p><img src="data:image/jpg;base64,<?php echo base64_encode( $data ); ?>" width="200" height="200"></p>
  <p><a href="links_icon.php?id=<?php echo $_GET['id']; ?>&delete"><i class="fas fa-trash-alt"></i> Delete this Icon</a></p>

<?php endif; ?>

<form method="post" enctype="multipart/form-data">
  
  <label for="icon">Icon:</label>
  <input type="file" name="icon" id="icon">
  
  <br>
  
  <input type="submit" value="Save Icon">
  
</form>

<p><a href="links.php"><i class="fas fa-arrow-circle-left"></i> Return to Link List</a></p>


<?php

include( 'includes/footer.php' );

?>