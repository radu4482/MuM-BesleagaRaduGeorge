<!DOCTYPE html>
<head> <link rel="stylesheet" type="text/css" href="main.css"></head>
<body>
<?php
    session_start();
    include('like.php');
    include('commentList.php');

    function getName($song_id){
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }

        $sql=mysqli_query($conn,"select name from song where id='$song_id'");
        $result=mysqli_fetch_row($sql);

        echo $result[0];
    }

    function getGender($song_id){
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }

        $sql=$conn->query("select gen from `song` where id='$song_id'");
        $result=$sql->fetch_row();

        echo $result[0];
    }


    function likeNumber($song_id){
        $conn=mysqli_connect('localhost','admin','admin','asd');
        if(!$conn)
        {
            die('server not connected');
        }

        $sql=mysqli_query($conn,"select count(*) from `like` where song_id='$song_id'");
        $result=mysqli_fetch_row($sql);

        return $result[0];
    }




    if(isset($_SESSION['user_id']))
    {
?>
<!DOCTYPE html>
<html>
<body>

<div>
   <ul> 
    <h4>name is: <?= getName($_GET['id']);?></h4>
    
    <h4>type is
    <?=getGender($_GET['id']);?></h4>
    
    <h4>number of likes: <?= LikeNumber($_GET['id']);?></h4>
   </ul>

</div>
<div id="audio_div">
<audio controls>
    <source src="<?php echo $_GET['path'];?>" type="audio/mpeg">
    </source>
</audio>
    </div>
<div id="related_links">
<ul>
<li><a href="main.php">Home</a></li>
<li><a href="upload.php">Back</a></li>
<li>
<?php 
    if(verify($_GET['id'],$_SESSION['user_id'])==0)
    echo '<a href="like.php?type=like&id='.$_SESSION['user_id'].'&song_id='.$_GET['id'].'">Like</a>';
    else
    echo '<a href="like.php?type=unlike&id='.$_SESSION['user_id'].'&song_id='.$_GET['id'].'">Unike</a>';
    $song_id=$_GET['id'];
?></li>
<li><button type="button" onclick="setTimeout(ajaxcall, 3000)">LikeButton</button> </li>
</ul>
</div>
</br></br>
<div>
<?php
    displayComments($_GET['id']);
    echo "</br>";
?></div>

<div>
<form action="comment.php" method ="POST" enctype="multipart/form-data">
<input type="text" name ="comm_post" placeholder="How do you feel ?">
<input type="hidden" name='song_id' value='<?= $_GET['id']?>'>
<input type="submit" value="Post Comment" name ="submit_comm_post"/>
</form>
    </div>




</body>
<script>


function ajaxcall() { 

   var xhttp = new XMLHttpRequest();

   xhttp.onreadystatechange = function() 
   {
   if (xhttp.readyState == 4 && xhttp.status == 200)
     {
       json_object = JSON.parse(xhttp.responseText)
       var count = json_object.count
       /// set this count variable in element where you want to
       /// display count
   }
   };
   xhttp.open("GET", "count.php", true);
   xhttp.send();
   setTimeout(ajaxcall, 1000);
 }
 </script>

</script>


<?php
} else
 
{
    header("Location :login.php");
}
?>


</body>
</html>