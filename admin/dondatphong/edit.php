<?php
ob_start();
?>
<?php

 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'"); ?>
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
			    <li><a href="dondatphong.php?p=1" class="active"><span>Đơn đặt phòng</span></a></li>
			    <li><a href="../phong/phong.php?p=1"><span>Phòng</span></a></li>
			    <li><a href="../loaiphong/loaiphong.php?p=1"><span>Loại phòng</span></a></li>
                            <li><a href="../dichvu/dichvu.php?p=1" ><span>Dịch vụ</span></a></li>
			    <li><a href="../quangcao/quangcao.php?p=1"><span>Quảng cáo</span></a></li>
                            <li><a href="../tintuc/tintuc.php?p=1"><span>Tin tức</span></a></li>
                            <li><a href="../hotro/hotro.php?p=1"><span>Hỗ trợ</span></a></li>
                            <li><a href="../lienhe/lienhe.php?p=1"><span>Liên Hệ</span></a></li>
                            <li><a href="../album/album.php?p=1"><span>Album</span></a></li>
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
                    <a href="dondatphong.php?p=1">Đơn đặt phòng</a>
			<span>&gt;</span>
			Chỉnh sửa đơn đặt phòng
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
                                <div class="box" style="height: 100%;">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Chỉnh sửa đơn đặt phòng</h2>
					</div>
					<!-- End Box Head -->	

         <script>
             function huy()
             {window.location="dondatphong.php?p=1";}
         </script>
                                        
                                        
                                        
 <?php

if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $query="select * from dondatphong where MaDDP='$id'";
    $result=  mysqli_query($link, $query);
    $r=  mysqli_fetch_array($result);
    $gt=0;
}

 if(isset($_POST['btnUpdate']))
        { 
             $tenkh=$_POST['txtTenKH'];
             $cmt=$_POST['txtCMT'];
             $dc=$_POST['txtDC'];
             $dt=$_POST['txtDT'];
             $email=$_POST['txtEmail'];
             $dat=$_POST['txtDat'];
             $den=$_POST['txtDen'];
             $di=$_POST['txtDi'];
             $httt=$_POST['txtHTTT'];
             $yc=$_POST['txtYC'];
             $query = "update dondatphong set TenKH='$tenkh', CMT='$cmt', DiaChi='$dc', DienThoai='$dt',
             Email='$email', NgayDat='$dat', NgayDen='$den', NgayDi='$di', HTTT='$httt', YeuCau='$yc' where MaDDP=$id";
             mysqli_query($link, $query) or die(mysqli_error($link));
             
             if(mysqli_affected_rows($link)>0)
             {
                 header('location:dondatphong.php?sua=ok&p=1');
             }else {
                    echo" <div class='msg msg-error' style='width:30%'>
			<p><strong>Thông tin vẫn chưa được chỉnh sửa!</strong></p>	
             </div>";}
        }
?><table border="2" style="margin: auto; border-radius: 20px; margin-bottom: 10px; margin-top: 10px;" width="700px" cellspacing="20">
        <form action="" method="post">
          <tr><td class="tdleft1">Tên khách hàng:</td><td><input type="text"  value="<?php echo $r[1] ?>" name="txtTenKH"/></td></tr>
          <tr><td class="tdleft1">Số CMT:</td><td><input type="text"  value="<?php echo $r[2] ?>" name="txtCMT"/></td></tr>
          <tr><td class="tdleft1">Địa chỉ:</td><td><input type="text"  value="<?php echo $r[3] ?>" name="txtDC"/></td></tr>
          <tr><td class="tdleft1">Điện thoại:</td><td><input type="text"  value="<?php echo $r[5] ?>" name="txtDT"/></td></tr>
          <tr><td class="tdleft1">Email:</td><td><input type="text"  value="<?php echo $r[4] ?>" name="txtEmail"/></td></tr>
          <tr><td class="tdleft1">Ngày đặt:</td><td><input type="text"  value="<?php echo date('d/m/Y',strtotime($r[10])) ?>" name="txtDat"/></td></tr>
          <tr><td class="tdleft1">Ngày đến:</td><td><input type="text"  value="<?php echo date('d/m/Y',strtotime($r[8])) ?>" name="txtDen"/></td></tr>
          <tr><td class="tdleft1">Ngày đi:</td><td><input type="text"  value="<?php echo date('d/m/Y',strtotime($r[9])) ?>" name="txtDi"/></td></tr>
          <tr><td class="tdleft1">Hình thức thanh toán:</td><td><input type="text"  value="<?php echo $r[7] ?>" name="txtHTTT"/></td></tr>
          <tr><td class="tdleft1">Yêu cầu:</td><td><textarea class="ckeditor" name="txtYC" ><?php echo $r[6] ?></textarea></td></tr>
          <tr><td></td><td style="padding-left: 130px; "> <input class="btninput" type="submit" name="btnUpdate" value=" Lưu lại "/>&nbsp;&nbsp;
                  <input class="btninput" type="button" name="btnCancel" value=" Hủy " onclick="huy()"/>
                         </td></tr>
        </form>
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