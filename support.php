<!DOCTYPE html ><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>	Hỗ trợ trực tuyến</title>
<a href="support.php"></a>

    
<style type="text/css">
        
        img
        {
            border:none;
        }
        a
        {
            color: #333;
            width:180px;
            text-decoration:none;
            font-size:12px;
        }
         a:hover
        {
            color: #007236;
            text-decoration:none;
        }
        #skypedetectionswf
        {
            display:none;
        }
        *
        {
            text-align: center;            
            font-family:Arial, Helvetica, sans-serif;
			font-size:14px;
        }
        td
        {
            padding:5px ;
            border: dotted 1px #cccc00;
        }
        #contain
        {
            width: 415px;
            background: #ffffcc ;
            margin: auto;
        }
        
    </style>
<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>

</div>
</head>
<body>
    <div id="contain">
    <?php
        include_once 'config/connect.php';
        $query="select * from hotrott";
        $result= mysqli_query($link, $query);
        
        
        ?>
    <a href="#">
                    <img src="images/logo.png" width="250">
     </a>
        <table cellspacing='0' >
        <?php
            while($r=  mysqli_fetch_array($result))
        {
            if ($r[3]=='Quản Lý')
            {
                echo " <tr> "
            . "<td rowspan='2'>Nhân Viên $r[3] </td>"
            . "<td>$r[1]</td>"
            . "<td><a href='ymsgr:sendim?$r[4]' mce_href='ymsgr:sendim?$r[4]' border='0'><img src='http://opi.yahoo.com/online?u=$r[4]&t=2' mce_src='http://opi.yahoo.com/online?u=$r[4]&t=2'></a></td>"
            . "</tr>"
            . "<tr>"
            . "<td id='sdt'>Tel: $r[2]</td>"
            . "<td><a href='Skype:$r[5]?chat'> <img src='http://mystatus.skype.com/bigclassic/$r[5]' title='ho tro' width='120' height='30' alt=''> </a> </td>"
            . "</tr>";
            }
            if ($r[3]=='Kỹ Thuật')
            {
                echo " <tr> "
            . "<td rowspan='2'>Nhân Viên $r[3] </td>"
            . "<td>$r[1]</td>"
            . "<td><a href='ymsgr:sendim?$r[4]' mce_href='ymsgr:sendim?$r[4]' border='0'><img src='http://opi.yahoo.com/online?u=$r[4]&t=2' mce_src='http://opi.yahoo.com/online?u=$r[4]&t=2'></a></td>"
            . "</tr>"
            . "<tr>"
            . "<td id='sdt'>Tel: $r[2]</td>"
            . "<td><a href='Skype:$r[5]?chat'> <img src='http://mystatus.skype.com/bigclassic/$r[5]' title='ho tro' width='120' height='30' alt=''> </a> </td>"
            . "</tr>";
            }
            if ($r[3]=='Dịch Vụ')
            {
                echo " <tr> "
            . "<td rowspan='2'>Nhân Viên $r[3] </td>"
            . "<td>$r[1]</td>"
            . "<td><a href='ymsgr:sendim?$r[4]' mce_href='ymsgr:sendim?$r[4]' border='0'><img src='http://opi.yahoo.com/online?u=$r[4]&t=2' mce_src='http://opi.yahoo.com/online?u=$r[4]&t=2'></a></td>"
            . "</tr>"
            . "<tr>"
            . "<td id='sdt'>Tel: $r[2]</td>"
            . "<td><a href='Skype:$r[5]?chat'> <img src='http://mystatus.skype.com/bigclassic/$r[5]' title='ho tro' width='120' height='30' alt=''> </a> </td>"
            . "</tr>";
            }
            if ($r[3]=='Tiếp Tân')
            {
                echo " <tr> "
            . "<td rowspan='2'>Nhân Viên $r[3] </td>"
            . "<td>$r[1]</td>"
            . "<td><a href='ymsgr:sendim?$r[4]' mce_href='ymsgr:sendim?$r[4]' border='0'><img src='http://opi.yahoo.com/online?u=$r[4]&t=2' mce_src='http://opi.yahoo.com/online?u=$r[4]&t=2'></a></td>"
            . "</tr>"
            . "<tr>"
            . "<td id='sdt'>Tel: $r[2]</td>"
            . "<td><a href='Skype:$r[5]?chat'> <img src='http://mystatus.skype.com/bigclassic/$r[5]' title='ho tro' width='120' height='30' alt=''> </a> </td>"
            . "</tr>";
            }
            
        }
        ?>
    </table>
    
    
    </div>
</body></html>