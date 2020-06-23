<?php
session_start();
if(isset($_SESSION['user_id']))
{

//salveaza melodia in fisierul "uploads"
    if(isset($_POST['search_name']) &&
      !empty($_POST['search_name']) &&
       isset($_POST['submit_search']) &&
       $_POST['submit_search']=="SearchIt")
            {
                ?>
                <!DOCTYPE html>
                <head> <link rel="stylesheet" type="text/css" href="list.css"></head>
                <body>
                <div ><a href="main.php">Back</a></div>
                <?php
                $searchFor=$_POST['search_name'];

                $conn=mysqli_connect('localhost','admin','admin','asd');
                    if(!$conn)
                    {
                        die('server not connected');
                    }

                $query="select s.id, s.path, s.name
                            from song s join artist a 
                                where s.name like '$searchFor' and s.artist_id=a.id 
                                   or a.name like '$searchFor' and s.artist_id=a.id 
                        ";

                $r = mysqli_query($conn,$query);
                mysqlI_close($conn);


                if($r==NULL){
                    echo "Error, song not found";
                    echo "</br>";
                    ?><body>
                        <a href="main.php">Back</a>
                    </body>
                    <?php 
                }
                else
                while($row=mysqli_fetch_array($r)){
                    

                    ?>
                    <div>
                        <?php 
                        echo '<a href="play.php?id='.$row['id'].'&path='.$row['path'].'">'.$row['name'].'</a>';
                        ?>
                    </div>
                    <?php
                }
                ?></body></html><?php
            } 
            else{
                header("Location :main.php");
            }
}
else
    {
        header("Location :login.php");
    }
    ?>