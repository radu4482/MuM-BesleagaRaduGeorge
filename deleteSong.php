<?php

if(isset($_POST['delete_audio_id'])&& 
   !empty($_POST['delete_audio_id'])&&
   isset($_POST['delete_audio_submit'])&&
   $_POST['delete_audio_submit']=="Delete Audio")
{
    $audioId=$_POST['delete_audio_id'];
    deleteAudio($audioId);
}
else{
    echo"not well";
} 

function verifyAudio($audioId){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $id_get = mysqli_query($conn, "SELECT count(*) FROM song WHERE id='$audioId' ");
    $id = mysqli_fetch_row($id_get);
    mysqlI_close($conn);

    if($id[0]!=0){
        return '0';
    }
    else
    {
        return '1';
    }
}

function deleteAudio($audioId){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    if(verifyAudio($audioId)==0){

        $path_get = mysqli_query($conn, "select path from song where id='$audioId'");
        $path = mysqli_fetch_row($path_get);
        unlink(realpath($path));

        $sql = "delete from song where id='$audioId'";
        if ($conn->query($sql) === TRUE)
        {
            echo "Record deleted successfully";
            $sql = "delete from like where song_id='$audioId'";
            $conn->query($sql);
        }
        else 
        {
        echo "Error updating record: " . $conn->error;
        }
    }
    mysqli_close($conn);
}

?>