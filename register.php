<?php

if(!isset($_SESSION['userId'])){
?>

<!DOCTYPE html>
<html  lang="ro" dir="ltr">
<head> 
    
<title>Mum</title>
    <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
<div>
<h1>Register </h1>
<form action="registerC.php"  method="POST" enctype="multipart/form-data">
    <h4>Username</h4>
    <input type="text" name="user_username">

    <h4>Password</h4>
    <input type="password" name="user_password" >
    
    <h4>Repet Password</h4>
    <input type="password" name="user_password_repet" >

    <h4>Email</h4>
    <input type="email" name="user_email" >

    <input type="submit" name="submit_login" value="SetUser">

</form>

<a href="index.php"> LogIn</a>
</div>
</body>
</html>
<?php
}
else 
header("Location :main.php");
?>