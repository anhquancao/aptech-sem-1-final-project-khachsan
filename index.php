<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>project khach san</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
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
	<div class="page">
		<div class="header">
			<a style="	margin-top: -24px;" href="#" id="logo"><img src="images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
                                  
					
				</div>
                                <div>
					<ul>
						<li class="selected" >
							<a href="index.php"><span>Trang Chủ</span></a>
						</li>
						<li>
                            <a href="phongnghi.php#phantrang"><span>Phòng Nghỉ</span></a>
						</li>
						<li>
                            <a href="dichvu.php#phantrang"><span>Dịch Vụ</span></a>
						</li>
						<li>
							<a href="tintuc.php#phantrang"><span>Tin Tức</span></a>
						</li>
                                                <li>
							<a href="thuvien.php#phantrang"><span>Thư Viện</span></a>
						</li>
                                                <li >
                                                    <a href="lienhe.php#phantrang"><span>Liên Hệ</span></a>
						</li>
						 <li>
                        <a href="javascript: void(0);" onClick=" javascript:OpenPopup('support.php','WindowName','425','475','scrollbars=1');">
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
                    <div class="slideshow">
		<!--slide-->
          
        <div id="slideshow">
<ul id="demo1">
<?php
$link= mysqli_connect('localhost', 'root', '');
mysqli_select_db($link, 'ql_khach_san');

$query='select tieude,hinhanh,mota,matt from tintuc where trangthai=1 order by ngaydang desc limit 5';
$result=  mysqli_query($link, $query);
while($r=  mysqli_fetch_array($result))
{
echo "<li>" 
. "<a href='tintuc-hienthi.php?id={$r[3]}#newsarea'><img src='images/tintuc/$r[1]' style='width:864px; height:427px;'/></a>" 
. "<!--Slider Description example-->" 
. " <div class='slide-desc' style='width:600px;'>" 
.		"<a href=\"tintuc-hienthi.php?id={$r[3]}#newsarea\">"  . $r[0] . "</a>" 
.		"<p>" . $r[2] . "<a class='more' href='tintuc-hienthi.php?id={$r[3]}#newsarea'>Chi tiết</a></p>" 
. "</div>" 
. "</li> "; 
}
?> 
</ul>
</div>
        <!--end-->
                    </div>
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
			<div class="home">
            	<div style="background:url('images/border.png') repeat-x scroll left bottom transparent; width:860px; margin-top:-10px; margin-left:50px;">	
            </div>
				<div class="section">
					<div>
						<h3 style="font-size:24px;color: #B40404;">
						<?php 
							$count=0;
							$query_setting="select content from setting";
							$result_setting=mysqli_query($link,$query_setting);
							if(mysqli_num_rows($result_setting)>0) {
								while ($r_setting=mysqli_fetch_array($result_setting))
								{
									if ($count==0) $title_setting=$r_setting[0];
									if ($count==1) $des_setting=$r_setting[0];
									$count+=1;
								}					
									
							}
							if (isset($title_setting)) echo $title_setting;
						?>						
						
						
						
						</h3>
						<p style="font-size:15px">
							<?php if (isset($des_setting)) echo $des_setting; ?>
						</p>						
					</div>
					<div style="padding-top:35px">
                                            <a href="booking/datphong.php"><img src="images/book-now.png" alt="" height="180" width="228"></a>
					</div>
				</div>
				<div>
					<ul>
						<li>
							<h3>Phòng Nghỉ</h3>
							<a href="phongnghi.php"><img src="images/featured.jpg" alt="" width="228" height="228"></a>
							
							<a href="phongnghi.php" class="click-here"></a>
						</li>
						<li>
							<h3>Thư Viện Ảnh</h3>
							<a href="thuvien.php"><img src="images/da1.jpg" alt="" width="228" height="228"></a>
							
							<a href="thuvien.php" class="click-here"></a>
						</li>
						<li>
							<h3>Dịch Vụ</h3>
							<a href="dichvu.php"><img src="images/dv1.jpg" alt="" width="228" height="228"></a>
							
							<a href="dichvu.php" class="click-here"></a>
						</li>
					</ul>
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