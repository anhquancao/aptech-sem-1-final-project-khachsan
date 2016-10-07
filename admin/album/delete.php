<?php
 //B1. Ket noi
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
 
if(isset($_REQUEST['anh']))
{
    $ha=$_REQUEST['anh'];
    unlink("../../images/album/$ha");
}
if(isset($_REQUEST['anh']) and isset($_REQUEST['maal']))
{   
    $id=$_REQUEST['maal'];
    $anh=$_REQUEST['anh'];
    $query="delete from anh where Anh='{$anh}'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_affected_rows($link)>0)
    {
        header("location:anh.php?xoa=ok&p=1&id=".$id);
    }
}
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    
    $unlink="select * from anh where MaAlbum=$id";
    $result=mysqli_query($link, $unlink);
    if(mysqli_num_rows($result)>0)
        {
        while($r= mysqli_fetch_array($result))
            {
                unlink("../../images/album/$r[2]");
            }
        }
    $daidien="select * from album where MaAlbum=$id";
    $daidien1=mysqli_query($link, $daidien);
    $daidien2= mysqli_fetch_array($daidien1);
    unlink("../../images/album/$daidien2[4]");
            
    $xoaanh="delete from anh where MaAlbum=$id";
    mysqli_query($link, $xoaanh);
    $xoaal="delete from album where MaAlbum=$id";
    mysqli_query($link, $xoaal);
    if(mysqli_affected_rows($link)>0)
    {
        header("location:album.php?xoa=ok&p=1");
    }
}
?>