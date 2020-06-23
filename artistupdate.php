<?php

if(isset($_POST['update_submit_artist'])&& 
   !empty($_POST['update_artist_name'])&&
   !empty($_POST['update_artist_music_type'])&&
   isset($_POST['update_artist_name'])&&
   isset($_POST['update_artist_music_type'])&&
   $_POST['update_submit_artist']=="Update Artist")
{
    $artistName=$_POST['update_artist_name'];
    $artistMusicType=$_POST['update_artist_music_type'];

    updateArtist($artistName,$artistMusicType);
}

function verifyArtist($artistName){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $id_get = mysqli_query($conn, "SELECT count(*) FROM artist WHERE name='$artistName' ");
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

function updateArtist($artistName,$gender){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    if(verifyArtist($artistName)==0){
       
        $sql = "UPDATE artist SET gender='$gender' WHERE name='$artistName'";

        if ($conn->query($sql) === TRUE)
        {
        echo "Record updated successfully";
        } 
        else 
        {
        echo "Error updating record: " . $conn->error;
        }
    }
}

?>