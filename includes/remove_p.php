<?php
require '../functions/functions.php';
session_start();
$conn = connect();

if(isset($_GET['type'], $_GET['p_id'])){
	$type = $_GET['type'];
	$id = (int)$_GET['p_id'];
	switch ($type) {
		case 'post':
		$sql99="DELETE FROM likes WHERE likes.p_id=$id" ;
		$query99= mysqli_query($conn, $sql99);
		$sql89="DELETE FROM notifications WHERE notifications.po_id=$id" ;
		$query89= mysqli_query($conn, $sql89);

		$sql8="DELETE FROM posts  WHERE posts.post_id=$id" ;
		$query8= mysqli_query($conn, $sql8);


}
}
header("Location: ../home.php");
?>
