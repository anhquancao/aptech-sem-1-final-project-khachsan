<?php
session_start();
 //ket noi
     $link= mysqli_connect('localhost',"root","");
     mysqli_select_db($link, "ql_khach_san");
     
     $dsphong = explode(',',$_SESSION['date_data']['phong']);
     $ngayden= $_SESSION['date_data']['ngayden'];//kieu m-d-Y
     $ngaydi= $_SESSION['date_data']['ngaydi'];//kieu m-d-Y
     $ndat= date('d-m-Y',time());
     $ngaydat= date('Y-m-d',time());
//validate viet bieu thuc chinh quy va hien thi text li ngay canh dong nhap loi
     ?>
<html>
<head>
	<meta charset="UTF-8"/>
	<title> Đơn Đặt Phòng </title>
        <link rel="stylesheet" href="css/bookingcss.css" type="text/css"/>        
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
    <div class="body" style="margin: auto;">
    <div class="home">
        <section class="don_body">
            <form action="" method="post" class="nice_form" style="border: 10px ridge; background-color: lavender; width: 800px; margin-left: 40px; margin-top: -3px;">
        <div class="tittle"><h1 style="padding-left: 230px"> Đơn Đặt Phòng </h1></div>
        <table id="tbdondatphong">
            <tr>
                <td class="nice_td_text"> Họ & Tên: </td>
                <td>
                    <input class="nice_td_input" type="text" name="txtName" placeholder="Customer Name" required/>
                    <span id="erorr_name" class="erorr_span">(*)</span>
                </td>                   
            </tr>
            <tr>
                <td class="nice_td_text"> Địa chỉ: </td>
                <td>
                    <input class="nice_td_input" type="text" name="txtAddress" placeholder="Address"/>
                    <span id="erorr_address" class="erorr_span"></span>
                </td>               
            </tr>
            <tr>
                <td class="nice_td_text">Số chứng minh thư: </td>
                <td>
                    <input class="nice_td_input" type="text" name="txtCmt" placeholder="Identity Card" required/>
                    <span id="erorr_cmt" class="erorr_span">(*)</span>
                </td>
            </tr>
            <tr>
                <td class="nice_td_text">Email: </td>
                <td>
                    <input class="nice_td_input" type="email" name="txtEmail"/>                    
                </td> 
                <span id="erorr_address" class="erorr_span"></span>
            </tr>
            <tr>
                <td class="nice_td_text"> Số điện thoại: </td>
                <td>
                    <input class="nice_td_input" tclass="nice_td_input"ype="tel" name="txtTel" placeholder="Phone number" required />
                    <span id="erorr_tel" class="erorr_span">(*)</span>
                </td>
            </tr>
            <tr>
                <td class="nice_td_text"> Ngày đặt phòng: </td>
                <td style="padding-left: 12px; font-size: 20px; color: darkorange; font-weight: bold; font-style: italic;"><?php echo $ndat; ?></td>
            </tr>
            <tr>
                <td class="nice_td_text"> Ngày nhận phòng: </td>
                <td style="padding-left: 12px; font-size: 20px; color: blue; font-weight: bold; font-style: italic;"><?php echo $ngayden; ?></td>
            </tr>
            <tr>
                <td class="nice_td_text"> Ngày trả phòng: </td>
                <td style="padding-left: 12px; font-size: 20px; color: blue; font-weight: bold; font-style: italic;"><?php echo $ngaydi;?></td>
            </tr>
            <tr>
                <td class="nice_td_text"> Phòng đã đặt: </td>
                <td style="font-size: 20px;">
                <?php
                        foreach ($dsphong as $key)
                            {
                                echo '<input type="checkbox" name="cbrooms[]" value="'.$key.'" checked="checked"/>'.$key;
                            }                         
                ?>
                </td>
            </tr>
            <tr>
                <td class="nice_td_text">Hình thức thanh toán:</td>
                <td>
                    <select name="slHTTT" class="nice_td_input" required>
                        <option value="0">Mời chọn HTTT</option>
                        <option value="1"> Thanh toán trực tiếp </option>
                        <option value="2"> Qua Paypal </option>
                        <option value="3"> Chuyển khoản </option>
                        
                    </select>
                    <span id="erorr_HTTT" class="erorr_span">(*)</span>
                </td>
            </tr>
            <tr>
                <td class="nice_td_text"> Yêu cầu: </td>
                <td><textarea class="nice_td_input" name="txtYeucau"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="nice_td_submit" type="submit" name="btnBook" value="Đặt phòng"/></td>
            </tr>
        </table>
        </form>
        </section>
    <script>
            var erorrs='';
            if(document.getElementById("txtName")=='')
            {
                document.getElementById("txtName").innerHTML="Mời nhập <span class="clname_erorr">Họ & Tên</span>";
            }
            if(document.getElementById("slHTTT").value==0)
            {
                document.getElementById("erorr_HTTT").innerHTML="Moi chon hinh thuc thanh toan!!!"
            }
    </script>
        <?php
                            
                if(isset($_POST['btnBook']))
                {
                    //lay du lieu ng dat phong
                    
                    $name= $_POST['txtName'];
                       
                    $diachi= $_POST['txtAddress'];
                        
                    $cmt= $_POST['txtCmt'];
                        
                    $email= $_POST['txtEmail'];
                        
                     $sdt= $_POST['txtTel'];
                        
                    $HTTT= $_POST['slHTTT'];
                    $yeucau= $_POST['txtYeucau'];
                    $nden= date_create($_SESSION['date_data']['ngayden']);
                    $ngaynhan=  date_format($nden,'Y-m-d');
                    $ndi= date_create($_SESSION['date_data']['ngaydi']);
                    $ngaytra= date_format($ndi,'Y-m-d');
                    //insert vao csdl
                    $query1= "insert into dondatphong( TenKH, CMT, DiaChi, Email, DienThoai, HTTT, YeuCau, NgayDat, NgayDen, NgayDi) "
                            . " values ( '$name', $cmt, '$diachi', '$email', $sdt, $HTTT, '$yeucau', '$ngaydat', '$ngaynhan', '$ngaytra')";
                    mysqli_query($link, $query1);
                    $MaDDP= mysqli_insert_id($link);
                    if(mysqli_affected_rows($link)>0)
                    {   
                       $query2= "insert into dondatphongct( MaDDP, MaP) values ";
                       $i=1;
                       foreach ($dsphong as $value) 
                        {
                           
                           if($i < count($dsphong))
                           {
                               $query2.= " ( $MaDDP, $value), ";
                               $i++;
                           }
                           else if($i == count($dsphong))
                           {
                               $query2.= " ( $MaDDP, $value)";
                               $i++;
                           }
                        }
                        mysqli_query($link, $query2) or die(mysqli_error($link));;
                        if(mysqli_affected_rows($link)>0)
                        {
                             unset($_SESSION['date_data']);
                        ?>
                            <script>
                                alert("Đặt phòng thành công!");
                                alert("Nếu quý khách có bất kì thắc mắc xin liên hệ vs chúng tôi qua đường dây nóng trên trang chủ!\n\
                            Xin chân thành cảm ơn!");
                                window.location="../index.php";
                            </script>
                        <?php                       
                            //header( "refresh:3;location:index.php");
                        }
                            
                    }
                    else
                    {
                        echo '<div class="error"> Đặt phòng không thành công! Xin quý khách nhập lại thông tin cho chính xác! </div>';
                    }
                }
               
                        ?>
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
</body>
</html>