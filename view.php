<!DOCTYPE html>
<?php
	include_once 'config/connect.php';
	if (isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];	
		$query1="select Album,MoTa,AnhDaiDien from album where MaAlbum={$id}";
		$r1=mysqli_fetch_array(mysqli_query($link,$query1));
		$query2="select Anh from anh where MaAlbum={$id}";
		$result=mysqli_query($link,$query2);
	}
	
?>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>project khach san</title>
        <link rel="stylesheet" href="css/view.css"type="text/css">
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
        <!--Ho Tro Truc Tuyen-->
	<script type="text/javascript">

function OpenPopup(Url,WindowName,width,height,extras,scrollbars) {
var wide = width;
var high = height;
var additional= extras;
var top = (screen.height-high)/2;
var leftside = (screen.width-wide)/2; newWindow=window.open(''+ Url + '',''+ WindowName + '','width=' + wide + ',height=' + high + ',top=' + top + ',left=' + leftside + ',features=' + additional + '' + ',scrollbars=1');
newWindow.focus();
}
function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">Tắt quảng cáo [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Xem quảng cáo...</a>';
    }
    }
	</script>
    <!-- SlideShow-->
	<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
	 $(document).ready( function(){	
		// buttons for next and previous item						 
		var buttons = { previous:$('#jslidernews1 .button-next') ,
						next:$('#jslidernews1 .button-previous') };			
		 $('#jslidernews1').lofJSidernews( { interval : 4000,
											direction		: 'opacitys',	
											easing			: 'easeInOutExpo',
											duration		: 1200,
											auto		 	: true,
											maxItemDisplay  : 4,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 32,
											navigatorWidth  : 80,
											mainWidth		: 980,
											buttons			: buttons } );	
	});
	</script>
    <!--galery slideshow-->
    <!-- First, add jQuery (and jQuery UI if using custom easing or animation -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.galleryview-3.0-dev.css" />

<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView();
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
						<li  >
							<a href="index.php"><span>Trang Chủ</span></a>
						</li>
						<li>
                                                    <a href="phongnghi.php"><span>Phòng Nghỉ</span></a>
						</li>
						<li>
                                                    <a href="dichvu.php"><span>Dịch Vụ</span></a>
						</li>
						<li>
							<a href="tintuc.php"><span>Tin Tức</span></a>
						</li>
                                                <li class="selected">
							<a href="thuvien.php"><span>Thư Viện</span></a>
						</li>
                                                <li >
                                                    <a href="lienhe.php"><span>Liên Hệ</span></a>
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
            	<div class="section">
                  <div style="">
                      <div class="roomIntro">
                      <div><h1 class="title" ><?php echo $r1[0]; ?></h1></div>
                      </div>
                            <div class="desroom" style="width:500px ; float: left; margin-left: 50px; margin-top: -30px;">
								<?php echo $r1[1]; ?>
                            </div>
                   
                      <a href="#" id="desImage" style="width: 250px; float: left; margin-top: -50px; margin-left: 30px;"><img src="images/album/<?php echo $r1[2]; ?>" width="260px"  /></a>
                  </div>                                    
                </div>
            </div>
           <!--galery slideshow-->
           <div style="background:url(images/bg-mid.png); width:960px;">
           <div style="margin-left:70px; padding:30px 0 30px 0;">
           <ul id="myGallery" >
		   <?php
				if (mysqli_num_rows($result)>0)
				{
					while ($r2=mysqli_fetch_array($result))
					{
						echo
							"<li><img src=\"images/album/{$r2[0]}\">";
					}
				}
		   ?>
		   
		
		
       
     
      
			</ul>
            </div>
    	</div>
        <!-- footer -->
        <div class="footer">
			<div>
				<div>
					<ul>
						<li>
							<a href="#">Trang Chủ</a>
						</li>
						<li>
							<a href="#">Phòng Nghỉ</a>
						</li>
						<li>
							<a href="#">Dịch Vụ</a>
						</li>
						<li>
							<a href="#">Tin Tức</a>
						</li>
                        <li>
							<a href="#">Thư Viện</a>
						</li>
						<li>
							<a href="#">Liên Hệ</a>
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
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

