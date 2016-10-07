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
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<!-- Header -->
<div id="header" style="height: 60px">
	<div class="shell">
		<!-- Logo + Top Nav -->
                <div id="top" >
			<h1><a href="#">Victoria Hotel</a></h1>
			<div id="top-navigation">
				Welcome<strong>
<?php 
session_start();
$a=$_SESSION['lg_username'];
$ss="select Quyen from admin where User='$a'";
$ss1=mysqli_query($link, $ss);
$ss2=mysqli_fetch_array($ss1);
if(!isset($_SESSION['login']) || $_SESSION['login'] != "ok")
{
    header("location:login.php");
}
else
{
    $a=$_SESSION['lg_username'];
    $trangthai="update admin set TrangThai=1 where User='$a'";
    mysqli_query($link, $trangthai);
    echo $_SESSION['lg_username'];
};
if($ss2[0]==='2'){header("location:login.php?logout1=$a");}
?></strong>
				
				 <?php
                                $q1="select * from admin where User='$a'";
                                    $re1= mysqli_query($link, $q1) or die (mysqli_error($link));
                                    $r1= mysqli_fetch_array($re1);
                                echo"
                                <span>|</span>
                                <a href='admin/view.php?id=$r1[0]'>View Profile</a>";?>
                                <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<span>|</span>
                                <a href='admin/setting-trangchu.php'>Setting</a>";
                                  }
                                ?>
				<span>|</span>
                                <a href="login.php?logout=<?php echo $a ?>">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
                                <div class="box" style="height:530px" >
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Danh sách danh mục</h2>
						<div class="right">
						</div>
					</div>
					<!-- End Box Head -->
<div style=" width: 333px; float: left; height: 150px;">
    <div class="spanindex"><a href="dondatphong/dondatphong.php?p=1"><span>Đơn đặt phòng</span></a></div>
    <div class="spanindex"><a href="phong/phong.php?p=1"><span>Phòng</span></a></div>
    <div class="spanindex"><a href="loaiphong/loaiphong.php?p=1"><span>Loại phòng</span></a></div>
</div>
<div style=" width: 333px; float: left; height: 150px;">
     <div class="spanindex"><a href="dichvu/dichvu.php?p=1"><span>Dịch vụ</span></a></div>
     <div class="spanindex"><a href="quangcao/quangcao.php?p=1"><span>Quảng cáo</span></a></div>
     <div class="spanindex"><a href="tintuc/tintuc.php?p=1"><span>Tin tức</span></a></div>
     <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<div class='spanindex'><a href='admin/admin.php?p=1'><span>Quản lý Admin</span></a></div>";
                                  }
                            ?>
</div>
<div style=" width: 333px; float: right; height: 150px;">
     <div class="spanindex"><a href="hotro/hotro.php?p=1"><span>Hỗ trợ</span></a></div>
     <div class="spanindex"><a href="lienhe/lienhe.php?p=1"><span>Liên Hệ</span></a></div>
     <div class="spanindex"><a href="album/album.php?p=1"><span>Album</span></a></div>
</div>
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer" style="margin-top: 77px">
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