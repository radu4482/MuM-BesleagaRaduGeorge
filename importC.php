<?php
 echo"0";
 echo"2";
if(isset($_POST['upload_csv']))
 {
    if($_POST['csvFile']['name'])
    {
        $filename=explode(".",$_FILES['csvFile']['name']);
        if(end($filename)=="csv")
        {
            $conn=mysqli_connect('localhost','admin','admin','asd');
            if(!$conn)
            {
                die('server not connected');
            }
            echo"1";
            $handle=fopen($_FILES['csvFile'],['tmp_name'],"r");
            echo"1";
            while($data=fgetcsv($handle))
            {
                
                $artist_name=mysqli_real_escape_string($conn,$data,[0]);
                $artist_gender=mysqli_real_escape_string($conn,$data,[1]);
                echo $artist_name."..........".$artist_gender;
                echo"</br>";
                $query="update artist set gender='$artist_gender' where name='$artist_name'";
                mysqli_query($conn,$query);
            }
            mysqli_close($conn);
            $fclose($handle);
        }
        else
        echo"fisierul nu e csv";
    }
    else
    echo "Nu exista fisier";
}
else"nu intra in if";




?>