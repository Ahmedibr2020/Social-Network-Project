<?php
require 'functions/functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();

?>

<?php
// Responding to Request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['read'])) {
        $sql = "UPDATE notifications
                SET notifications.notif_status = 1
                WHERE notifications.usr1_id = {$_GET['id']} AND notifications.usr2_id = {$_SESSION['user_id']}";
        $query = mysqli_query($conn, $sql);
        if($query){

            header("refresh:1; url=noti.php" );
        }
        else{
            echo mysqli_error($conn);
        }
    }
}
//
?>
<!DOCTYPE html>
<html>
<head>
    <title>Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1>Notifications</h1>

        <?php
        $sql = "SELECT users.user_gender, users.user_id, users.user_firstname, users.user_lastname
                FROM users
                JOIN notifications
                ON notifications.usr2_id = {$_SESSION['user_id']} AND notifications.notif_status = 0 AND notifications.usr1_id = users.user_id";
        $query = mysqli_query($conn, $sql);
        $width = '450px';
        $height = '100px';
        if(!$query)
            echo mysqli_error($conn);
        if($query){
            if(mysqli_num_rows($query) == 0){
                echo '<div class="userquery">';
                echo 'You have no pending Notifications.';
                echo '<br><br>';
                echo '</div>';
            }
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="userquery">';
                echo '<br>';
                echo '<a>'. $row['user_firstname'] .' ' . $row['user_lastname']  . ' Liked your post</a>';
                echo '<form method="get" action="noti.php">';
                echo '<input type="hidden" name="id" value="' . $row['user_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $row['user_firstname'] . '">';
                echo '<input type="submit" value="Mark as read" name="read">';

                echo '<br><br>';
                echo'</form>';
                echo '</div>';
                echo '<br>';
            }
        }
        ?>
    </div>
</body>
</html>
