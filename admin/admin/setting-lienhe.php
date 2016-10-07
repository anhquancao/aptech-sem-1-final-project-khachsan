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
if($ss2[0]!='1'){header("location:../index.php");}
?></strong>
                                <?php
                                $q1="select * from admin where User='$a'";
                                    $re1= mysqli_query($link, $q1) or die (mysqli_error($link));
                                    $r1= mysqli_fetch_array($re1);
                                echo"
                                <span>|</span>
                                <a href='view.php?id=$r1[0]'>View Profile</a>";?>
                                <span>|</span>
                                <a href="setting-trangchu.php">Setting</a>
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
                                  echo "<li><a href='admin.php?p=1'><span>Quản lý Admin</span></a></li>";
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

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content" >
				
				<!-- Box -->
                                <div class="box" style="height:1000px" >
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Setting</h2>
						<div class="right">
						</div>
					</div>
					<!-- End Box Head -->
					<ul class="setting-nav">
						<li ><a href="setting-trangchu.php">Trang Chủ</a></li>
						<li ><a href="setting-phongnghi.php">Phòng Nghỉ</a></li>
						<li ><a href="setting-dichvu.php">Dịch Vụ</a></li>
						<li ><a href="setting-tintuc.php">Tin Tức</a></li>
						<li ><a href="setting-thuvien.php">Thư Viện</a></li>
						<li class="setting-selected"><a href="setting-lienhe.php">Liên Hệ</a></li>
<li></li>
					<?php
						$count=0;
						$query_setting1="select content from setting ";
						$result1=mysqli_query($link,$query_setting1);				
						if (mysqli_num_rows($result1)>0){
							while ($r1=mysqli_fetch_array($result1))
							{
								
								if ($count==13) $title1=$r1[0];						
								if ($count==14) $des1=$r1[0];
								if ($count==15) $des2=$r1[0];
								$count+=1;
							}
						}	
										
					
						
					?>
						
					
					</ul>					
					<form method="Post">
					<table class="setting-content" style="height: 903px;">
						<tr  >
						<td colspan="2">
							<?php 
							if (isset($_POST['btnSubmit']))
							{
								if ($_POST['title']=="" || $_POST['description']=="" || $_POST['des2']=="")
								{
									
									echo" <div class='msg msg-error' style=\"width:30%\">
			<p><strong>Bạn phải nhập đủ các trường !</strong></p>	
		</div>";
								}
								else {
									
								$title=$_POST['title'];
							$des=$_POST['description'];
							$des2=$_POST['des2'];
							$querry_setting="update setting set content='{$title}' where id=14" ;
							mysqli_query($link,$querry_setting);
							
							$querry_setting="update setting set content='{$des}' where id=15 ";
							mysqli_query($link,$querry_setting);
						
							$querry_setting="update setting set content='{$des2}' where id=16 ";
					
							mysqli_query($link,$querry_setting);
							
										echo" <div class='msg msg-ok' style=\"width:30%\">
			<p><strong>Chỉnh sửa thành công!</strong></p>	
		</div>";
									}
									
								}
							
							?>				
						</td>
					</tr>
						<tr>
							<td class="setting-content-left">Tiêu đề</td>
							<td class="setting-content-right"><input type="text" name="title" id="title" value= "<?php  if(isset($_POST['title'])) echo $_POST['title']; else if (isset($title1)) echo $title1; ?>" ></td>
						</tr>					
						<tr>
							<td class="setting-content-left">Mô tả chung của liên hệ</td>
							<td class="setting-content-right"><textarea name="description" id="description" style="height:200px;width:330px"><?php if(isset($_POST['description'])) echo $_POST['description']; else if (isset($des1)) echo $des1; ?></textarea></td>
						</tr>		
							
						<tr>
							<td class="setting-content-left">Thông tin liên hệ chi tiết của khách sạn</td>
							<td class="setting-content-right"><textarea class="ckeditor"  name="des2" id="des2" style="height:200px;width:330px"><?php if(isset($_POST['des2'])) echo $_POST['des2']; else if (isset($des2)) echo $des2; ?></textarea></td>
						</tr>								
						
						
						<tr>
							<td class="setting-content-left"><input class="btninput" type="submit" name="btnSubmit" id="btnSubmit" value="Áp dụng"/></td>
							<td class="setting-content-right"><input class="btninput" type="button" name="btnReset" id="btnReset" value="Nhập lại" onclick="window.location.reload(true);"/></td>
						</tr>		
											
						
						
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