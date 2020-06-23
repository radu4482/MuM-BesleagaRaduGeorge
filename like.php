<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);
    
    $sound=json_encode($json_obj);
    echo json_encode($sound["song_id"][0]);
    
    // if(verify($json_obj,$_SESSION['user_id'])!=0)
    //     unlike($json_obj['song_id'],$_SESSION['user_id']);
    //     else
    //     like($json_obj['song_id'],$_SESSION['user_id']);
    
}
else
if(isset($_GET['type'],
         $_GET['id'],
         $_GET['song_id']))
{
    $type=$_GET['type'];
    $user_id=intval($_GET['id']);
    $song_id=intval($_GET['song_id']);

    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    switch($type){
        case 'like':
            {
                like($song_id,$user_id);
            break;
            }
        case 'unlike':
            {
                unlike($song_id,$user_id);
            break;
            }
    }
}else
if(!isset($_POST['song_id']))
{  

}




function showLikes($song_id){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $result=$conn->query("select count(*) from like where song_id='$song_id'");
    $count=$result->fetch_row();
    echo $count;
    mysqli_close($conn);
}



function verify($song_id,$user_id)
{

    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $result=$conn->query("SELECT COUNT(*) FROM `like` WHERE song_id='$song_id' and user_id='$user_id'");
    $count=$result->fetch_row();
    mysqli_close($conn);
    return $count[0];
}



function like($song_id,$user_id){
    if(verify($song_id,$user_id)!=0)
    echo "already liked!";
    else
    {
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }
        
        $sql="INSERT INTO `like` (song_id,user_id) VALUES ('{$song_id}','{$user_id}')";
            mysqli_query($conn,$sql);
                echo "it worked!";
                function likeNumber($song_id){
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }

        $sql=mysqli_query($conn,"select count(*) from `song` where song_id='$song_id'");
        $result=mysqli_fetch_row($sql);
        showLikes($song_id);
        mysqli_close($conn);
        return $result[0];
    }
    }

}



function unlike($song_id,$user_id){
    if(verify($song_id,$user_id)==0)
    echo "not even liked!";
    else
    {
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }
        
        $sql="DELETE FROM `like` WHERE song_id='$song_id' and user_id='$user_id'";
            mysqli_query($conn,$sql);
                echo "it worked!";
                showLikes($song_id);
    }
}


?>