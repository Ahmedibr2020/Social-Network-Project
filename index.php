<?php
require 'login.php';

if (isset($_SESSION['user_id'])) {
    header("location:home.php");
}
session_destroy();
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Zooka Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <style>
        .container{
            margin: 40px auto;
            width: 400px;
        }
        .content {
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 5px #4267b2;
        }
    </style>
</head>
<body>
    <h1>Zooka Social Network </h1>

    <div class="container">
      <div class="tab">
        <button class="tablink active" onclick="openTab(event,'signin')" id="link1">Login</button>
        <button class="tablink" onclick="openTab(event,'signup')" id="link2">Sign Up</button>
      </div>
        <div class="content">
            <div class="tabcontent" id="signin">
                <form method="post" action="login.php" onsubmit="return validateLogin()">
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="loginuseremail">
                    <div class="required"></div>
                    <br>
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="loginuserpass">
                    <div class="required"></div>
                    <br><br>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>
            <div class="tabcontent" id="signup">
                <form method="post" action="login.php" onsubmit="return validateRegister()">
                    <!--Package One-->
                    <h2>Highly Required Information</h2>
                    <hr>
                    <!--First Name-->
                    <label>First Name<span>*</span></label><br>
                    <input type="text" name="userfirstname" id="userfirstname">
                    <div class="required"></div>
                    <br>
                    <!--Last Name-->
                    <label>Last Name<span>*</span></label><br>
                    <input type="text" name="userlastname" id="userlastname">
                    <div class="required"></div>
                    <br>
                    <!--Nickname-->
                    <label>Nickname</label><br>
                    <input type="text" name="usernickname" id="usernickname">
                    <div class="required"></div>
                    <br>
                    <!--Password-->
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass">
                    <div class="required"></div>
                    <br>
                    <!--Confirm Password-->
                    <label>Confirm Password<span>*</span></label><br>
                    <input type="password" name="userpassconfirm" id="userpassconfirm">
                    <div class="required"></div>
                    <br>
                    <!--Email-->
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail">
                    <div class="required"></div>
                    <br>
                    <!--Birth Date-->
                    Birth Date<span>*</span><br>
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
                    <!--Gender-->
                    <label>Gender</label>
                    <input type="radio" name="usergender" value="M" id="malegender" class="usergender">
                    <label>Male</label>
                    <input type="radio" name="usergender" value="F" id="femalegender" class="usergender">
                    <label>Female</label>
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Hometown</label><br>
                    <input type="text" name="userhometown" id="userhometown">
                    <br>
                    <!--Package Two-->
                    <h2>Additional Information</h2>
                    <hr>
                    <!--Marital Status-->
                    <input type="radio" name="userstatus" value="S" id="singlestatus">
                    <label>Single</label>
                    <input type="radio" name="userstatus" value="E" id="engagedstatus">
                    <label>Engaged</label>
                    <input type="radio" name="userstatus" value="M" id="marriedstatus">
                    <label>Married</label>
                    <br><br>
                    <!--About Me-->
                    <label>About Me</label><br>
                    <textarea rows="12" name="userabout" id="userabout"></textarea>
                    <br><br>
                    <input type="submit" value="Create Account" name="register">
                </form>
            </div>
        </div>
    </div>
    <script src="resources/js/main.js"></script>
</body>
</html>
