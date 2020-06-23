<?php
session_start();
if(isset($_SESSION['user_id']))
{

    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }

    $filename="export.csv";
    header("Content-Type:text/csv;");
    header("Content-Disposition: attachment; filename=$filename");

    $fp=fopen("php://output", "w");
 
    fputcsv($fp,array('nume','gen'));

    $query="select name, gen from song order by gen";
    $my_stuff=mysqli_query($conn,$query);
    while($fields=mysqli_fetch_assoc($my_stuff))
    {
        fputcsv($fp,$fields);
    }
    
    fclose($fp);
}
else
header("Location: login.php")
?>