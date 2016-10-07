<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	ob_start();
	if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id']))
    {
    	header("location:tintuc.php#phantrang");
    }
    include_once 'config/connect.php';
   
    $query="select * from tintuc where TrangThai=1 order by NgayDang desc";
    if (isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
	
    }
    $result=  mysqli_query($link, $query);
 
    
?>
<html>
<head>
    
	<meta charset="UTF-8">
	<title>project khach san</title>
	
        <link rel="stylesheet" href="css/style-phongnghi-chitiet.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
<script type="text/javascript">
	function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">Tắt quảng cáo [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Xem quảng cáo...</a>';
    }
    }
</script>	        
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
	 <!--slide show news-->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>
</head>
<body>
	<a  href="#dautrang" class="vedautrang">	Về đầu trang	</a>
	<div class="page">
		
		<div class="header">
			<a style="	margin-top: -24px;" href="#" id="logo"><img src="images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
			
				</div>
				<div>
					<ul id="dautrang">
						<li  >
							<a href="index.php"><span>Trang Chủ</span></a>
						</li>
						<li class="selected">
                                                    <a href="phongnghi.php"><span>Phòng Nghỉ</span></a>
						</li>
						<li>
                                                    <a href="dichvu.php"><span>Dịch Vụ</span></a>
						</li>
						<li >
                                                    <a href="tintuc.php"><span>Tin Tức</span></a>
						</li>
                                                <li>
							<a href="thuvien.php"><span>Thư Viện</span></a>
						</li>
                                                <li >
                                                    <a href="lienhe.php"><span>Liên Hệ</span></a>
						</li>
                                                <li>
                                                    <a href="javascript: void(0);" onclick=" javascript:OpenPopup('support.php','WindowName','425','475','scrollbars=1');">
                                                    <img width="25" height="25" style="width: 25px;
                                                        height: 25px" src="images/yahoo-icon.png">Hỗ trợ
                                                    </a>
                                                </li>
					</ul>					
				</div>
			</div>
		</div>
        <!-- body -->
        <div class="body">
        <div class="float-ck" style="right: 0px" >
                <div id="hide_float_right">
                <a href="javascript:hide_float_right()">Tắt Quảng Cáo [X]</a></div>
                <div id="float_content_right">
                <!-- Start quang cao-->
                <?php
                    $link= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'ql_khach_san');
        $queryqc="select * from quangcao group by maqc desc limit 1" ;
        $resultqc=  mysqli_query($link, $queryqc);
        $rqc=  mysqli_fetch_array($resultqc);
        echo "<a href='h$rqc[2]'><img src='images/quangcao/$rqc[3]' width='180' height='300' quality='high' href='#' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' menu='false' wmode='transparent' allowScriptAccess='always'/>
                 </a>";
?>
                     <!-- End quang cao -->
                </div>
            </div>
		<div class="slideshow">
		<!--slide-->
          
        <div id="slideshow">
<ul id="demo1">
<?php


$query4='select tieude,hinhanh,mota,matt from tintuc where trangthai=1 order by ngaydang desc limit 5';
$result4=  mysqli_query($link, $query4);
while($r4=  mysqli_fetch_array($result4))
{
echo "<li>" 
. "<a href='tintuc-hienthi.php?id={$r4[3]}#newsarea'><img src='images/tintuc/$r4[1]' style='width:864px; height:427px;'/></a>" 
. "<!--Slider Description example-->" 
. " <div class='slide-desc' style='width:600px;'>" 
.		"<a href=\"tintuc-hienthi.php?id={$r4[3]}#newsarea\">"  . $r4[0] . "</a>" 
.		"<p>" . $r4[2] . "<a class='more' href='tintuc-hienthi.php?id={$r4[3]}#newsarea'>Chi tiết</a></p>" 
. "</div>" 
. "</li> "; 
}
?> 
</ul>
</div>
        <!--end-->
                    </div>
			<div class="home">
            <div style="background:url('images/border.png') repeat-x scroll left bottom transparent; width:790px; margin-top:10px; margin-left:50px;">	
            </div>
			<div style="background:url('images/border.png') repeat-x scroll left bottom transparent;height:50px">
			<div style="display:block;width:790px;float:left;padding:0px;" >
                                            <h1 class="title" style="display:block;margin-top:-30px;margin-left:-30px;"><a href="phongnghi.php" style="text-decoration:none;color: #B40404;">Phòng Nghỉ</a></h1>
                                            <a href="phongnghi.php#phantrang" style="float: right;padding: 10px;margin-top: -25px;" class="phantrang" >Quay về trang Phòng Nghỉ</a>		
								
                        				
							</div>
                   
                    
                    
					</div>
                            <div class="tintuc" id="newsarea" style="background-color: #D1D6DB;padding-top:10px;padding-right:10px;margin-bottom:20px;border-radius:8px">
                                
                                    
                                <div class="tintuc-hienthi" style="margin: 20px 0px 0px;" >
                                    <?php
                                        $query="Select TenLP ,HinhAnh,ThongTin,DonGia from loaiphong where MaLP={$id} ";
                                        $result=  mysqli_query($link, $query);
                                        if (mysqli_num_rows($result)>0)
                                        {
                                            while ($r=  mysqli_fetch_array($result))
                                            {
                                                echo "
                                                        
                                                        <div class=\"title\" style=\"float:right;margin-top:20px;margin-right:400px;margin-left:10px;margin-bottom: -20px;\">
                                                            $r[0]
                                                        </div>
                                                        <div style=\"float:right;color: #B40404;;margin-right:400px;margin-left:10px;margin-top:10px\">
                                                        	Giá: ".number_format($r[3])." VND 
                                                        	</div>
                                                       <div style=\"float:right;color: #B40404;;margin-right:410px;margin-left:10px;margin-top:-10px\">
                                                        	<a  href=\"booking/datphong.php\"class=\"phantrang\" >Đặt phòng ngay </a>
                                                        	</div>
                                                        <div style=\"background: url(../images/bg-shadow3.png) no-repeat right bottom;padding:0px 0px 9px\">
                                            							<img style=\"border: 12px solid #F9F9F9;\" src=\"images/loaiphong/$r[1]\"  height=\"180\" width=\"228\">
																			</div>
                                                        
                                                        <div class=\"content\">
                                                            $r[2]
                                                        </div>";
                                            }
                                        }
                                        else {
                                        	echo "<div style=\"color:red;margin-left:100px\">không tồn tại bài viết nào </div>";
                                        }
                                    ?>
                                    
                                    
                                    <a href="phongnghi.php#phantrang" class="phantrang" >Quay về trang Phòng Nghỉ </a>		
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
							<a href="index.php">Trang Chủ</a>
						</li>
						<li>
							<a href="phongnghi.php">Phòng Nghỉ</a>
						</li>
						<li>
							<a href="dichvu.php">Dịch Vụ</a>
						</li>
						<li>
							<a href="tintuc.php">Tin Tức</a>
						</li>
                        <li>
							<a href="thuvien.php">Thư Viện</a>
						</li>
						<li>
							<a href="lienhe.php">Liên Hệ</a>
						</li>
					</ul>
					<p>
					
					</p>
					<div class="connect">
			<a href="https://www.facebook.com/khachsan" id="fb" target="_blank">facebook</a> 
                        <a href="https://twitter.com/khachsan " id="twitter">twitter</a> 
                        <a href="https://plus.google.com/khachsan" id="googleplus">googleplus</a> 
                        <a href="https://vimeo.com/khachsan" id="vimeo">vimeo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
