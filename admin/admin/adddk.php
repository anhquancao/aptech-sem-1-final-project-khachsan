<?php
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'"); 
 
    if(isset($_REQUEST['id']))
    {
        $user=$_REQUEST['id'];
        $query="update admin set Quyen='0' where MaAD=$user";
        mysqli_query($link, $query);
        if(mysqli_affected_rows($link)>0)
        {
            header("location:admin.php?them=ok");
        }
    }
?>