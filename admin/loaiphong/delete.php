<?php
 //B1. Ket noi
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
 

if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query1="select * from phong where MaLP='{$id}'";
   $result=mysqli_query($link, $query1) or die(mysqli_error($link));
    if(mysqli_num_rows($result)>0)
    {
        header("location:loaiphong.php?error=ok&p=1");
    }
    else
    {
    if(isset($_REQUEST['ha']))
    {
        $ha=$_REQUEST['ha'];
        unlink("../../images/loaiphong/$ha");
    }
    $query="delete from loaiphong where MaLP='{$id}'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_affected_rows($link)>0)
    {
        header("location:loaiphong.php?xoa=ok&p=1");
    }
    }
}
?>