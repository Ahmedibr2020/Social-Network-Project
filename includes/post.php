<?php
  //$conn = connect();
    $sql6 = "SELECT COUNT(*) AS countt FROM likes
             WHERE likes.p_id = {$row['post_id']} ";
    $queryy = mysqli_query($conn, $sql6);
    $roww = mysqli_fetch_assoc($queryy);
    //$res = mysqli_query($conn,"SELECT * FROM likes JOIN posts on likes.p_id=posts.post_id ");


?>
<?php

echo '<div class="post">';
if($row['post_public'] == 'Y') {
    echo '<p class="public">';
    echo 'Public';
}else {
    echo '<p class="public">';
    echo 'Private';
}
echo '<br>';
echo '<span class="postedtime">' . $row['post_time'] . '</span>';
echo '</p>';
echo '<div>';
include 'profile_picture.php';
echo '<a class="profilelink" href="profile.php?id=' . $row['user_id'] .'">' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '<a>';
echo'</div>';
echo '<br>';
echo '<p class="caption">' . $row['post_caption'] . '</p>';
echo '<center>';
$target = glob("data/images/posts/" . $row['post_id'] . ".*");
if($target) {
    echo '<img src="' . $target[0] . '" style="max-width:580px">';
    echo '<br><br>';
}


echo '<br>';
echo '<a href="includes/like.php?type=post&p_id='.$row['post_id'].'"><input type="submit" value="Like Post"></a> ';
echo '<br><br>';
echo '<label >Likes(' .$roww['countt'].')</label>';
echo '<h2>People who likes post </h2>';
echo '<iframe src="includes/likers.php?type=post&p_id='.$row['post_id'].'" height="50" width="500"></iframe>';
echo '<div>';


echo '<br>';
echo '</center>';

if($row['user_id']==$_SESSION['user_id']){
echo '<br><a href="includes/remove_p.php?type=post&p_id='.$row['post_id'].'"><input type="submit" value="Remove Post"></a>';
}
echo '</div>';



?>
