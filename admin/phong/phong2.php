<?php
include '../../config/connect.php';
$k="";
$lp="";
if(isset($_REQUEST['k']))
{
    $k=$_REQUEST['k'];
}
if(isset($_REQUEST['lp']))
{
    $lp=$_REQUEST['lp'];
}
/*if(isset($_REQUEST['lp'])){
    $lp=$_REQUEST['lp'];
    $trang="select  count(MaP) from phong where MaLP=$lp";
}  else {
    $trang="select  count(MaP) from phong";
}*/
$trang="select count(MaP) from phong where 1=1";
if ($lp!="")
    $trang.= " and MaLP = '$lp' ";
if ($k!="")
    $trang.= " and MaP like '%$k%'";
 $kq = mysqli_query($link, $trang) or die(mysqli_error($link));
 $t = mysqli_fetch_array($kq);
 $tong=$t[0];      
 $sodong =9;
 $sotrang=  ceil($tong/$sodong);
 $start=0;$p=1;
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
    $start=($p-1)*$sodong;
}
/*
if(isset($_REQUEST['lp'])){
$query = "select * from phong where MaLP=$lp order by MaP desc limit $start,$sodong";
$result= mysqli_query($link, $query);}  
else {
$query = "select * from phong where 1=1 order by MaP asc limit $start,$sodong";
$result= mysqli_query($link, $query);}*/
$query = "select * from phong where 1=1 ";
if ($lp!='')
    $query.=" and MaLP = '$lp'";
if ($k!='')
    $query.=" and MaP like '%$k%'";
        $query.= " order by MaP asc limit $start,$sodong";
    $result= mysqli_query($link, $query);
echo "<div style='height:410px;'><table width='680px' id='ds2' cellspacing='1px' class='tablemain'>
        <tr id='tr1'>
        <th style='border-top-left-radius: 10px;'>Tên phòng</th>
        <th>Loại phòng</th>
        <th>Trạng thái</th>
        <th style='width: 80px; border-top-right-radius: 10px'>Công cụ</th>
        </tr>";
if(mysqli_num_rows($result)>0)
{
    while($r= mysqli_fetch_array($result))
    {
        echo "<tr>
            <td>{$r[0]}</td>
            <td>{$r[3]}</td>
            <td>";if($r[2]==='0'){echo"<img title='Có thể sử dụng' src='../css/images/ok.jpg' width='25px' height='25px'/>";}  else {echo"<img title='Đang sửa' src='../css/images/cancel.jpg' width='25px' height='25px'/>";}; echo"</td>
            <td>
                    <div class='btn'>
                    <a href='edit.php?id=$r[0]'><img title='Sửa' width='25px' height='25px' src='../css/images/edit.jpg'></a>
                    </div>
                    <div class='btn'>";
            if(isset($_REQUEST['lp'])){
                    echo"<a onclick="."check('$r[0]','$lp')"." href='#'><img title='Xóa' width='25px' height='25px' src='../css/images/delete1.jpg'></a> 
                        </div> ";}  else {
                    echo"<a onclick="."check2('$r[0]')"." href='#'><img title='Xóa' width='25px' height='25px' src='../css/images/delete1.jpg'></a> 
                        </div>";
                                }
         echo"</td>
         </tr>";
    }
}
echo "</table></div>";
 if(mysqli_num_rows($result)<1)
    {
     
    }
 


?>
</div>
<div style="height: 50px;">
<?php
if(mysqli_num_rows($result)>=1)
{echo"<div class='pagging' style='width:670px;'>
        <div class='left'>Page $p of $sotrang</div>
        <div class='right'>";

                $trc=($p-1);
                $sau=($p+1);
            if($sotrang>1)
            {
             if($trc>=1)
                 {
                 ?>
                 <a href="#" onclick="hienthip('<?php echo $lp?>','<?php echo $k?>','<?php echo $trc?>')"> Trước </a>
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
                        <a href="#" onclick="hienthip('<?php echo $lp?>','<?php echo $k?>',<?php echo $i?>)"> <?php echo $i?> </a>
                        <?php    
                        }
                 }
                if($sau<=$sotrang)
                    {
                    ?>
                    <a href="#" onclick="hienthip('<?php echo $lp?>','<?php echo $k?>','<?php echo $sau?>')"> Sau </a>
                    <?php
                    }
            }
        echo"</div></div>";
}?></div>