


<?php


        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }


        $song_id=$_GET['SongId'];
        $user_id=$_GET['UserId'];
        $comm=$_GET['Comment'];
        addComment($song_id,$user_id,$comm);
        $query="select time_upload,comm from comment where song_id='$song_id' order by time_upload desc Limit 5";
        $result = $conn->query($query);

        $finish=array();
        while( $fields = mysqli_fetch_array($result) )
    {

         ?><p><?= $fields[0]."..........".$fields[1];?></p><?php
    }
    echo json_encode($finish);




    function addComment($song_id,$user_id,$comm)
{
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $time=date("Y-m-d H:i:s");
    if(!empty($comm)){
    $query="insert into comment (song_id,user_id,comm,time_upload) 
    values ('{$song_id}','{$user_id}','{$comm}','{$time}')";
    $result = $conn->query($query);

    mysqli_close($conn);
}
}

?>