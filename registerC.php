
<?php



if( isset($_POST['user_username']) &&
    isset($_POST['user_password']) &&
    isset($_POST['user_password_repet']) &&
    isset($_POST['user_email']) &&
    isset($_POST['submit_login']) &&
          $_POST['submit_login']=="SetUser")
    {
    $aux=1;
    if(verifyUsername($_POST['user_username'])!=0)
    {
    echo 'username used already!';
    $aux=0;
    }
    if($_POST['user_password']!=$_POST['user_password_repet'] || empty($_POST['user_password']))
    {
    echo 'password empty or repeted incorrectly!';
    $aux=0;
    }
    if(verifyEmail($_POST['user_email'])!=0)
    {
    echo 'email already used!';
    $aux=0;
    }
    if($aux>0)
    {
        register($_POST['user_username'],$_POST['user_password'],$_POST['user_email']);
        
        header("Location: index.php");
        
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

function verifyEmail($email){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $result = $conn->query("select count(*) from user where email='{$email}'");
    $count = $result->fetch_row();
    mysqli_close($conn);
    return $count[0];
}

function register($username,$password,$email){
    
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $aux=0;
    $query="insert into user(admin,username,password,email)values('0','{$username}','{$password}','{$email}')";
    mysqli_query($conn,$query);

    if(mysqli_affected_rows($conn)>0)
    {
        echo "audio file path saved in database.";
    }

    mysqli_close($conn);
}

function verify()
{
    if(isset($_POST['user_username'])&&isset($_POST['user_password'])&&isset($_POST['user_password_repet'])&&isset($_POST['user_email'])&&isset($_POST['submit_login'])&& $_POST['submit_login']=="Upload Audio")
    {
        $aux=1;
        if(verifyUsername($_POST['user_username'])>0)
        {
        echo 'username used already!';
        $aux=0;
        }
        if($_POST['user_password']!=$_POST['user_password_repet'])
        {
        echo 'please repet correctly the password!';
        $aux=0;
        }
        if(verifyEmail($_POST['user_email'])>0)
        {
        echo 'email already used!';
        $aux=0;
        }
        return $aux;
    }
}

?>