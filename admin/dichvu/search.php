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
                            <li><a href="dichvu.php?p=1" class="active"><span>Dịch vụ</span></a></li>
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
                    <a href="dichvu.php?p=1">Dịch vụ</a>
			<span>&gt;</span>
			Danh sách dịch vụ
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
						<h2 class="left">Danh sách dịch vụ</h2>
						<div class="right">

                                                        <form action="" method="post">
                                                            <label></label><input type="text" placeholder="Nhập tên dịch vụ" class="field small-field" name="txtKey" value="<?php if(isset($_REQUEST['key'])){echo $_REQUEST['key'];}?>" <?php if(isset($_REQUEST['key'])){echo"autofocus";}; if(isset($_POST['btnAdd'])){echo "autofocus='false'";}?> onfocus="this.select()"/>
                                                            <input type="submit" class="button"  value="Tìm" name="btnSearch" />
                                                        </form>   
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 440px">
<div style="height: auto;"></div>
<script>
    function check(id,ha)
    {
        if(confirm("Bạn có thực sự muốn xóa dịch vụ này?\nDữ liệu đã xóa sẽ không thể khôi phục!")===true)
            {
                window.location="delete.php?id="+id+"&ha="+ha;
            }
    }
</script>
<?php
$trang="select  count(MaDV) from dichvu";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =5;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
}
if(isset($_POST['btnSearch']))
{
    $key=$_POST['txtKey'];
  
    header("location:search.php?key=$key&p=1");
}
if(isset($_REQUEST['key']))
{
    $k=$_REQUEST['key'];
}
$query = "select MaDV,TenDV,HinhAnh,ThongTin,Gia,MoTa from dichvu where 1=1";
if( $k !="")
{$query.= " and TenDV like '%$k%'";}
$query.=" order by MaDV desc limit $start,$sodong";
$result= mysqli_query($link, $query);
echo "<table width='980px' id='ds' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px; width:200px'>Tên dịch vụ</th>
        <th style='width: 130px;'>Hình ảnh</th>
        <th style='width: 350px;'>Mô tả</th>
        <th>Giá</th>
        <th style='width: 120px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td>{$r[1]}</td>
            <td><img src='../../images/dichvu/{$r[2]}' width='100px' height='67px'/></td>
            <td style='text-align: left; padding:7px; text-indent:20px'>".substr($r[5],0,100)." ...</td>
            <td>".number_format($r[4])."</td>
            <td>
                <div class='btn'>
                <a href='view.php?id=$r[0]'><img title='Chi tiết' width='25px' height='25px' src='../css/images/view.jpg'></a>
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
     echo "<br/><br/><br/><br/><div style='font-size: 17px; padding-left: 380px;'>Hiện tại không có dịch vụ nào.</div><br/><br/><div style='font-size: 17px; padding-left: 450px;'><a href='dichvu.php?p=1&themmoi=ok' class='add-button'><span>Thêm mới</span></a>
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
           
             if($trc>=1){echo"<a href='dichvu.php?p=$trc'>Trước</a>";}
                for($i=1; $i<=$sotrang; $i++)
                 {
                    if($i===$_REQUEST['p'])
                        {
                            echo "<a href='dichvu.php?p=$i'><b>$i</b><a>";
                        }
                    else
                        {
                            echo "<a href='dichvu.php?p=$i'>$i</a> ";
                        }
                 }
                if($sau<=$sotrang){echo"<a href='dichvu.php?p=$sau'>Sau</a>";}
             
        echo"</div></div>";
}?></div>
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<div class="box" id="boxadd">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Thêm dịch vụ mới</h2>
					</div>
					<!-- End Box Head -->
<?php 
        if(isset($_POST['btnAdd']))
        {
             $ten=$_POST['txtTen'];
             $ha=$_FILES['fImg']['name'];
             if($ha!=""){
             $ext= explode('.', $ha)[1];
             $ha1= time().".$ext";
             move_uploaded_file($_FILES['fImg']['tmp_name'], "../../images/dichvu/$ha1");}
             $tt=$_POST['txtTT'];
             $gia=$_POST['txtGia'];
             $mt=$_POST['txtMT'];
             if($ten==='' or $ha==='' or $tt==='' or $gia==='' or  $mt==='')
             {
                 echo"<div class='msg msg-error' style='width:30%'>
			<p><strong>Bạn phải nhập đủ các trường</strong></p>	
		</div>";
             }
             if($ten!='' and $ha!='' and $tt!='' and $gia!='' and $mt!='')
             {    
             $query = "insert into dichvu(TenDV, HinhAnh, ThongTin, Gia, MoTa) values('$ten','$ha1','$tt','$gia','$mt')";
             mysqli_query($link, $query) or die(mysqli_error($link));
             
             if(mysqli_affected_rows($link)>0)
             {
                 header("location:dichvu.php?them=ok&p=1");
             }
        }}
        ?>
                                        <div></div>
<script type="text/javascript">
    function checkSize(max_img_size)
{
    var input = document.getElementById("upload");
    var anh= document.forms['form1']['fImg'].value;
    var gia =document.forms['form1']['txtGia'].value;
    var check=isNaN(gia);
    if (check==true){document.getElementById("error").innerHTML="<p><strong>Giá phải là chữ số!</strong></p>";return false}
    if(anh!='')
    {           
        if (input.files[0].size > max_img_size) 
        {
            document.getElementById("error").innerHTML="<p><strong>Dung lượng ảnh ko được vượt quá 5MB!</strong></p>";
            return false;
        }
    }
}
</script><div class='msg msg-error' id="error" style="width: 33%"></div>
        <table width="900px" cellspacing="15" style='margin: auto;' >
            <form action="" method="post" name="form1" onsubmit="return checkSize(5242880)"enctype="multipart/form-data">
           <tr><td class="tdleft"> Tên DV: </td><td><input type="text" name="txtTen" size="40" <?php if(isset($_REQUEST['fc']) or isset($_REQUEST['themmoi'])){echo"autofocus";} if(isset($_POST['btnAdd'])){echo "value='".$ten."'";echo "autofocus";}?> id="themmoi" /></td></tr>
           
           <tr><td class="tdleft"> Hình ảnh:</td><td><input type="file" name="fImg" id="upload"/></td></tr>
           
           <tr><td class="tdleft">Giá: </td><td><input type="text" name="txtGia" size="40" <?php if(isset($_POST['btnAdd'])){echo "value='".$gia."'";}?>/></td></tr>
           
           <tr><td class="tdleft"> Mô tả:</td><td> <textarea name="txtMT" cols="45" rows="3"><?php if(isset($_POST['btnAdd'])){echo $mt;}?></textarea></td></tr>
         
           <tr><td class="tdleft"> Thông tin:</td><td> 
                   <textarea id="txtTT" class="ckeditor" name="txtTT"><?php if(isset($_POST['btnAdd'])){echo $tt;}?></textarea></td></tr>
        
           <tr><td></td><td style="padding-left: 170px;"><input class="btninput" type="submit" name="btnAdd" value=" Thêm mới "/>
                   <input class="btninput"  type="reset" name="btnreset" value=" Làm lại "/></td></tr>
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