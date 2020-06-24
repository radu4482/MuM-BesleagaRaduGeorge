<?php
session_start();
if(isset($_SESSION['user_id']))
{
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<title>Mum</title> <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php

$this_id=$_SESSION['user_id'];
$conn=mysqli_connect('localhost','admin','admin','asd');
if(!$conn)
        {
            die('server not connected');
        }

$sql= $conn->query("select admin from user where id='$this_id'");
$result= mysqli_fetch_array($sql);

if($result['admin']=='1')
{
?>

<div>
This is for file <br /><br />
<form action="upload.php" method ="POST" enctype="multipart/form-data">
<input type="file" name ="audioFile">
<input type="text" name = "artist" placeholder="Artist">
<input type="submit" value="Upload Audio" name ="save_audio"/>
</form>
  <br /><br />
<form action="deleteSong.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="delete_audio_id" placeholder="Song Id">
<input type="submit" value="Delete Audio" name ="delete_audio_submit"/>
</form>
 <br /><br />
</div>
<div>
This is for Artist <br /><br />
<form action="artistupload.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="artist_name" placeholder="Artist name">
<input type="text" name = "artist_music_type" placeholder="Music Gender">
<input type="submit" value="Set Artist" name ="submit_artist"/>
</form>

  <br /><br />
<form action="artistupdate.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="update_artist_name" placeholder="Artist name">
<input type="text" name = "update_artist_music_type" placeholder="Music Gender">
<input type="submit" value="Update Artist" name ="update_submit_artist"/>
</form>

  <br /><br />
<form action="artistdelete.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="delete_artist_name" placeholder="Artist">
<input type="submit" value="Delete Artist" name ="delete_submit_artist"/>
</form>
</div>

<div>
This is for Admin <br /><br />
<form action="admin.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="user_name" placeholder="Username"/>
<select id="cmbMake" name="Role">
    <option value="0">Make admin</option>
    <option value="1">Remove admin</option>
</select>
<input type="submit" value="SetRole" name ="submit_role"/>
</form>
 <br /><br />
</div>
<?php } ?>

<div>
This is search <br /><br />
<form action="search.php" method="POST">
<input type="search" name="search_name" placeholder="Artist, song...">
<input type="submit" name="submit_search" value="SearchIt">
</form>
</div>
<div id="related_links">
<ul>
<li><a href="logout.php">LogOut</a></li>
<li><a href="upload.php"> Music </a></li>
<li><a href="exportCSV.php"> CSV Download </a></li>
<li><a href="exportXLS.php"> XLS Download </a></li>
</ul>
</div>
</body>


</html>

<?php
} else
 
{
    header("Location :login.php");
}

?>