<?php
include '../../config/connect.php';
$k='';
if(isset($_REQUEST['k']))
{
    $k=$_REQUEST['k'];
}
$trang="select  count(MaLP) from loaiphong";
if($k!='')
    $trang.=" where TenLP like '%$k%'";
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
$query = "select * from loaiphong where 1=1";
if($k!='')
    $query.=" and TenLP like '%$k%'";
        $query.= " order by MaLP desc limit $start,$sodong";
$result= mysqli_query($link, $query);
echo "<div style='height:410px;'><table width='800px' id='ds' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px; width:150px'>Tên loại phòng</th>
        <th style='width: 130px;'>Hình ảnh</th>
        <th style='width: 120px;'>Đơn giá</th>
        <th style='width: 80px;'>Số lượng</th>
        <th>Thông tin</th>
        <th style='width: 120px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result)) //Voi moi dong trong danh sach
    {
        echo "<tr>
            <td>{$r[1]}</td>
            <td><img src='../../images/loaiphong/{$r[2]}' width='100px' height='67px'/></td>
            <td>".number_format($r[4])."</td>
            <td>";
            $soluong="select count(Map) from phong where MaLP= $r[0]";
            $soluong1=mysqli_query($link, $soluong);
            $soluong2=mysqli_fetch_array($soluong1);
            echo "<a href='../phong/phong.php?lp=$r[0]&k=''&p=1'>$soluong2[0]</a>";
        echo"</td>
            <td>".substr($r[3],0,200)."...</td>
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
echo "</table></div>";
 if(mysqli_num_rows($result)<1)
    {
     
    }
 


?>
<div style="height: 50px; width: 990px; ">
<?php
if(mysqli_num_rows($result)>=1)
{echo"<div class='pagging'>
        <div class='left'>Page $p of $sotrang</div>
        <div class='right'>";

                $trc=($p-1);
                $sau=($p+1);
            if($sotrang>1)
            {
             if($trc>=1)
                 {
                 ?>
                 <a href="#" onclick="hienthilp('<?php echo $k?>','<?php echo $trc?>')"> Trước </a>
                <?php
                 }
                 for($i=1; $i<=$sotrang; $i++)
                 {
                    if($i===$_REQUEST['p'])
                        {
                        echo "<b>$i</b> ";
                        }
                    else
                        {
                        ?>
                        <a href="#" onclick="hienthilp('<?php echo $k?>',<?php echo $i?>)"> <?php echo $i?> </a>
                        <?php    
                        }
                 }
                if($sau<=$sotrang)
                    {
                    ?>
                    <a href="#" onclick="hienthilp('<?php echo $k?>','<?php echo $sau?>')"> Sau </a>
                    <?php
                    }
            }
        echo"</div></div>";
}?></div>