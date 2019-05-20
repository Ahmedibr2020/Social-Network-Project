<?php
require '../functions/functions.php';
session_start();
$conn = connect();
?>
<?php
if(isset($_GET['type'], $_GET['p_id'])){
	$type = $_GET['type'];
	$id = (int)$_GET['p_id'];
  $sql88= "SELECT user_firstname,user_id , user_lastname FROM users
          JOIN likes on likes.liked_by=users.user_id
          WHERE likes.p_id=$id";
  $query88=mysqli_query($conn,$sql88);


  $width = '200';
  $height = '300px';
  if(!$query88)
      echo mysqli_error($conn);
  if($query88){
      if(mysqli_num_rows($query88) == 0){
          echo '<div class="userquery">';
          echo 'Post  has no likes on it .';
          echo '<br><br>';
          echo '</div>';
      }


				while( $row88 = mysqli_fetch_assoc($query88) ) {

          echo '<div class="userquery">';


          echo '<a class="profilelink" href="profile.php?id=' . $row88['user_id'] .'">' . $row88['user_firstname'] . ' ' . $row88['user_lastname'] . '<a>';

          echo '</div>';
          
      }
  }
}
  ?>
