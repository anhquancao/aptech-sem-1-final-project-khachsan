<?php
include '../../config/connect.php';
$k='';
if(isset($_REQUEST['k']))
{
    $k=$_REQUEST['k'];
}
$trang="select  count(MaTT) from tintuc";
if($k!='')
 $trang.=" where 1=1 and TieuDe like '%$k%'";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =5;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
    
$query = "select * from tintuc where 1=1 ";
if ($k!='')
    $query.=" and tieude like '%$k%'";
        $query.= " order by MaTT desc limit $start,$sodong";

$result= mysqli_query($link, $query);
echo "<div style='height:410px;'><table id='ds' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px; width:200px'>Tiêu đề tin</th>
        <th style='width: 130px;'>Hình ảnh</th>
        <th style='width: 100px;'>Ngày đăng</th>
        <th>Mô tả</th>
        <th style='width: 120px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td style='text-align: justify; padding-left: 10px; padding-right: 10px'>{$r[1]}</td>
            <td><img src='../../images/tintuc/{$r[3]}' width='100px' height='67px'/></td>
            <td>".date('d/m/Y',strtotime($r[5]))."</td>
            <td style='text-align: left; padding-left: 10px; padding-right: 10px'>".substr($r[6],0,100)." ...</td>
            <td>
                <div class='btn'>
                <a href='view.php?id=$r[0]'><img title='Chi tiết' width='25px' height='25px' src='../css/images/view.jpg'></a>
                </div>
                <div class='btn'>
                <a href='edit.php?id=$r[0]'><img title='Sửa' width='25px' height='25px' src='../css/images/edit.jpg'></a>
                </div>
                <div class='btn'>
                <a onclick="."check('$r[0]','$r[3]')"." href='#'><img title='Xóa' width='25px' height='25px' src='../css/images/delete1.jpg'></a> 
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
<div style="height: 50px; ">
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
                 <a href="#" onclick="hienthitt('<?php echo $k?>','<?php echo $trc?>')"> Trước </a>
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
                        <a href="#" onclick="hienthitt('<?php echo $k?>',<?php echo $i?>)"> <?php echo $i?> </a>
                        <?php    
                        }
                 }
                if($sau<=$sotrang)
                    {
                    ?>
                    <a href="#" onclick="hienthitt('<?php echo $k?>','<?php echo $sau?>')"> Sau </a>
                    <?php
                    }
            }
        echo"</div></div>";
}?></div>