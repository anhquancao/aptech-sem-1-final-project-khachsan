<?php
ob_start();
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
<div id="header" style="height: 50px">
    <div class="shell" >
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="index.php">Victoria Hotel</a></h1>
			<div id="top-navigation">
			</div>
		</div>
		<!-- End Logo + Top Nav -->
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
                                <div class="box" style="height: 508px;">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Login</h2>
						<div class="right">
						</div>
					</div>
					<!-- End Box Head -->
<div style="color: red; margin-left: 400px; height: 30px; line-height: 30px;" >
<?php
session_start();
 $link = mysqli_connect("localhost","root","");
 mysqli_select_db($link, "ql_khach_san");
 mysql_query("SET NAMES 'utf8'");  
 
 if(isset($_POST['btnLogin']))
 {
    $user=$_POST['txtTK'];
    $pass=  md5($_POST['txtMK']);
    $query="select User,Password from admin
           where User ='$user' and Password='$pass'";
    $result=  mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['login']="ok";
        $_SESSION['lg_username']=$user;
        header("location:index.php");
    }
    else
    {echo "Sai tài khoản hoặn mật khẩu";}
 }
 if(isset($_REQUEST['logout']))
 {
         $logout=$_REQUEST['logout'];
         $trangthai="update admin set TrangThai='0' where User='$logout'";
         mysqli_query($link,$trangthai);
         session_destroy();
         header("location:index.php");
 }
 if(isset($_REQUEST['logout1']))
 {
         $logout1=$_REQUEST['logout1'];
         $trangthai="update admin set TrangThai='0' where User='$logout1'";
         mysqli_query($link,$trangthai);
         session_destroy();
         echo "<div style='margin-left:-50px'>Tài khoản của bạn chưa được duyệt. Xin vui lòng đợi!</div>";
         
 }
 ?></div>
                                        
<form action="" method="post">
    <table border="0" style="margin-left: 350px; border-radius: 10px; border-color: #e0dada;" cellspacing="0">
        <tr><th style="border-top-left-radius:10px; border:none;">Đăng nhập</th><th style="border-top-right-radius:10px; border: none"></th></tr>
        <tr><td style="padding:5px">Tên đăng nhập:</td><td style="padding:5px"><input type="text" name="txtTK" autofocus></td></tr>
    <tr><td style="padding:5px">Mật khẩu:</td><td style="padding:5px"><input type="password" name="txtMK"></td></tr>
    <tr><td></td><td><input style="margin-left: -70px; margin-top: 10px" class="btninput" type="submit" name="btnLogin" value="Đăng nhập"><br/><br/>
            Chưa có tài khoản? <a href="admin/dangky.php">Đăng ký</a></td></tr>
    </table>                                
</form>
 
					
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