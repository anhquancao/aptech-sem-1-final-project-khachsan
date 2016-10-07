<?php
 //B1. Ket noi
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
 
if(isset($_REQUEST['ha']))
{
    $ha=$_REQUEST['ha'];
    unlink("../../images/dichvu/$ha");
}
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query="delete from dichvu where MaDV='{$id}'";
    
    //B3.Thuc thi
    mysqli_query($link, $query) or die(mysqli_error($link));
    
    //B4. Kiem tra, 
    if(mysqli_affected_rows($link)>0)
    {
        header("location:dichvu.php?xoa=ok&p=1");
    }
}
?>