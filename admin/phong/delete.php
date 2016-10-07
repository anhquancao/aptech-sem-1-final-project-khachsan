<?php
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query="delete from phong where MaP='{$id}'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_affected_rows($link)>0)
    {
        if(isset($_REQUEST['lp']))
        {
           $lp=$_REQUEST['lp'];
           header("location:phong.php?xoa=ok&p=1&lp=".$lp);}
           else {header("location:phong.php?xoa=ok&p=1");}   
        
    }
}
?>