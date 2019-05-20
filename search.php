<?php
//
require 'functions/functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();

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
        <h1>Search Results</h1>
        <?php
            $location = $_GET['location'];
            $key = $_GET['query'];

                $sql = "SELECT * FROM users WHERE users.user_email = '$key'";
                include 'includes/userquery.php';

                $query = mysqli_query($conn, $sql);
                $width = '40px'; // Profile Image Dimensions
                $height = '40px';
                if(!$query){
                    echo mysqli_error($conn);
                }
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
                    echo 'There is no results given the keyword, try to widen your search query.';
                    echo '</div>';
                    echo '<br>';
                }
                while($row = mysqli_fetch_assoc($query)){
                    include 'includes/post.php';
                    echo '<br>';
                }
            }
        ?>
    </div>
</body>
</html>
