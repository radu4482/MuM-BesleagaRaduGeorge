<?php
$conn=mysqli_connect('localhost','admin','admin','asd');
if(!$conn)
{
    die('server not connected');
}

$id=$_GET['id'];

$result=$conn->query("select count(*) from like where song_id='$id'");
$count=$result->fetch_row();
echo $count;
$arr = array('count' => $count);
mysqli_close($conn);
echo json_encode($arr);
?>