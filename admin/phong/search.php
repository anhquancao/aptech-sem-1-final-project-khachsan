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
			    <li><a href="phong.php?p=1" class="active"><span>Phòng</span></a></li>
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
			<a href="phong.php?p=1">Phòng</a>
			<span>&gt;</span>
			Danh sách phòng
		</div>
		<!-- End Small Nav -->

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content" style="width: 700px;">
				
				<!-- Box -->
                                <div class="box" style="width: 700px;">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Danh sách phòng</h2>
						<div class="right">
							
                                                        <form action="" method="post">
                                                            <label></label><input type="text" placeholder="Nhập tên phòng" class="field small-field" name="txtKey" value="<?php if(isset($_REQUEST['key'])){echo $_REQUEST['key'];}?>" <?php if(isset($_REQUEST['key'])){echo"autofocus";}; if(isset($_POST['btnAdd'])){echo "autofocus='false'";}?> onfocus="this.select()"/>
                                                            <input type="submit" class="button" value="Tìm" name="btnSearch" />
                                                        </form>   
						</div>
					</div>
					<!-- End Box Head -->
<div style="height: 440px">
<div style="height: auto;">
    <?php
        if(isset($_POST['btnSearch']))
        {
            $key=$_POST['txtKey'];
            header("location:search.php?key=$key&p=1");
        }
    ?>                                     
</div>
 

<script>
    function check(id)
    {
        if(confirm("Bạn có thực sự muốn xóa phòng này?\nDữ liệu đã xóa sẽ không thể khôi phục!")===true)
            {
                window.location="delete.php?id="+id;
            }
    }
</script>
<?php
$trang="select  count(MaP) from phong";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =9;
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
$query = "select MaP,MaLP,TrangThai,TenLP from phong where 1=1";
if( $k !="")
{$query.= " and MaP like '%$k%'";}
$query.=" order by MaP desc limit $start,$sodong";
$result= mysqli_query($link, $query);
echo "<table width='680px' id='ds2' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px;'>Tên phòng</th>
        <th>Loại phòng</th>
        <th>Trạng thái</th>
        <th style='width: 80px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td>{$r[0]}</td>
            <td>{$r[3]}</td>
            <td>";if($r[2]==='0'){echo"<img title='Có thể sử dụng' src='../css/images/ok.jpg' width='25px' height='25px'/>";}  else {echo"<img title='Đang sửa' src='../css/images/cancel.jpg' width='25px' height='25px'/>";}; echo"</td>
            <td>
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
     echo "<br/><br/><br/><br/><div style='font-size: 17px; padding-left: 220px;'>Hiện tại không có phòng nào.</div><br/><br/><div style='font-size: 17px; padding-left: 300px;'><a href='phong.php?p=1&themmoi=ok' class='add-button'><span>Thêm mới</span></a>
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
             
             if($trc>=1){echo"<a href='phong.php?p=$trc'>Trước</a>";}
                for($i=1; $i<=$sotrang; $i++)
                 {
                    if($i===$_REQUEST['p'])
                        {
                            echo "<a href='phong.php?p=$i'><b>$i</b><a>";
                        }
                    else
                        {
                            echo "<a href='phong.php?p=$i'>$i</a> ";
                        }
                 }
                if($sau<=$sotrang){echo"<a href='phong.php?p=$sau'>Sau</a>";}
                
        echo"</div></div>";
}?></div>	
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
<!-- Sidebar -->
<div id="sidebar" style="width: 275px;">

        <!-- Box -->
        <div class="box" style="width: 275px; height:200px">

                <!-- Box Head -->
                <div class="box-head">
                        <h2>Thêm phòng mới</h2>
                </div>
                <!-- End Box Head-->

                <div class="box-content">
                    <?php 
        if(isset($_POST['btnAdd']))
        {
             $ten=$_POST['txtTen'];
             if(isset($_POST['txtLP']))
             {   
             $lp=$_POST['txtLP'];
             $layten="select TenLP from LoaiPhong where MaLP=$lp";
             $layten1=mysqli_query($link, $layten);
             $row1 = mysqli_fetch_array($layten1);
             $tenlp=$row1[0];
             if($ten!='' and $lp!='' and $tenlp!='')
             {
             $query = "insert into phong(Map,MaLP,TenLP,TrangThai) values('$ten','$lp','$tenlp','1')";
             mysqli_query($link, $query) or die(mysqli_error($link));
             
             if(mysqli_affected_rows($link)>0)
             {
                 header("location:phong.php?them=ok&p=1");
             }
             }}
        }
         
        ?>
                                        <div></div>
<script type="text/javascript">
    function valid()
    {
        var ten =document.forms["form1"]["txtTen"].value;
        var lp =document.forms["form1"]["txtLP"].value;
        
        if(ten == "" || lp == "-1")
        {
            document.getElementById("error").innerHTML="<p><strong>Bạn phải nhập đủ các trường!</strong></p>";
            return false;
        }
    }   
</script>
<div class='msg msg-error' id="error" style="width: 100%"></div>
        <table width="275px" cellspacing="15" style='margin: auto;' >
        <form action="" method="post">
            <tr><td style="text-align: center"> Tên phòng:</td><td><input type="text" name="txtTen" size=15" <?php if(isset($_REQUEST['fc']) or isset($_REQUEST['themmoi'])){echo"autofocus";}?> id="themmoi"/></td></tr>
           
            <tr><td style="text-align: center">Loại phòng:</td><td><select name="txtLP"><option value="-1">Chọn loại phòng</option><?php $loaip="select MaLP, TenLP from loaiphong";
                                       $loaip1=  mysqli_query($link, $loaip);
                                       if(mysqli_num_rows($loaip1)>0)
                                       {
                                            while ($row = mysqli_fetch_array($loaip1))
                                            {
                                               echo"<option value='$row[0]'>$row[1]</option>";
                                            }
                                       }
                                       ?>
                    </select></td></tr> 
           
           
         
            <tr><td></td><td><input style="margin-left:-60px" class="btninput" type="submit" name="btnAdd" value=" Thêm mới "/>
                    <input class="btninput" type="reset" name="btnreset" value=" Reset "/></td></tr>
        </form>
        </table>
                </div>   </div>
        <!-- End Box -->
</div>
<!-- End Sidebar -->
			
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