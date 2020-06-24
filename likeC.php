<?php

function showLikes($song_id){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $result=$conn->query("select count(*) from `like` where song_id='$song_id'");
    $count=$result->fetch_row();
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
                showLikes($song_id);
    }
}


?>