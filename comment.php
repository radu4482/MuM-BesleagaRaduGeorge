<?php

session_start();
if(isset($_SESSION['user_id']))
{

if( isset($_POST['comm_post'])&&
    !empty($_POST['comm_post'])&&
    isset($_POST['submit_comm_post']))
{
    addComment($_POST['song_id'],$_SESSION['user_id'],$_POST['comm_post']);
}
}else
header("Location: login.php");

function addComment($song_id,$user_id,$comm)
{
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $time=date("Y-m-d H:i:s");
    $query="insert into comment (song_id,user_id,comm,time_upload) 
    values ('{$song_id}','{$user_id}','{$comm}','{$time}')";
    $result = $conn->query($query);

    if(mysqli_affected_rows($conn)>0)
    {
        echo "audio file path saved in database.";
    ?><script>window.history.go(-1);</script><?php
    }

    mysqli_close($conn);
}

?>