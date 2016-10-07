<!DOCTYPE html>

<!-- Website template by freewebsitetemplates.com -->

<?php
	 session_start();
    include_once 'config/connect.php';
    include_once 'config/function.php';
    
    
                                                            if (isset($_POST['btnAdd']))
                                                            {
                                                                $error=array();
                                                                if (empty($_POST['txtName']))
                                                                {
                                                                    $error[]="loi_ten";
                                                                }
                                                                else
                                                                {
                                                                        $ten=$_POST['txtName'];
                                                                }
                                                                if (empty($_POST['txtSDT']) || is_numeric($_POST['txtSDT'])==FALSE )
                                                                {
                                                                    $error[]="loi_sdt";
                                                                }
                                                                else
                                                                    {
                                                                        $sdt=$_POST['txtSDT'];
                                                                    }
                                                                if (empty($_POST['txtEmail']) || filter_var($_POST['txtEmail'],FILTER_VALIDATE_EMAIL)==FALSE )
                                                                {
                                                                    $error[]="loi_email";
                                                                }
                                                                else
                                                                    {
                                                                        $email=$_POST['txtEmail'];
                                                                    }
                                                                if (empty($_POST['txtNoiDung']))
                                                                {
                                                                    $error[]='loi_noidung';
                                                                }
                                                                else
                                                                    {
                                                                        $noidung=$_POST['txtNoiDung'];
                                                                    }
                                                                if (!empty($_POST['url'])){
																							redirect_to('index.php');   
																							exit;                                                          
                                                                }
                                                                if(isset($_POST['captcha']) && trim($_POST['captcha']) != $_SESSION['q']['answer']) {
        																					$error[] = 'wrong';
    																					}
    																				if (isset($_POST['question']) && !empty($_POST['question']))
    																					{
																								$error[]='question'    ;																					
    																					
    																					}
    																				
                                                                    
                                                            }
 
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>project khach san</title>
	<link rel="stylesheet" href="css/style-lienhe.css" type="text/css">
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
        <!--<script type="text/javascript">
            function check()
            {
                var error="";
                if (document.getElementById("txtName").value==="")
                {
                    error+="Bạn cần nhập tên \n";
                }
                if (document.getElementById("txtSDT").value==="")
                {
                    error+="Bạn cần nhập số điện thoại \n";
                }
                var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                if (document.getElementById("txtEmail").value==="")
                {
                    error+="Bạn cần nhập email \n";
                } 
                if(pattern.test(document.getElementById("txtEmail").value)==false)
                {
                    error+="Bạn cần nhập đúng email\n";
                }
              
                if (document.getElementById("txtNoiDung").value==="")
                {
                    error+="Bạn cần nhập nội dung \n";
                }
                if (error==="")
                {
                     return confirm('Xác nhận gửi ?');
                }
                else
                {
                    alert (error);
                }
               
                
            }
            
            </script>-->
</head>
<body>
        <script type="text/javascript" src="javascript/js.js">
        </script>
	<div class="page">
		<div class="header">
			<a style="	margin-top: -24px;" href="#" id="logo"><img src="images/logo.png" alt="logo" width="148" height="131"></a>
			<div>
				<div>
				<!--	<?php
                                    
                                    if(!isset($_SESSION['login']) || $_SESSION['login'] != "ok")
                                    {
                                        echo "<a id=\"login\" href=\"admin/index.php\" id=\"li\">Log-in</a>";
                                    }
                                    else 
                                    {
                                        echo "<a id=\"login\"  href=\"admin/index.php\"> Welcome, <strong> ".$_SESSION['lg_username']."</strong></a>";
                                    }
                                    
                                    ?>-->
                                   <!-- <a style="">hello</a>-->
				</div>
				<div>
					<ul >
						<li >
                                                    <a href="index.php#phantrang"><span>Trang Chủ</span></a>
						</li>
						<li >
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
                                                <li class="selected">
                                                    <a href="lienhe.php#phantrang"><span>Liên Hệ</span></a>
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
			<div class="home" id="phantrang">
            
				<div style="background:url('images/border.png') repeat-x scroll left bottom transparent; width:860px; margin-top:10px; margin-left:50px;">	
                </div>
				<div class="section">
                <div style="background:url('images/border.png') repeat-x scroll left bottom transparent">
					<div class="roomIntro">
					<?php
		$query_setting="select content from setting where id=14 or id=15 or id=16";
    $count1=0;
    $result_setting=mysqli_query($link,$query_setting);
    while($r_setting=mysqli_fetch_array($result_setting)) 
    	{
    		if ($count1==0) $title1=$r_setting[0];
    		if ($count1==1) $des1=$r_setting[0];
    		if ($count1==2) $des2=$r_setting[0];
    		$count1+=1;
    		
    	}
					?>
                                            <h1 class="title" style="width: 160px;color:#B40404"><?php if (isset($title1)) echo $title1; ?></h1>
                        <div class="desroom" style="text-indent:20px;">
                        	<?php if (isset($des1)) echo $des1; ?>
                       </div>
                        				
					</div>
                   
                    
                </div>
                
                
                    
                    
                                    <div class="formlienhe" id="form_lienhe">
                                        
                                        <form id="lienhe_form" action="lienhe.php#form_lienhe" method="post" style="margin-left: 10px;">
                                            <table>
                                                <tr>
                                                    <td class="left">Tên: <span class="required">*</span> </td>
                                                    <td class="right"><input type="text" value="<?php if (!empty($_POST['txtName'])) echo $_POST['txtName']; ?>" name="txtName" id="txtName" size="37"/></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="right">
                                                        <?php
                                                        if(!empty($error) && in_array("loi_ten", $error))
                                                            {
                                                                echo "<span style='color:red'>Bạn chưa nhập tên</span>";
                                                            }
                                                        
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Số điện thoại: <span class="required">*</span> </td>
                                                    <td class="right"><input type="text" value="<?php if (!empty($_POST['txtSDT'])) echo $_POST['txtSDT']; ?>" name="txtSDT" id="txtSDT"  size="37"/></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="right">
                                                    <?php
                                                        if(!empty($error) && in_array("loi_sdt", $error))
                                                        {
                                                        		if (is_numeric($_POST['txtSDT'])==FALSE )
                                                        		
                                                        		echo "<span style='color:red'>Bạn nhập sai số điện thoại</span>";
                                                        		else
                                                            echo "<span style='color:red'>Bạn chưa nhập số điện thoại</span>";
                                                        }
							

                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Email: <span class="required">*</span> </td>
                                                    <td class="right"><input  value="<?php if (!empty($_POST['txtEmail'])) echo $_POST['txtEmail']; ?>" type="text" name="txtEmail" id="txtEmail" size="37"/></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="right">
                                                <?php
                                               if(!empty($error) && in_array("loi_email", $error))
                                               {
						   if(filter_var($_POST['txtEmail'],FILTER_VALIDATE_EMAIL)==FALSE && !empty($_POST['txtEmail'])  )

                                                      	echo "<span style='color:red'>Bạn nhập email chưa đúng</span>";
						   else
							echo "<span style='color:red'>Bạn chưa nhập email</span>";
                                               }
                                               ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Nội dung: <span class="required">*</span> </td>
                                                    <td class="right"><textarea style="width: 500px; height: 150px;" name="txtNoiDung" id="txtNoiDung"><?php if (!empty($_POST['txtNoiDung'])) echo $_POST['txtNoiDung']; ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="right">
                                                <?php
                                               if(!empty($error) && in_array("loi_noidung", $error))
                                               {
                                                   echo "<span style='color:red'>Bạn phải nhập nội dung</span>";
                                               }
                                               ?>
                                                    </td>
                                                 </tr>
                                                 
                                                 <tr>
                                                 <td></td>
																		<td style="text-align:left" >
        <label for="captcha" >Phiền bạn điền vào giá trị số cho câu hỏi sau: <?php echo captcha(); ?><span class="required">*</span>     
            </label>
          															</td>
            
           
        															
                                                 </tr>
                                                 
                                                 
                                                 
                                                
<tr>
<td></td>

	<td > <input type="text" name="captcha" id="captcha" value="" size="20" maxlength="5" style="width:120px;float:left" tabindex="4" /></td>

</tr>
<tr>
	<td></td>
	<td  style="color:red" class="right"><?php if(isset($error) && in_array('wrong',$error)) {echo "<span class='warning'>Phiền bạn đưa ra câu trả lời đúng</span>";}?></td>
</tr>                                                
                                                
                                                
                                                <tr>
                                                 <td></td>
																		<td style="text-align:left">
        <label  for="question" >phiền bạn xóa giá trị ở trường dưới trước khi gửi    <span class="required">*</span>  
            </label>
          															</td>
            
           
        															
                                                 </tr>
                                                 
                                                 
                                                 
                                                
<tr>
<td></td>

	<td > <input type="text" name="question" value="xóa đi giá trị này" id="question" value="" size="20" maxlength="5" style="width:120px;float:left" tabindex="4" /></td>

</tr>
<tr>
	<td></td>
	<td  style="color:red" class="right"><?php if(isset($error) && in_array('question',$error)) {echo "<span class='warning'>Bạn quên chưa xóa giá trị trường trên </span>";}?></td>
</tr>                                                


                                                <tr>
                                                    <td>
                                                        
                                                    </td>
                                                    <td class="right">
                                                        <input type="submit"  onclick="check()" name="btnAdd" value="gửi"/>
                                                        <input type="reset" name="btnReset" value="nhập lại"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left"></td>
                                                    <td class="right">
                                                        <?php
                                                             
                                                                if (empty($error) && isset($_POST['btnAdd']))
                                                                {
                                                                    $query="insert into lienhe(TenLH,SoDT,Email,NoiDung,NgayGui) values ('{$ten}','{$sdt}','{$email}','{$noidung}',NOW())";
                                                                    
                                                                    mysqli_query($link, $query);
                                                                    if(mysqli_affected_rows($link)>0)
                                                                        {
                                                                         echo "<span style=\"color:green\">Gửi thành công</span>";
                                                                        
                                                                        }
                                                                        
                                                                }


                                                        ?>
                                                        </td>
                                                </tr>
                                                
                                            </table>
                                            <div class='website'>
                                            <label for="website">Nếu bạn nhìn thấy trường này thì ĐỪNG nhập gì cả</label>
                                            <input type="text"name="url" id="url" value="0" size="20" maxlength="20"/>
                                            </div>
                                    </form>
                                        <div style="margin-left: 10px">
                                        <iframe style="float: left" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3725.255385848493!2d105.8433956!3d20.982397499999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac42feb23779%3A0x79dfc68b840e5dbc!2zNDMgS2ltIMSQ4buTbmcsIEdpw6FwIELDoXQsIEhvw6BuZyBNYWksIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1407413176943" width="600" height="450" frameborder="0" style="border:0"></iframe>
                                        <div style="text-align:left;  width: 240px;float:right;padding:20px">
                                            

                                            <?php if (isset($des2)) echo $des2; ?>

                                        </div>
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
							<a href="index.php">Trang Chủ</a>
						</li>
						<li>
							<a href="phongnghi.php#phantrang">Phòng Nghỉ</a>
						</li>
						<li>
							<a href="dichvu.php#phantrang">Dịch Vụ</a>
						</li>
						<li>
							<a href="tintuc.php#phantrang">Tin Tức</a>
						</li>
                        <li>
							<a href="thuvien.php#phantrang">Thư Viện</a>
						</li>
						<li>
							<a href="lienhe.php#phantrang">Liên Hệ</a>
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
