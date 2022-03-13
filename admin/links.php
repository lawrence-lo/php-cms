<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM links
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Link has been deleted' );
  
  header( 'Location: links.php' );
  die();
  
}

$query = 'SELECT *
  FROM links
  ORDER BY id';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Links</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">URL</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=link&id=<?php echo $record['id']; ?>&width=100&height=100&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="center"><?php echo $record['url']; ?></td>
      <td align="center"><a href="links_icon.php?id=<?php echo $record['id']; ?>">Icon</i></a></td>
      <td align="center"><a href="links_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="links.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this link?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="links_add.php"><i class="fas fa-plus-square"></i> Add Link</a></p>


<?php

include( 'includes/footer.php' );

?>