<?php
session_start();
if(isset($_SESSION['user_id']))
{
    $conn=mysqli_connect('localhost','admin','admin','asd');
    if(!$conn)
    {
        die('server not connected');
    }
    $sql="select * from song";
    $res=mysqli_query($conn,$sql);
    $html='<table>
    <tr>
        <td>Name</td>
        <td>Gen</td>
    </tr>';
    while($row=mysqli_fetch_assoc($res)){
        $html.='<tr><td>'.$row['name'].'</td><td>'.$row['gen'].'</td></tr>';
    }
    $html.='</table>';
    echo $html;
    header('Content-Type:application/xls');
    header('Content-Disposition:attachement;filename=report.xls');
}
else
echo"not salve";
?>