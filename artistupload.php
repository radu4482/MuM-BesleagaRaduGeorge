<?php
//salveaza artistul
function addArtist($artistName,$gender){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    if(uniqueArtist($artistName)=='1')

    $query="insert into artist(name,gender)values('{$artistName}','{$gender}')";
    mysqli_query($conn,$query);

    if(mysqli_affected_rows($conn)>0)
    {
        echo "audio file path saved in database.";
        
    }
    ?><body
    ><a href="main.php">Back</a></body>
    <?php
    mysqli_close($conn);
}


if(isset($_POST['submit_artist'])&& !empty($_POST['artist_name'])&&!empty($_POST['artist_music_type'])&& isset($_POST['artist_name'])&&isset($_POST['artist_music_type'])&& $_POST['submit_artist']=="Set Artist")
{
    $artistName=$_POST['artist_name'];
    $artistMusicType=$_POST['artist_music_type'];

    addArtist($artistName,$artistMusicType);
}


function uniqueArtist($artistName){
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


?>