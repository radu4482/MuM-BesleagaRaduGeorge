<?php

if(!empty($_POST['user_name']) &&
    isset($_POST['Role']) &&
    isset($_POST['submit_role']) &&
    $_POST['submit_role']=="SetRole"
){
    $username=$_POST['user_name'];
    if($_POST['Role']==0)
        rankAdmin($username);
        else
        unrankAdmin($username);
}
else echo "didn't worked!";


function rankAdmin($username){
    if(verifyUser($username)!=0){

        $conn=mysqli_connect('localhost','admin','admin','asd');

        if(!$conn)
        {
            die('server not connected');
        }

        $query="update user set admin='1' where username='$username'";
        mysqli_query($conn,$query);
       
        if(mysqli_affected_rows($conn)>0)
        {
            echo "audio file path saved in database.";
        }
        else
            echo "nu a mers";

    }
    else 
    echo "This username does not exist!";
}

function unrankAdmin($username){
    if(verifyUser($username)!=0){

        $conn=mysqli_connect('localhost','admin','admin','asd');

        if(!$conn)
        {
            die('server not connected');
        }

        $query="update user set admin='0' where username='$username'";
        mysqli_query($conn,$query);
       
        if(mysqli_affected_rows($conn)>0)
        {
            echo "audio file path saved in database.";
        }
        else
            echo "nu a mers";

    }
    else 
    echo "This username does not exist!";
}


function verifyUser($username){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $query="select count(*) from user where username='$username'";

    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    return $result->fetch_row();
}


?>