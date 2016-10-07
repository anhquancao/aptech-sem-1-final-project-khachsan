<?php
ob_start();
?>
<?php
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="../../index.php">Victoria Hotel</a></h1>
			<div id="top-navigation">
				Welcome  <strong><?php 
session_start();
$a=$_SESSION['lg_username'];
$ss="select Quyen from admin where User='$a'";
$ss1=mysqli_query($link, $ss);
$ss2=mysqli_fetch_array($ss1);
if(!isset($_SESSION['login']) || $_SESSION['login'] != "ok")
{
    header("location:../login.php");
}
else
{
    echo $_SESSION['lg_username'];
         
}
?></strong>
                                <?php
                                $q1="select * from admin where User='$a'";
                                    $re1= mysqli_query($link, $q1) or die (mysqli_error($link));
                                    $r1= mysqli_fetch_array($re1);
                                echo"
                                <span>|</span>
                                <a href='../admin/view.php?id=$r1[0]'>View Profile</a>";?>
                                <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<span>|</span>
                                <a href='../admin/setting-trangchu.php'>Setting</a>";
                                  }
                                ?>
				<span>|</span>
				<a href="../login.php?logout=<?php echo $a ?>">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="../../index.php" ><span>Trang chủ</span></a></li>
			    <li><a href="../dondatphong/dondatphong.php?p=1"><span>Đơn đặt phòng</span></a></li>
			    <li><a href="../phong/phong.php?p=1"><span>Phòng</span></a></li>
			    <li><a href="../loaiphong/loaiphong.php?p=1"><span>Loại phòng</span></a></li>
                            <li><a href="../dichvu/dichvu.php?p=1"><span>Dịch vụ</span></a></li>
			    <li><a href="../quangcao/quangcao.php?p=1"><span>Quảng cáo</span></a></li>
                            <li><a href="../tintuc/tintuc.php?p=1"><span>Tin tức</span></a></li>
                            <li><a href="../hotro/hotro.php?p=1"><span>Hỗ trợ</span></a></li>
                            <li><a href="../lienhe/lienhe.php?p=1"><span>Liên Hệ</span></a></li>
                            <li><a href="album.php?p=1" class="active" ><span>Album</span></a></li>
                            <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<li><a href='../admin/admin.php?p=1'><span>Quản lý Admin</span></a></li>";
                                  }
                            ?>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="album.php?p=1">Album</a>
			<span>&gt;</span>
			Ảnh trong album
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
                        <div id="content" style="width: 700px;">
				
				<!-- Box -->
                                <div class="box" style="height:500px; width: 700px">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Ảnh trong Album:
                                                    <?php
                                                        $id=$_REQUEST['id'];
                                                        $tenal="select * from album where MaAlbum=$id";
                                                        $tenal1=  mysqli_query($link, $tenal);
                                                        $tenalr= mysqli_fetch_array($tenal1);
                                                        echo $tenalr[1];
                                                        $soanh="select count(MaAnh) from anh where MaAlbum='$id'";
                                                        $soanh1= mysqli_query($link, $soanh);
                                                        $s= mysqli_fetch_array($soanh1);
                                                        echo" ($s[0] ảnh)";
                                                    ?>
                                                </h2>
						<div class="right">
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 440px; text-align: center">
    <?php
    if(isset($_REQUEST['anh']))
{
    $anh=$_REQUEST['anh'];
    echo"<div style='float: right;padding-right: 10px; padding-top: 5px;'><a href='anh.php?p=1&id=$id'><img src='../css/images/back.jpg' width='30px' height='30px'/></a><br/><br/><br/><a onclick="."check('{$anh}','{$id}')"."><img src='../css/images/delete.jpg' width='20px' height='20px'></a></div>";
} else {
    echo"<a href='album.php?p=1' title='Về danh sách Albums'style='float: right; padding-right: 10px; padding-top: 5px;'><img src='../css/images/back.jpg' width='30px' height='30px'/></a>";
        }    
      ?>
<div style="height: 40px;">

   <?php
   if(isset($_REQUEST['them']))
   {
       echo" <div class='msg msg-ok' style='width: 40%'>
			<p><strong>Thêm mới thành công!</strong></p>	
		</div>";
   }
   if(isset($_REQUEST['xoa']))
   {
       echo" <div class='msg msg-ok' style='width: 20%'>
			<p><strong>Đã xóa ảnh!</strong></p>	
		</div>";
   }
   ?>                                       
</div>
 

<script>
    function check(anh,id)
    {
        if(confirm("Bạn có thực sự muốn xóa ảnh này?nDữ liệu đã xóa sẽ không thể khôi phục!")===true)
            {
                window.location="delete.php?anh="+anh+"&maal="+id;
            } 
    }
</script>
<?php

    

$trang="select  count(MaAnh) from anh where MaAlbum='$id'";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =6;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
}
$query = "select MaAnh,Anh,MaAlbum from anh where MaAlbum='$id' order by MaAnh desc limit $start,$sodong";
$result= mysqli_query($link, $query);
if(isset($_REQUEST['anh']))
{
    echo"<img style='max-width:600px; max-height:400px; clear: both' src='../../images/album/$anh'/>";
}  else {
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    { 
        echo"<div id='anh'>
            <a href='anh.php?p=1&anh=$r[1]&id=$id'><img src='../../images/album/$r[1]' width='215px' height='165px'/></a><br/>
            <a onclick="."check('{$r[1]}','{$id}')"."><img src='../css/images/delete.jpg' width='20px' height='20px'></a>
            </div>";  
            $rr=$r[1];
    } 
}   
}
?>
</div>
<div style="height: 50px;">
<?php
if(!isset($_REQUEST['anh']))
{
if(mysqli_num_rows($result)>=1)
{echo"<div class='pagging'>
        <div class='left'>Page $p of $sotrang</div>
        <div class='right'>";

                $trc=($p-1);
                $sau=($p+1);
             
             if($trc>=1){echo"<a href='anh.php?p=$trc&id=$id'>Trước</a>";}
                for($i=1; $i<=$sotrang; $i++)
                 {
                    if($i===$_REQUEST['p'])
                        {
                            echo "<a href='anh.php?p=$i&id=$id'><b>$i</b><a>";
                        }
                    else
                        {
                            echo "<a href='anh.php?p=$i&id=$id'>$i</a> ";
                        }
                 }
                if($sau<=$sotrang){echo"<a href='anh.php?p=$sau&id=$id'>Sau</a>";}
                
        echo"</div></div>";
}}?></div>					
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->                   
<!-- Sidebar -->
<div id="sidebar" style="width: 275px">

        <!-- Box -->
        <div class="box" style="width: 275px">

                <!-- Box Head -->
                <div class="box-head">
                        <h2>Thêm ảnh mới</h2>
                </div>
                <!-- End Box Head-->
                <div class="box-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <span style="font-size: 13px;">Số ảnh cần thêm:</span>
                        <input type="number" name="txtSo" size="2" max="15" min="1" value="1" style="border: solid 1px #e6e1e1; height: 22px; padding: 0px; text-align: center;"/>&nbsp;&nbsp;<input type="submit" name="btnSo" value="Ok"/><br/><br/>
                    </form>
                     <?php
                   
                            if(isset($_POST['btnSo']))
                            {
                                $so=$_POST['txtSo'];
                                echo"<hr/><br/>";
                                echo"<span style='font-size: 13px;'>Bạn đã chọn upload $so file.</span><br/>";
                                echo"<form action='anh.php?id=$id&p=1&num=$so' method='post' name='form1' onsubmit='return checkSize(1024,$so)' enctype='multipart/form-data'>";
                                for($i=1; $i<=$so; $i++)
                                {
                                    echo"<input id='upload$i' type='file' name=img[] style='font-size:12px'/><br/>";
                                }
                                echo"<br/><input type='submit' name='btnOK' value='Thêm ảnh'/> <input type='reset' value='Reset'/>";
                                echo"</form>";
                            }
                            if(isset($_POST['btnOK']))
                            {
                                $num=$_REQUEST['num'];
                                for($e=0;$e<$num;$e++)
                                {
                                    $ha=$_FILES['img']['name'][$e];
                                    if($ha!='')
                                    {
                                    $ext= explode('.', $ha)[1];
                                    $ha1= (time()+$e).".$ext";
                                    move_uploaded_file($_FILES['img']['tmp_name'][$e], "../../images/album/$ha1");
                                    $themanh="insert into anh (MaAlbum,Anh) values ('$id','$ha1')";
                                    mysqli_query($link,$themanh) or die(mysqli_error($link));
                                    
                                    if(mysqli_affected_rows($link)>0)
                                    {
                                        header("location:anh.php?p=1&id=".$id."&them=ok");
                                    }
                                    }
                                }
                            }
                        ?>
                </div>
        </div>   
        <!-- End Box -->
</div>
<!-- End Sidebar -->

			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - Victoria Hotel</span>
		<span class="right">
			Design by <a href="#" target="_blank" title="Kai Nguyen">celhpcney@gmail.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>