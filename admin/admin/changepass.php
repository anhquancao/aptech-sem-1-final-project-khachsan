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
			<a href=#>Profile</a>
			<span>&gt;</span>
			Đổi mật khẩu
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
						<h2 class="left">Đổi mật khẩu</h2>
					</div>
					<!-- End Box Head -->	
<script>
    function huy()
    {window.location="view.php?id=<?php echo $r1[0]?>";}
</script>
<div style="height: 30px;">
<?php
    if(isset($_POST['btnChange']))
    {
        $tk=$_POST['txtTK'];
        $mk=  md5($_POST['txtMK']);
        $mkn= md5($_POST['txtMKN']);
        $mknn= md5($_POST['txtMKNN']);
        if ($mkn===$mknn)
        {
            $query="select * from  admin where User='$tk' and Password='$mk'";
            $result= mysqli_query($link, $query) or die(mysqli_error($link));
            if(mysqli_num_rows($result)>0)
                {
                    $q="update admin set Password='$mkn' where User='$tk'";
                    mysqli_query($link, $q);
                    if(mysqli_affected_rows($link)>0)
                    {
                        header("location:view.php?id={$r1[0]}&doi=ok");
                    }
                }
                else {echo" <div class='msg msg-error' style='width: 30%'>
			<p><strong>Mật khẩu cũ nhập vào không đúng!</strong></p>	
                              </div>";}
        }
        
        else {echo" <div class='msg msg-error' style='width: 30%'>
			<p><strong>Nhập lại mật khẩu không đúng!</strong></p>	
                              </div>";}
    }
    ?> <div class='msg msg-error' id="error" style="width: 25%"></div></div>
<script type="text/javascript">
    function valid()
    {
        
        var pass1 =document.forms["form2"]["txtMK"].value;
        var pass2 =document.forms["form2"]["txtMKN"].value;
        var pass3 =document.forms["form2"]["txtMKNN"].value;
        
        if(pass1 ==="" || pass2==="" || pass3==="")
        {
            document.getElementById("error").innerHTML="<p><strong>Mật khẩu ko đc để trống!</strong></p>";
        }
        
        if(pass1 ==="" || pass2==="" || pass3==="")
        {
            return false; 
        }
    }    
</script>

<form action="" method="post" name="form2" onsubmit="return valid()">
    <table border="0" style="margin-left: 350px; border-radius: 10px; border-color: #e0dada;padding-top: 20px" cellspacing="0">
        <tr><th style="border-top-left-radius:10px; border:none;"></th><th style="border-top-right-radius:10px; border: none; text-align: left">Đổi mật khẩu</th></tr>
        <tr><td style="padding:5px; text-align:right">Tên đăng nhập:</td><td style="padding:5px"><input type="text" name="txtTK" readonly="true" value="<?php echo $a?>"></td></tr>
        <tr><td style="padding:5px; text-align:right">Mật khẩu cũ:</td><td style="padding:5px"><input type="password" name="txtMK" autofocus></td></tr>
    <tr><td style="padding:5px; text-align:right">Mật khẩu mới:</td><td style="padding:5px"><input type="password" name="txtMKN"></td></tr>
    <tr><td style="padding:5px; text-align:right">Nhập lại:</td><td style="padding:5px"><input type="password" name="txtMKNN"></td></tr>
    <tr><td></td><td style="padding: 5px;">
            <span style="margin-left: -50px;">
                <input class="btninput" type="submit" name="btnChange" value="Xác nhận">
                <input class="btninput" type="button" onclick="huy()" name="btnHuy" value="Hủy" >
            </span></td></tr>
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