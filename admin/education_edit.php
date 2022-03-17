<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['subject'] ) )
{
  
  if( $_POST['subject'] and $_POST['date'] )
  {
    
    $query = 'UPDATE certifications SET
      type = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
      subject = "'.mysqli_real_escape_string( $connect, $_POST['subject'] ).'",
      school = "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    set_message( 'Certifications has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM certifications
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Project</h2>
<div id="error-messages"></div>
<form method="post">
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type" value="<?php echo htmlentities( $record['type'] ); ?>">
  
  <br>
  
  <label for="subject">Subject:</label>
  <input type="text" name="subject" id="subject" value="<?php echo htmlentities( $record['subject'] ); ?>">
  
  <br>

  <label for="school">School:</label>
  <input type="text" name="school" id="school" value="<?php echo htmlentities( $record['school'] ); ?>">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Certification">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Certification List</a></p>

<script src="./js/validateEducationAdd.js"></script>
<?php

include( 'includes/footer.php' );

?>