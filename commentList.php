<?php

function displayComments($song_id)
{
   $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }
        echo "COMMENTS:";
        echo "</br>";
        $query="select time_upload,comm from comment where song_id='$song_id' order by time_upload desc Limit 5";
        $result = $conn->query($query);
        while( $fields = mysqli_fetch_array($result) )
    {
        echo "</br>";
        echo $fields[0]."..........".$fields[1];
        echo "</br>";
    }

}
?>