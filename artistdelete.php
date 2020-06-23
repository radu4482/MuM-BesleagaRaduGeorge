<?php

if(isset($_POST['delete_submit_artist'])&& 
   !empty($_POST['delete_artist_name'])&&
   isset($_POST['delete_artist_name'])&&
   $_POST['delete_submit_artist']=="Delete Artist")
{
    $artistName=$_POST['delete_artist_name'];

    deleteArtist($artistName);
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

function deleteArtist($artistName){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    if(verifyArtist($artistName)==0){
       
        $sql = "delete from artist where name='$artistName'";

        if ($conn->query($sql) === TRUE)
        {
        echo "Record deleted successfully";
        } 
        else 
        {
        echo "Error updating record: " . $conn->error;
        }
    }
}

?>