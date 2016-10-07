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
		
		<!-- Small Nav -->
		<div class="small-nav">
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
                                <div class="box" >
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Đăng ký</h2>
						<div class="right"> 
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 440px">
<div style="height: auto;">
<?php 
        if(isset($_POST['btnAdd']))
        {
            $user=$_POST['txtUser'];
            $pass=md5($_POST['txtPass']);
            $repass=md5($_POST['txtRePass']);
            $ten=$_POST['txtTen'];
            $ns=$_POST['txtNS'];
            $dt=$_POST['txtDT'];
            $dc=$_POST['txtDC'];
            $email=$_POST['txtEmail'];
             $check="select * from admin where User='$user'";
             $check1= mysqli_query($link, $check) or die(mysqli_error($link));
             
             if($user!='' and $pass!='' and $repass!='' and $ten!='' and $ns!='' and $dt!='' and $dc!='' and $email!='')
             {
             if (mysqli_num_rows($check1)!=0)
             {
                 echo"<div class='msg msg-error' style='width:30%'>
			<p><strong>Tên tài khoản đã có người sử dụng!</strong></p>	
                        </div>";
             }
             else
             {
                 if($pass!=$repass)
                 {
                     echo "<div class='msg msg-error' style='width:30%'>
			<p><strong>Nhập lại mật khẩu không chính xác!</strong></p>	
                        </div>";
                 }
                 else 
                    {if(!is_numeric($dt)){echo "<div class='msg msg-error' style='width:30%'>   
			<p><strong>Điện thoại phải là chữ số!</strong></p>	
                        </div>";}else{
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){echo "<div class='msg msg-error' style='width:30%'>
                                        <p><strong>Định dạng email không đúng!</strong></p>	
                                            </div>";}else{ 
                                                $query = "insert into admin(User,Password,TenNV,Ngaysinh,DienThoai,DiaChi,Email,NgayGui,Quyen) values('$user','$pass','$ten','".date('Y-m-d',strtotime($ns))."','$dt','$dc','$email',NOW(),'2')";
                                                mysqli_query($link, $query) or die(mysqli_error($link));
                                                       if(mysqli_affected_rows($link)>0){echo" <div class='msg msg-ok' style='width:44%'>
                                                        <p><strong>Đăng ký đã được gửi. Xin vui lòng chờ xác nhận của Admin!</strong></p>	
                                                        </div>";}
                                                        
                                                        }
                                      }
                    }
        
             }} else {echo "<div class='msg msg-error' style='width:30%'>
			<p><strong>Bạn phải nhập đủ các trường!</strong></p>	
                        </div>";}
                        
             }
        ?>
        <table width="600px" cellspacing="15" style='margin: auto;' >
        <form action="" method="post" name="form2">
            <tr><td class="tdleft">User name: </td><td><input type="text" name="txtUser" size="40" autofocus id="themmoi" <?php if(isset($_POST['btnAdd'])){echo "value='".$user."'";}?>/></td></tr>
           <tr><td class="tdleft">Password:</td><td> <input type="password" name="txtPass" size="40"/></td></tr>
           <tr><td class="tdleft">Nhập lại:</td><td> <input type="password" name="txtRePass" size="40"/></td></tr>
           <tr><td class="tdleft">Tên nhân viên: </td><td><input type="text" name="txtTen" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$ten."'";}?>/></td></tr>
           <tr><td class="tdleft">Ngày sinh: </td><td><input type="date" name="txtNS" size="40"<?php if(isset($_POST['btnAdd'])){echo "value='".$ns."'";}?>/></td></tr>
           <tr><td class="tdleft">Điện thoại: </td><td><input type="text" name="txtDT" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$dt."'";}?>/></td></tr>
           <tr><td class="tdleft">Địa chỉ: </td><td><input type="text" name="txtDC" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$dc."'";}?>/></td></tr>
           <tr><td class="tdleft">Email: </td><td><input type="text" name="txtEmail" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$email."'";}?>/></td></tr>
           <tr><td></td><td><input class="btninput"  type="submit" name="btnAdd" value=" Gửi đăng ký "/>
                                    <input class="btninput" type="reset" name="btnreset" value=" Reset "/>
                                    <a href="../login.php"><input class="btninput" type="button" name="btnBack" value=" Trở lại "/></a></td></tr>
        </form>
        </table>
                        <?php   
                            if(isset($_POST['btnBack']))
                            {
                                header('location:../login.php');
                            }
                        ?>
</div>
							
                                              
</div></div>
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