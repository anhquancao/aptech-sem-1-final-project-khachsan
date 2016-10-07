<?php
include '../../config/connect.php';
$k='';
if(isset($_REQUEST['k']))
{
    $k=$_REQUEST['k'];
}
$trang="select  count(MaHT) from hotrott";
if($k!='')
    $trang.=" where TenHT like '%$k%' ";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =8;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
}
$query = "select * from hotrott where 1=1";
if($k!='')
    $query.=" and TenHT like '%$k%'";
        $query.= " order by MaHT desc limit $start,$sodong";
$result= mysqli_query($link, $query);
echo "<div style='height:410px;'><table width='800px' id='ds' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px;'>Tên người hỗ trợ</th>
        <th style='width: 90px'>Chức vụ</th>
        <th style='width: 130px'>Số điện thoại</th>
        <th style='width: 220px'>Yahoo  mail</th>
        <th style='width: 220px'>Skype name</th>
        <th style='width: 80px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td>{$r[1]}</td>
            <td>{$r[3]}</td>    
            <td>{$r[2]}</td>
            <td>{$r[4]}</td>
            <td>{$r[5]}</td>
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
                 <a href="#" onclick="hienthiht('<?php echo $k?>','<?php echo $trc?>')"> Trước </a>
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
                        <a href="#" onclick="hienthiht('<?php echo $k?>',<?php echo $i?>)"> <?php echo $i?> </a>
                        <?php    
                        }
                 }
                if($sau<=$sotrang)
                    {
                    ?>
                    <a href="#" onclick="hienthiht('<?php echo $k?>','<?php echo $sau?>')"> Sau </a>
                    <?php
                    }
            }
        echo"</div></div>";
}?></div>