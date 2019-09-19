<?php

$base_urll = $_REQUEST["q2"];//our base url.
$base_url= rtrim($base_urll,"/");
$userid=$_REQUEST['q1'];
$d_mov_room=$_REQUEST["d"];
$k_no= $_REQUEST["q4"];
$s_k_no=$_REQUEST["kno"];


$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,"zdbodev");
$con->set_charset("utf8");



echo "
    <br/><br/><br/>
    <div class='col-md-5'></div>
   
    <a href='$base_url/index.php/user/insertTicket/$userid/$k_no/$d_mov_room/$s_k_no' class='btn btn-primary btn-circle btn-xl center-block' style='width: 95px;height: 85px;padding: 10px 16px;font-size: 20px;line-height: 1.33;border-radius: 35px;' value='Bilet Al'>Satın Al</a>

";
?>


<!--
echo "user".$userid;
echo "<br/>";

echo "gosterim_id".$k_no;

echo "anas".$base_urll;
echo "<br/>";

echo "salon_id".$d_mov_room;

echo "<br/>";
echo "kno".$s_k_no;
-->
