<?php 

session_start();

if(
    isset($_POST['user_username']) &&
    isset($_POST['user_password']) &&
    isset($_POST['submit_login'])  &&
    $_POST['submit_login']=="SubmitLogIn")
   {

        echo "test";
       if(verifyUsername($_POST['user_username'])==0)
       {
           echo "this username does not exist";
       }
       else
       {
            $username=$_POST['user_username'];
            $password=$_POST['user_password'];
     

            $conn=mysqli_connect('localhost','admin','admin','asd');
            if(!$conn)
            {
                die('server not connected');
            }

            $result = mysqli_query($conn,"select * from user where username='$username'and password='$password'");


    
                if(mysqli_num_rows($result))
                {
                
                    $sql= mysqli_query($conn,"select id from user where username='$username'");
                    mysqli_close($conn);

                    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
                    $userId=$row["id"];
                    
                    $_SESSION['user_id'] = $userId;
                    
                    header("Location: main.php");
                }
                else    
                {
                    echo "incorect password";
                    mysqli_close($conn);
                }



       }
    }

   function verifyUsername($username){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $result = $conn->query("select count(*) from user where username='{$username}'");
    mysqli_close($conn);
    $count = $result->fetch_row();
    return $count[0];
}

function verifyPassword($username,$password){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $result = $conn->query("select count(*) from user where username='$username'and password='$password'");
    mysqli_close($conn);

    $count = $result->fetch_row();
    return $count;
}


?>