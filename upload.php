<?php

include "artistupload.php";
?>
<!DOCTYPE html>
<head> <link rel="stylesheet" type="text/css" href="list.css"></head>
<body>
<?php
session_start();
if(isset($_SESSION['user_id']))
{
    ?><div><a href="main.php">Back</a></div><?php
    if(isset($_POST['save_audio']) &&
      isset($_POST['artist']) &&
       $_POST['save_audio']=="Upload Audio")
            {
                $artistName;
                $dir="uploads/";
                $audio_path=$dir.basename($_FILES['audioFile']['name']);
                $audio_name=$_FILES['audioFile']['name'];
                if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
                {
                    saveAudio($audio_path,$audio_name,$_POST['artist']);
                    displayAudios();
                }
            }
            else{
                displayAudios();
            }

} 
else
    {
        header("Location :login.php");
    }


function displayAudios(){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $query="select * from song";

    $r = mysqli_query($conn,$query);

    mysqlI_close($conn);
    ?>

    <?php
    while($row=mysqli_fetch_array($r)){
        

   ?> <div><?php echo '<a href="play.php?id='.$row['id'].'&path='.$row['path'].'">'.$row['name'].'</a>';?></div><?php
        }?>
        <?php
}


function getArtist($artistName){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $id_get = mysqli_query($conn, "SELECT id FROM artist WHERE name='$artistName' LIMIT 1");
    $id = mysqli_fetch_row($id_get);

    if($id==NULL){
        addArtist($artistName,"nu stim");
        mysqli_close($conn);
        return getArtist($artistName);}
    else
    {
        mysqli_close($conn);
        return $id;
    }
}

function getGender($artist_id){
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $sql = mysqli_query($conn,"select gender from artist where id='$artist_id'");
    $result = mysqli_fetch_row($sql);

    mysqlI_close($conn);
    return $result[0];
}

function saveAudio($filePath,$fileName,$artistName)
{
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }


    $artist_id=getArtist($artistName);
    $artist_id=implode('',$artist_id);
    $artist_music_type=getGender($artist_id);
    if(verifyAudio($fileName)>0)
    {
        echo "already uploaded";
    }
    else {
        $query="insert into song(artist_id,name,path,gen)values('{$artist_id}','{$fileName}','{$filePath}','{$artist_music_type}')";
        mysqli_query($conn,$query);

        if(mysqli_affected_rows($conn)>0)
        {
            ;
        }
    }
    mysqli_close($conn);
}

function verifyAudio($fileName)
{
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $sql=mysqli_query($conn,"select count(*) from `song` where name='$fileName'");
    $result=mysqli_fetch_row($sql);
    mysqli_close($conn);

    return $result[0];
}
?>