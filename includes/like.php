<?php
require '../functions/functions.php';
session_start();
$conn = connect();



if(isset($_GET['type'], $_GET['p_id'])){
	$type = $_GET['type'];
	$id = (int)$_GET['p_id'];
	$sql9 = "SELECT * FROM users JOIN posts ON users.user_id = posts.post_by WHERE posts.post_id = {$id}";
	$query9 = mysqli_query($conn, $sql9);
	$row9 = mysqli_fetch_assoc($query9);
	$notific=$row9[user_firstname]." ".$row9['user_lastname']." Liked Your post : ".$row9['post_caption'];
	$usrr = $row9['user_id'];
	switch ($type) {
		case 'post':
      $sql4="INSERT INTO likes(liked_by, p_id)
          SELECT {$_SESSION['user_id']}, {$id}
          FROM posts
          WHERE EXISTS (
          SELECT post_id
          FROM posts
          WHERE post_id = {$id})
          AND NOT EXISTS (
          SELECT like_id
          FROM likes
          WHERE liked_by = {$_SESSION['user_id']}
          AND p_id = {$id})
          LIMIT 1" ;
				 $query4 = mysqli_query($conn, $sql4);

      	 $sql77="INSERT INTO notifications(usr1_id,usr2_id,notif_status,po_id )
        	VALUES({$_SESSION['user_id']},$usrr,0,$id )";
				$query77 = mysqli_query($conn, $sql77);
			break;
	}
}
header("Location: ../home.php");
?>
