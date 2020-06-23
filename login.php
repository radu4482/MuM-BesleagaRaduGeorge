<?php

if(!isset($_SESSION['userId'])){
?>
<!DOCTYPE html>
<head> <link rel="stylesheet" type="text/css" href="Login.css"></head>
<body>
<div id="login" class="loginbox" style="display:block;">
			<h1>LogIn </h1>
<form action="loginC.php"  enctype="multipart/form-data" method="POST">
    <h4>Username</h4>
    <input type="text" name="user_username" >
</br>
    <h4>Password</h4>
    <input type="password" name="user_password">
</br>
    <input type="submit" value="SubmitLogIn" name="submit_login">
</br>
</form>

<a href="register.php"> Register</a>
</div>
</body>
<?php
}
else 
header("Location :main.php");
?>