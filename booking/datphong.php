<!DOCTYPE html>
//them phan hd dat phong trong trang dat phong
<?php
 //ket noi
     $link= mysqli_connect('localhost',"root","");
     mysqli_select_db($link, "ql_khach_san");
     ob_start();
     session_start();
?>
<html>
<head runat="server">
        <meta charset="UTF-8">
	<title>Đặt Phòng Online Giá Rẻ</title>
	<link rel="stylesheet" href="css/bookingcss.css" type="text/css"/>
        <script type="text/javascript" src="js/timer.js"></script>
	<script type="text/javascript">

function OpenPopup(Url,WindowName,width,height,extras,scrollbars) {
var wide = width;
var high = height;
var additional= extras;
var top = (screen.height-high)/2;
var leftside = (screen.width-wide)/2; newWindow=window.open(''+ Url + '',''+ WindowName + '','width=' + wide + ',height=' + high + ',top=' + top + ',left=' + leftside + ',features=' + additional + '' + ',scrollbars=1');
newWindow.focus();
}
	</script>
    
</head>
<body>
	<div class="page">
		<div class="header">
			<a href="../index.php" id="logo"><img src="../images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
					<a href="admin/index.php" id="li">Log-in</a>
				</div>
				<div>
					<ul>
						<li class="selected" >
							<a href="../index.php"><span>Trang Chủ</span></a>
						</li>
						<li>
                            <a href="../phongnghi.php#phantrang"><span>Phòng Nghỉ</span></a>
						</li>
						<li>
                            <a href="../dichvu.php#phantrang"><span>Dịch Vụ</span></a>
						</li>
						<li>
							<a href="../tintuc.php#phantrang"><span>Tin Tức</span></a>
						</li>
                                                <li>
							<a href="../thuvien.php#phantrang"><span>Thư Viện</span></a>
						</li>
                                                <li >
                                                    <a href="../lienhe.php#phantrang"><span>Liên Hệ</span></a>
						</li>
						 <li>
                        <a href="javascript: void(0);" onClick=" javascript:OpenPopup('support.php','WindowName','425','475','scrollbars=1');">
                        <img width="25" height="25" style="width: 25px;
                            height: 25px" src="../images/yahoo-icon.png">Hỗ trợ
                    	</a>
                        </li>
					</ul>					
				</div>
			</div>
		</div>
        <!-- body -->
<script> 
function ktngayden(){ 
today= new Date(); 
current_year=today.getFullYear(); 
current_month=today.getMonth()+1; 
current_day=today.getDate(); 
if (current_month<10) current_month="0"+current_month; 
if (current_day<10) current_day="0"+current_day; 

today_string=current_day+"-"+current_month+"-"+current_year;
//alert(today_string); 

ngayden=document.frm1.ngayden.value; 
if (ngayden<today_string) 
{ 
    alert ("Ngày Nhận Phòng không được nhỏ hơn ngày hiện tại <?php $now= date('d-m-Y',time()); echo $now; ?>!!!"); //Ham lay gia tri ngay hien tai
    document.frm1.ngayden.value=current_day+"-"+current_month+"-"+current_year; 
} 
} 
function ktngaydi(){ 
today= new Date(); 
current_year=today.getFullYear(); 
current_month=today.getMonth()+1; 
current_day=today.getDate(); 
if (current_month<10) current_month="0"+current_month; 
if (current_day<10) current_day="0"+current_day; 

today_string=current_day+"-"+current_month+"-"+current_year;
//alert(today_string); 

ngaydi=document.frm1.ngaydi.value; 
if (ngaydi<today_string) 
{ 
    alert ("Ngày Trả Phòng không được nhỏ hơn ngày hiện tại <?php $now= date('d-m-Y',time()); echo $now; ?>!!!"); //Ham lay gia tri ngay hien tai
    document.frm1.ngaydi.value=current_day+"-"+current_month+"-"+current_year; 
} 
}
</script>  
<div class="body">
       <div class="home"> 
           <div class="boder">
<!-- code rieng phan booking-->
<form action="" method="post" name="frm1" id="frm1" style="border: 10px ridge; margin: 10px 20px; background-color: khaki; min-height: 360px;">
    <section class="booking_home">
                            <table class="tbbooking">
                                <div class="date_title">
                                <h1> Mời chọn ngày: </h1>
                                </div>
                                <section id="chonphong"></section>
                            <tr>
                                <th> Ngày nhận phòng: </th> 
                                <th> Ngày trả phòng: </th>
                            </tr>
                            <tr>
                                <td><input type="text" name="ngayden" id="Ngayden" readonly onchange="ktngayden()" onclick="javascript:NewCssCal ('Ngayden','ddMMyyyy')" required style="font-size: 19px; font-weight: bold; width: 160px; text-align: center; font-style: italic; color: orangered;"/><img src="../images/cal.gif" onclick="javascript:NewCssCal ('Ngayden','ddMMyyyy')"/></td>
                                <td><input type="text" name="ngaydi" id="Ngaydi" readonly onchange="ktngaydi()" onclick="javascript:NewCssCal ('Ngaydi','ddMMyyyy')" required style="font-size: 19px; font-weight: bold; width: 160px; text-align: center; font-style: italic; color: orangered;"/><img src="../images/cal.gif" onclick="javascript:NewCssCal ('Ngaydi','ddMMyyyy')"/></td>
                            </tr>
                            </table>
                            <section id="erorr"></section> <!--Hiển thị lỗi..-->
                            <div class="btnbooking" id="btnbooking"> 
                                <input class="nice_td_submit_01" type="button" onclick="booking(document.getElementById('Ngayden').value,document.getElementById('Ngaydi').value)" name="btnBooking" value="Đặt phòng"/>   
                            </div>
                            <div id="btnResetroom" style="display: none">
                                <input class="nice_td_submit_02" type="button" onclick="booking(document.getElementById('Ngayden').value,document.getElementById('Ngaydi').value)" name="btnResetroom" value="Đặt phòng"/>
                            </div>
                            <section id="data_load"></section>
    </section> 
       <?php
       if(isset($_POST['btnCheckin']))
            {
                $rooms=0;
                if(isset($_POST['cbroom']))
                        {      
                            $rooms= count($_POST['cbroom']);
                            $rooms=implode(',', $_POST['cbroom']);                          
                            $_SESSION['date_data']['phong']= $rooms;
                            //$dsphong = explode(',',$_SESSION['date_data']['phong']);
                        }
                if($rooms==0)
                {
?>
    <script language="javascript">
                    alert ("Moi ban chon phong!!");
                    history.back();

   </script>
<?php
                }
                else 
                {
                    header("location:dondatphong.php");
                }     
            }  
       ?>
</form>
<script type="text/javascript">
function booking(ngayden,ngaydi) 
{
 if(ngayden=="" || ngaydi=="")
 {  
  document.getElementById("erorr").innerHTML="Mời chọn <span class='clname_erorr'>Ngày nhận phòng</span> và <span class='clname_erorr'>Ngày trả phòng</span>!";
  return;
  }
 
  if(ngayden > ngaydi) 
  {
  document.getElementById("erorr").innerHTML="<span class='clname_erorr'>Ngày trả phòng</span> phải sau <span class='clname_erorr'>Ngày nhận phòng</span>!";
  
  return;
  }
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
  document.getElementById("btnbooking").style.display="none";
  document.getElementById("erorr").style.display="none";
  document.getElementById("btnResetroom").style.display="inline";
xmlhttp.open("GET","hotrodatphong.php?ngayden="+ngayden+"&ngaydi="+ngaydi+"#chonphong",true)

xmlhttp.send();
window.location="datphong.php#chonphong";
}   
</script>   
				<div>
					<ul>
						<li>
							<h3>Phòng Nghỉ</h3>
							<a href="../phongnghi.php"><img src="../images/pvip1.jpg" alt="" width="228" height="228"></a>
							<p>
								Liệt kê thông tin
							</p>
							<a href="../phongnghi.php" class="click-here"></a>
						</li>
						<li>
							<h3>Nhà Hàng</h3>
							<a href="../thuvien.php"><img src="../images/da1.jpg" alt="" width="228" height="228"></a>
							<p>
								Liệt kê món ăn						
                                </p>
							<a href="../thuvien.php" class="click-here"></a>
						</li>
						<li>
							<h3>Dịch Vụ</h3>
                                                        <a href="../dichvu.php"><img src="../images/dv1.jpg" alt="" width="228" height="228"></a>
							<p>
								Liệt kê dịch vụ
							</p>
                                                        <a href="../dichvu.php" class="click-here"></a>
						</li>
					</ul>
				</div>
			</div>
                    </div>
                </div>
                
                </div>
        <!-- footer -->
        <div class="footer">
			<div>
				<div>
					<ul>
						<li>
                                                    <a href="../index.php">Trang Chủ</a>
						</li>
						<li>
                                                    <a href="../phongnghi.php">Phòng Nghỉ</a>
						</li>
						<li>
                                                    <a href="../dichvu.php">Dịch Vụ</a>
						</li>
						<li>
                                                    <a href="../tintuc.php">Tin Tức</a>
						</li>
                                                <li>
                                                    <a href="../thuvien.php">Thư Viện</a>
						</li>
						<li>
                                                    <a href="../lienhe.php">Liên Hệ</a>
						</li>
					</ul>
					<p>
					
					</p>
					<div class="connect">
						<a href="https://www.facebook.com/khachsan" id="fb" target="_blank">facebook</a> 
                        <a href="#" id="twitter">twitter</a> 
                        <a href="#" id="googleplus">googleplus</a> 
                        <a href="#" id="vimeo">vimeo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>