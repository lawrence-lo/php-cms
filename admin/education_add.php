<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['subject'] ) )
{
  
  if( $_POST['subject'] and $_POST['date'] )
  {
    
    $query = 'INSERT INTO certifications (
        type,
        subject,
        school,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['subject'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Certification has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

?>

<h2>Add Certication</h2>

<form method="post">
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type">
  
  <br>
  
  <label for="subject">Subject:</label>
  <input type="text" name="subject" id="subject">
  
  <br>

  <label for="school">School:</label>
  <input type="text" name="school" id="school">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <input type="submit" value="Add Certification">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Certification List</a></p>

<script src="./js/validateEducationAdd.js"></script>
<?php

include( 'includes/footer.php' );

?>