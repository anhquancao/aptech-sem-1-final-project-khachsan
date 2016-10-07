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
			<a href="admin.php?p=1">Quản lý admin</a>
			<span>&gt;</span>
			Danh sách admin
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
						<h2 class="left">Danh sách Admin</h2>
						<div class="right">
							
                                                        <form action="" method="post">
                                                            <label></label><input type="text" placeholder="Nhập tên nhân viên" class="field small-field" name="txtKey"/>
                                                            <input type="submit" class="button" value="Tìm" name="btnSearch" />
                                                        </form>   
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 440px">
    <div style="float: right; padding-right: 10px; padding-top: 5px;"><a href="dsdangky.php?p=1">Đơn đăng ký mới(<?php
                                                                        $dangky="select count(User) from admin where Quyen='2' ";
                                                                        $dangky1= mysqli_query($link, $dangky);
                                                                        $dk=  mysqli_fetch_array($dangky1);
                                                                        echo $dk[0];
                                                                      ?>).</a></div>
<div style="height: 35px;">
    <?php
        if(isset($_POST['btnSearch']))
        {
            $key=$_POST['txtKey'];
            header("location:search.php?key=$key&p=1");
        }
    ?>
   <?php
   if(isset($_REQUEST['them']))
   {
       echo" <div class='msg msg-ok'>
			<p><strong>Thêm mới thành công!</strong></p>	
		</div>";
   }
   if(isset($_REQUEST['xoa']))
   {
       echo" <div class='msg msg-ok'>
			<p><strong>Đã xóa Admin này!</strong></p>	
		</div>";
   }
   if(isset($_REQUEST['sua']))
   {
       echo" <div class='msg msg-ok'>
			<p><strong>Chỉnh sửa thành công!</strong></p>	
		</div>";
   }
   
   ?>
     
</div>
    

<script>
    function check(id)
    {
        if(confirm("Bạn có thực sự muốn xóa admin này?\nDữ liệu đã xóa sẽ không thể khôi phục!")===true)
            {
                window.location="delete.php?id="+id;
            }
    }
</script>
<?php
$trang="select  count(MaAD) from admin where Quyen!='2'";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0]-1;      
 $sodong =8;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
}
$query = "select * from admin where Quyen!='2' and User!= 'admin' order by MaAD desc limit $start,$sodong";
$result= mysqli_query($link, $query);
echo "<table id='ds' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px;width: 220px;'>Tên nhân viên</th>
        <th>User name</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th style='width: 110px;'>Trạng thái</th>
        <th style='width: 120px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td>{$r[3]}</td>
            <td>{$r[1]}</td>
            <td>{$r[5]}</td>
            <td>{$r[7]}</td>
            <td>"; if($r[8]==='1'){echo "<img title='online' src='../css/images/online.jpg' width='30px' height='30px'/>";}else{echo "<img title='offline' src='../css/images/offline.jpg' width='30px' height='30px'/>";}; echo"</td>
            <td>  
                    <div class='btn'>
                    <a href='view1.php?id=$r[0]'><img title='Chi tiết' width='25px' height='25px' src='../css/images/view.jpg'></a>
                    </div>
                    <div class='btn'>
                    <a href='edit.php?id=$r[0]'><img title='Sửa' width='25px' height='25px' src='../css/images/edit.jpg'></a>
                    </div>
                    <div class='btn'>
                    <a onclick="."check('$r[0]')"." href='#'><img title='Xóa' width='25px' height='25px' src='../css/images/delete1.jpg'></a> 
                    </div> 
                    </td>
         </tr>";
    }
}
echo "</table>";
 if(mysqli_num_rows($result)<1)
    {
     echo "<br/><br/><br/><br/><div style='font-size: 17px; padding-left: 380px;'>Hiện tại không có admin nào.</div><br/><br/><div style='font-size: 17px; padding-left: 450px;'><a href='admin.php?p=1&themmoi=ok' class='add-button'><span>Thêm mới</span></a>
</div>";
    }
?>
</div>
<div style="height: 50px;">
<?php
if(mysqli_num_rows($result)>=1)
{echo"<div class='pagging'>
        <div class='left'>Page $p of $sotrang</div>
        <div class='right'>";

                $trc=($p-1);
                $sau=($p+1);
     
             if($trc>=1){echo"<a href='admin.php?p=$trc'>Trước</a>";}
                for($i=1; $i<=$sotrang; $i++)
                 {
                    if($i===$p)
                        {
                            echo "<a href='admin.php?p=$i'>$i<a>";
                        }
                   
                        {
                            echo "<a href='admin.php?p=$i'>$i</a> ";
                        }
                 }

                 if($sau<=$sotrang){echo"<a href='admin.php?p=$sau'>Sau</a>";}
               

        echo"</div></div>";
}?></div>
							
                                              
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<div class="box" id="boxadd">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Thêm admin mới</h2>
					</div>
					<!-- End Box Head -->
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
             $quyen=$_POST['txtQuyen'];
             $check="select * from admin where User='$user'"; $check2="select * from dangky where User='$user'";
             $check1= mysqli_query($link, $check) or die(mysqli_error($link));
             $check3= mysqli_query($link, $check2) or die(mysqli_error($link));
             if($user!='' and $pass!='' and $ten!='' and $ns!='' and $dt!='' and $dc!='' and $email!='' and $quyen!='')
             {
             if (mysqli_num_rows($check1)!=0 or mysqli_num_rows($check3)!=0)
             {
                 echo"<div class='msg msg-error' style='width:35%'>
			<p><strong>Tài khoản đã tồn tại, vui lòng kiểm tra lại!</strong></p>	
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
                                                $query = "insert into admin(User,Password,TenNV,Ngaysinh,DienThoai,DiaChi,Email,Quyen) "
                                                       . "values('$user','$pass','$ten','".date('Y/m/d',strtotime($ns))."','$dt','$dc','$email','$quyen')";
                                                     mysqli_query($link, $query) or die(mysqli_error($link));

                                                     if(mysqli_affected_rows($link)>0)
                                                     {
                                                         header("location:admin.php?them=ok&p=1");
                                                     }
                                                        
                                                        }
                                      }
                    }
        
             }} else {echo "<div class='msg msg-error' style='width:30%'>
			<p><strong>Bạn phải nhập đủ các trường!</strong></p>	
                        </div>";}
        }
        ?>
        <table width="600px" cellspacing="15" style='margin: auto;' >
            <form action="" method="post" name="form2" onsubmit="return valid()">
           <tr><td class="tdleft">User name:</td><td><input type="text" name="txtUser" size="40" <?php if(isset($_REQUEST['fc']) or isset($_REQUEST['themmoi'])){echo"autofocus";} if(isset($_POST['btnAdd'])){echo "value='".$user."'";echo "autofocus";}?> id="themmoi"/></td></tr>
           <tr><td class="tdleft">Password:</td><td> <input type="password" name="txtPass" size="40"/></td></tr>
           <tr><td class="tdleft">Nhập lại:</td><td> <input type="password" name="txtRePass" size="40"/></td></tr>
           <tr><td class="tdleft">Tên nhân viên: </td><td><input type="text" name="txtTen" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$ten."'";}?>/></td></tr>
           <tr><td class="tdleft">Ngày sinh: </td><td><input type="date" name="txtNS" size="40"<?php if(isset($_POST['btnAdd'])){echo "value='".$ns."'";}?>/></td></tr>
           <tr><td class="tdleft">Điện thoại: </td><td><input type="text" name="txtDT" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$dt."'";}?>/></td></tr>
           <tr><td class="tdleft">Địa chỉ: </td><td><input type="text" name="txtDC" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$dc."'";}?>/></td></tr>
           <tr><td class="tdleft">Email: </td><td><input type="text" name="txtEmail" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$email."'";}?>/></td></tr>
           <tr><td class="tdleft">Quyền: </td><td><input id="quyen" type="radio" name="txtQuyen" checked="true" value="0"/>&nbsp;Nhân viên&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="quyen" type="radio" name="txtQuyen" value="1"/>&nbsp;Admin</td></tr>
           <tr><td></td><td style="padding-left: 60px;">
                    <input class="btninput" type="submit" name="btnAdd" value=" Thêm mới "/>
                    <input  class="btninput" type="reset" name="btnreset" value=" Làm lại "/></td></tr>
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