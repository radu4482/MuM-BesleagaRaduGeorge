<?php 
    session_start();

    echo "test";
    $check_id = $_SESSION['user_id'];

    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    echo "test";

    $rows = $conn->query("select id from user where username='$check_id'");
    $rows = $rows->fetch_row();

    $result = $rows[0];
    
    $login_session = $result;
    
    if(!isset($_SESSION['user_id']))
    {
        header("location : login.php");
        die();
    }


?>