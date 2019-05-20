	<?php require 'functions/functions.php';
	session_start();
	$conn = connect();

	$userID= (int)$_GET['id'];

	$sql55 = "SELECT * FROM users WHERE user_id = {$userID}";
	$query55= mysqli_query($conn, $sql55);
	$row55 = mysqli_fetch_assoc($query55);





	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
	    if (isset($_POST['save'])) { // Send a Friend Request

			$u_firstname = $_POST['editfname'];
			$u_lastname = $_POST['editlname'];
			$u_nickname = $_POST['editNick'];
			$u_email = $_POST['editemail'];
			$u_gender = $_POST['editselect'];
			$u_birthdate = $_POST['selectyear'] . '-' . $_POST['selectmonth'] . '-' . $_POST['selectday'];;
			$u_about = $_POST['editaboutme'];
			$u_hometown = $_POST['editHometown'];
			$u_status = $_POST['editradio'];
			//$idd= $row55['user_id'];
		$ss=" UPDATE users SET user_firstname = '$u_firstname',user_lastname = '$u_lastname',user_nickname = '$u_nickname',user_email = '$u_email',user_gender = '$u_gender',user_birthdate = $u_birthdate,user_about = '$u_about',user_hometown = '$u_hometown',user_status = '$u_status' WHERE user_id=$userID";
			$dd=mysqli_query($conn,$ss);
		if ($dd)
                        { echo "<script type='text/javascript'>alert('Successful - Record Updated!'); </script>"; }
                    else
                        { echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!');</script>"; }
                }
}
			//header('location:profile.php');



?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Edit Profile</title>
		<link rel="stylesheet" type="text/css" href="resources/css/main.css">

</head>

<body >


		<?php include('includes/navbar.php') ?>

		<div  class="edi">
			<center>
			<h1>UPDATE Your profle</h1>
		<form method="POST" >
			<label>First Name : <?= $row55['user_firstname'] ?></label>
			<input type="text" name="editfname" value="<?php echo $row55['user_firstname']; ?>">
			<label>Last Name : <?= $row55['user_lastname'] ?></label>
			<input type="text" name="editlname" value="<?php echo $row55['user_lastname']; ?>">
			<label>Nick Name : <?= $row55['user_nickname'] ?></label>
			<input type="text" name="editNick" value="<?php echo $row55['user_nickname'] ?>">
			<label>Email : <?= $row55['user_email'] ?></label>
			<input type="text" name="editemail" id="useremail" value="<?php echo $row55['user_email']  ; ?> ">
			<label>Gender : <?= $row55['user_gender'] ?></label>
			<select id="boxy2" name="editselect" value="<?php echo $row55['user_gender']; ?>">
				<option value="M" >MALE</option>
				<option value="F" >FEMALE</option>
			</select>
	<br><br>
			<label>Birthdate :<?= $row55['user_birthdate'] ?></label>
			<select name="selectday">
			<?php
			for($i=1; $i<=31; $i++){
					echo '<option value="'. $i .'">'. $i .'</option>';
			}
			?>
			</select>
			<select name="selectmonth">
			<?php
			echo '<option value="1">January</option>';
			echo '<option value="2">February</option>';
			echo '<option value="3">March</option>';
			echo '<option value="4">April</option>';
			echo '<option value="5">May</option>';
			echo '<option value="6">June</option>';
			echo '<option value="7">July</option>';
			echo '<option value="8">August</option>';
			echo '<option value="9">September</option>';
			echo '<option value="10">October</option>';
			echo '<option value="11">Novemeber</option>';
			echo '<option value="12">December</option>';
			?>
			</select>
			<select name="selectyear">
			<?php
			for($i=2019; $i>=1900; $i--){
					if($i == 1996){
							echo '<option value="'. $i .'" selected>'. $i .'</option>';
					}
					echo '<option value="'. $i .'">'. $i .'</option>';
			}
			?>
			</select>
			<br><br>

			<label>Hometown :<?= $row55['user_hometown'] ?></label>
			<input type="text" name="editHometown" value="<?php echo $row55['user_hometown'] ?>">
			<label>Status : <?= $row55['user_status'] ?></label>
	<select  name="editradio" value="<?php echo $row55['user_status'] ?>">
				<option value="S" >Single </option>
				<option value="E" >Engaged </option>
				<option value="M" >Married </option>
		</select>
			<label>About me : <?= $row55['user_about'] ?></label>
			<textarea  rows="6" name="editaboutme" value="<?php echo $row55['user_about'] ?>"></textarea>
		<input type="submit"  name="save" value='save'>
</form>
</center>
</div>
<script src="resources/js/main.js"></script>
</body>
</html>
