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
                            <li><a href="hotro.php?p=1" class="active"><span>Hỗ trợ</span></a></li>
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
			<a href="dichvu.php?p=1">Hỗ trợ</a>
			<span>&gt;</span>
			Danh sách người hỗ trợ
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
						<h2 class="left">Danh sách người hỗ trợ</h2>
						<div class="right">
							
                                                        <form action="" method="post">
                                                            <label></label><input type="text" placeholder="Nhập tên người hỗ trợ" id="txtKey" onKeyUp="hienthiht(document.getElementById('txtKey').value,1)" class="field small-field" name="txtKey"/>
                                                            <input type="submit" class="button" value="Tìm" name="btnSearch" />
                                                        </form>   
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 450px">
<div style="height: 30px;">
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
			<p><strong>Đã xóa dịch vụ!</strong></p>	
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
        if(confirm("Bạn có thực sự muốn xóa hỗ trợ viên này?\nDữ liệu đã xóa sẽ không thể khôi phục!")===true)
            {
                window.location="delete.php?id="+id;
            }
    }
</script>
<script type="text/javascript">
function hienthiht(k,p)
{
/* if (k=="")
  {
  document.getElementById("data_load").innerHTML="";
  return;
  } */
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("data_load").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hotro2.php?k="+k+"&p="+p,true)
xmlhttp.send();
}

/* Trong truong hop chua chon, hien thi tat ca */
    hienthiht('','1');


</script>
<div id="data_load"></div>
</div>					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<div class="box" id="boxadd">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Thêm người hỗ trợ mới</h2>
					</div>
					<!-- End Box Head -->
<?php 
        if(isset($_POST['btnAdd']))
        {
             $ten=$_POST['txtTen'];
             $dt=$_POST['txtDT'];
             $yh=$_POST['txtYH'];
             $cv=$_POST['txtCV'];
             $sky=$_POST['txtSky'];
            if($ten!='' and $dt!='' and $yh!='' and $sky!='')
            {
                
             $query = "insert into hotrott(TenHT, SoDT, Yahoo, ChucVu, Skype) values('$ten','$dt','$yh','$cv','$sky')";
             mysqli_query($link, $query) or die(mysqli_error($link));
             
             if(mysqli_affected_rows($link)>0)
             {
                 header("location:hotro.php?them=ok&p=1");
                        }
            }   
        }
        ?>
                                        <div></div>
<script type="text/javascript">
    function valid()
    {
        var ten =document.forms["form1"]["txtTen"].value;
        var dt =document.forms["form1"]["txtDT"].value;
        var yh =document.forms["form1"]["txtYH"].value;
        var cv =document.forms["form1"]["txtCV"].value;
        var dt =document.forms['form1']['txtDT'].value;
        var sky =document.forms['form1']['txtSky'].value;
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var check=isNaN(dt);
         if(ten ==="" || dt==="" || yh==="" || cv==="" || sky==="")
        {
            document.getElementById("error").innerHTML="<p><strong>Bạn phải nhập đầy đủ các trường!</strong></p>";
            return false; 
        }
        else{
        if (check==true){document.getElementById("error").innerHTML="<p><strong>Điện thoại phải là chữ số!</strong></p>";return false};
        if(regex.test(yh)==false){document.getElementById("error").innerHTML="<p><strong>Email cần nhập đúng định dạng!</strong></p>";return false};
            }
    }    
</script>
<div class='msg msg-error' id="error" style="width: 30%"></div>
        <table width="500px" cellspacing="15" style='margin: auto;' >
        <form action="" method="post" name="form1" onSubmit="return valid()">
           <tr><td class="tdleft"> Tên hỗ trợ viên: </td><td><input type="text" name="txtTen" size="40" <?php if(isset($_REQUEST['fc']) or isset($_REQUEST['themmoi'])){echo"autofocus";}?> id="themmoi"/></td></tr>
           <tr><td class="tdleft"> Số điện thoại:</td><td> <input type="text" name="txtDT" size="40"/></td></tr>
           <tr><td class="tdleft">Yahoo mail: </td><td><input type="text" name="txtYH" size="40"/></td></tr>
           <tr><td class="tdleft">Skype name: </td><td><input type="text" name="txtSky" size="40"/></td></tr>
           <tr><td class="tdleft">Chức vụ: </td><td><input id="quyen" type="radio" name="txtCV" checked="true" value="Quản Lý"/>&nbsp;Quản lý&nbsp;&nbsp;&nbsp;
                                                  <input id="quyen" type="radio" name="txtCV" value="Dịch Vụ"/>&nbsp;Dịch vụ&nbsp;&nbsp;&nbsp;
                                                  <input id="quyen" type="radio" name="txtCV" value="Kỹ Thuật"/>&nbsp;Kỹ thuật&nbsp;&nbsp;&nbsp;
                                                  <input id="quyen" type="radio" name="txtCV" value="Tiếp Tân"/>&nbsp;Tiếp tân</td></tr>
           <tr><td></td><td style="padding-left: 60px;"><input class="btninput" type="submit" name="btnAdd" value=" Thêm mới "/>
                   <input class="btninput" type="reset" name="btnreset" value=" Làm lại "/></td></tr>
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