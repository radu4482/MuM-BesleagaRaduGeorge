<?php
include "likeC.php";
$conn=mysqli_connect('localhost','admin','admin','asd');
if(!$conn)
{
    die('server not connected');
}

$song_id=$_GET['SongId'];
$user_id=$_GET['UserId'];

if(verify($song_id,$user_id)!=0)
    unlike($song_id,$user_id);
else
    like($song_id,$user_id);
$result=$conn->query("select count(*) from `like` where song_id='$song_id'");
$count=$result->fetch_row();
echo" number of likes: ";
mysqli_close($conn);
echo json_encode($count);
?>