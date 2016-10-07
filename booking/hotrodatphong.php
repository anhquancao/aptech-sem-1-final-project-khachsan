<!DOCTYPE html>
<?php
 //ket noi
        session_start();
        $link= mysqli_connect('localhost',"root","");
        mysqli_select_db($link, "ql_khach_san");
        
        $ngayden= $_REQUEST['ngayden'];// kieu d-m-Y
        $ngaydi= $_REQUEST['ngaydi'];// kieu d-m-Y
        $ngaydat= date('Y-m-d',time());
?>
<html>
<head runat="server">
    <script src="js/jquery-1.4.3.min.js" type="text/javascript"></script> 
</head>

<body>
    <form id="form1" runat="server">
        <div class="date_title">
                <h1> Mời chọn phòng: </h1>
        </div>
<?php      
        //select Loai Phong
        $q1= "select MaLP, TenLP, DonGia from loaiphong";
        $r1= mysqli_query($link, $q1);
?>
<div class="chonphong">
    <table style="border: solid 2px black; width: 650px;">
        
            <tr>
                <th style="padding: 8px 18px; border-bottom: solid 3px black; width: 140px; color:blue; font-size: 20px;"> Loại Phòng </th>
                <th style="padding-left: 25px; border-bottom: solid 3px black; width: 120px; color:blue; border-left:solid 3px black; border-right: solid 3px black; font-size: 20px;"> Giá(VNĐ)</th>
                <th style="text-align: left; border-bottom: solid 3px black; color:blue; padding-left: 80px; width: 360px; font-size: 20px;"> Số Phòng </th>
            </tr>
<?php
                if(mysqli_num_rows($r1)>0)
                {
                        while($a1= mysqli_fetch_array($r1))
                        {
                             $nden= date_create($_REQUEST['ngayden']);
                             $ndi= date_create($_REQUEST['ngaydi']);
?>    
                        
            <tr>
                <td class="td_value" style="text-indent: 13px; font-size: 18px; color: blue; border-bottom: 1px solid black; padding: 8px 0px;" > Loại <?php echo $a1[1] ?></td>
                <td class="td_value" style="border-left: solid 3px black; border-right: solid 3px black; font-size: 18px; font-weight: bold; color: crimson; border-bottom: 1px solid black;" ><?php echo number_format($a1[2]);?> </td>
<?php
                if($nden==$ndi)
                {
                        $ngaynhan= date_format($nden,'Y-m-d');// kieu Y-m-d
                        $q2= "select MaP from phong where MaP not in ( "
                             ."select MaP from dondatphongct as donct join dondatphong as dondp on donct.MaDDP=dondp.MaDDP where"
                             ."(NgayDen <= '".$ngaynhan."' and '".$ngaynhan."' <= NgayDi)) and Trangthai=0 and MaLP=".$a1[0];
                         $r2= mysqli_query($link, $q2);
                        if(mysqli_num_rows($r2)>0) 
                        {
?>    
                <td class="tdcbroom">
<?php
                        while ($a2 = mysqli_fetch_array($r2))
                        {
                                echo'<input type="checkbox" name="cbroom[]" value="'. $a2[0].'"/>'.$a2[0];
                        }
?>
                </td>
            </tr>
<?php
                        }
                        else
                        {
                                    echo '<td class="tdcbroom">'
                                            .'Loại '.$a1[1].' không còn phòng trống trong ngày quý khách đã chọn!'
                                        .'</td>';
                        }
                }
                else
                {
                                $q2= "select MaP from phong where MaP not in ( "
                                    ."select MaP from dondatphongct as donct join dondatphong as dondp on donct.MaDDP=dondp.MaDDP where";                    
                                $c=0;
                                
                                //$ngaytra= date_format($ndi, 'Y-m-d');// kieu Y-m-d
                                while($ndi > $nden)
                                {
                                    $ngaynhan= date_format($nden,'Y-m-d');// kieu Y-m-d
                                    if($c==0)
                                    {
                                        $q2.=" (NgayDen <= '".$ngaynhan."' and '".$ngaynhan."' <= NgayDi)";
                                        $nden= date_add($nden, date_interval_create_from_date_string("1 days"));
                                        $c+=1;
                                    }
                                    else 
                                    {
                                        $q2.=" or (NgayDen <= '".$ngaynhan."' and '".$ngaynhan."' <= NgayDi)";
                                        $nden= date_add($nden, date_interval_create_from_date_string("1 days"));
                                    }
                                }
                                if($nden==$ndi) 
                                {
                                    $q2.="or (NgayDen <= '".$ngaynhan."' and '".$ngaynhan."' <= NgayDi)) and Trangthai=0 and MaLP=".$a1[0];
                                }
                                $r2= mysqli_query($link, $q2);
                                if(mysqli_num_rows($r2)>0) 
                                {
?>
                                
                         <td class="tdcbroom">
<?php
                                    while ($a2 = mysqli_fetch_array($r2))
                                    {
                                        echo'<input type="checkbox" name="cbroom[]" id="cbroom" value="'. $a2[0].'"/>'.$a2[0];
                                    }
?>
                         </td>
                        </tr>
    <?php
                                }
                                else
                                {
                                    echo '<td class="tdcbroom">'
                                            .'Loại '.$a1[1].' không còn phòng trống trong ngày quý khách đã chọn!'
                                        .'</td>';
                                }
                }
                        }                   
                }
                $_SESSION['date_data']=array('ngayden'=>$ngayden, 'ngaydi'=>$ngaydi);//kieu m-d-Y
?>
                </table>
    <section class="btnbooking">
        <input class="nice_td_submit_01" type="submit" id="btnCheckin" name="btnCheckin" onclick="ktchonphong()"  value=" Gửi phòng"/>
    </section> 
    
</div>   
    </form>
</body>
</html>