

<?php

   // $date_movid= $_REQUEST["q6"];
    $d_mov_id=$_REQUEST["q6"];
    $d_mov_room=$_REQUEST["d"];
   // echo "anas".$d_mov_id;



    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,"zdbodev");
    $con->set_charset("utf8");

    $sql3="SELECT gosterim.date FROM gosterim
            JOIN salon ON salon.id= gosterim.room
            JOIN zaman ON zaman.id=gosterim.date_time
            JOIN sinemalar ON sinemalar.id= salon.cinema_name
            WHERE gosterim.film=".$d_mov_id ." AND gosterim.room=".$d_mov_room." GROUP BY gosterim.date";

    //echo $sql3;

    $result3 = $con->query($sql3)OR DIE(mysqli_error());


    echo "
        
            <select id='datesel' name='datesel' class='form-control kNo' onchange='my_select()' onclick='my_select()' onselect='my_select()'>
             <option value=0></option>
    ";


    while($roow = mysqli_fetch_array($result3)) {
        $sel_date = $roow['date'];
        echo "
                <option value=$sel_date> $sel_date </option>
            ";
    }
    echo " </select> ";


?>

