

<?php


    $mov_price=$_REQUEST["qq"];




    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,"zdbodev");
    $con->set_charset("utf8");

    $sql4="SELECT gosterim.bilet_id,bilet.price FROM gosterim
           JOIN bilet ON bilet.id=gosterim.bilet_id
            WHERE gosterim.id=$mov_price";

   // echo $sql4;

    $result4 = $con->query($sql4)OR DIE(mysqli_error());
echo "
    <div id='dsa' name='dsa' onmousemove='my_selectt()'>
";
    while($rq = mysqli_fetch_array($result4)) {
        $sel_price = $rq['price'];
    }
        echo "
            <h3>$sel_price TL</h3>          
            ";
echo "</div>";







?>

