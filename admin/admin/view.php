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
                                <a href='view.php?id=$r1[0]'>View Profile</a>";?>
                                <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<span>|</span>
                                <a href='setting-trangchu.php'>Setting</a>";
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
                            <li><a href="../album/album.php?p=1"><span>Album</span></a></li>
                            <?php $q = "select * from admin where User='$a' and Quyen=1";
                                  $re= mysqli_query($link, $q) or die (mysqli_error($link));
                                  if(mysqli_num_rows($re)>0)
                                  {       
                                  echo "<li><a href='admin.php?p=1'  class='active'><span>Quản lý Admin</span></a></li>";
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
			<a href="#">Profile</a>
			<span>&gt;</span>
			View profile
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
                                <div class="box" style="height: 455px;">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">View profile</h2>
					</div>
					<!-- End Box Head -->	
<div style="height: 40px">
<?php
if(isset($_REQUEST['sua']))
   {
       echo" <div class='msg msg-ok' style='width: 25%'>
			<p><strong>Chỉnh sửa thành công!</strong></p>	
		</div>";
   }
if(isset($_REQUEST['doi']))
   {
       echo" <div class='msg msg-ok' style='width: 25%'>
			<p><strong>Đổi mật khẩu thành công!</strong></p>	
		</div>";
   }
?>
</div>

<?php
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query="select * from admin where MaAD='$id'";
   
    $result=  mysqli_query($link, $query);
    $r=  mysqli_fetch_array($result);
    $gt=0;
}

?>
     <table border="2" style="margin: auto; border-radius: 20px; margin-bottom: 10px; margin-top: 10px;" width="350px" cellspacing="20">
         <tr><td class="tdleft1">User name:</td><td><?php echo $r[1] ?></td></tr>
         <tr><td class="tdleft1">Password: </td><td><a href="changepass.php">Thay đổi</a></td></tr>
         <tr><td class="tdleft1">Tên nhân viên: </td><td><?php echo $r[3] ?></td></tr>
         <tr><td class="tdleft1">Ngày sinh:</td><td><?php echo date('d/m/Y',strtotime($r[4])) ?></td></tr>
         <tr><td class="tdleft1">Điện thoại:</td><td><?php echo $r[5] ?></td></tr>
         <tr><td class="tdleft1">Địa chỉ:</td><td><?php echo $r[6] ?></td></tr>
         <tr><td class="tdleft1">Email:</td><td><?php echo $r[7] ?></td></tr>
         
         
         <tr><td></td><td> <div id="spanview">
            <?php echo "<a href='edit1.php?id={$r[0]}'><img class='tool' title='Sửa' src='../css/images/edit.jpg' width='30px' height='30px'></a>"
                     . "<a href='../index.php'><img class='tool' title='Trở lại' src='../css/images/back.jpg' width='30px' height='30px'></a>"
            ?>
            </div></td></tr>
     </table>
           
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