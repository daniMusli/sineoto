<?php
    // get the q parameter from URL

    $mov_date =  $_REQUEST["q1"];//name
    $room_id=$_REQUEST["q3"];

    $base_urll = $_REQUEST["q2"];//our base url.
    $base_url= rtrim($base_urll,"/");

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,"zdbodev");
    $con->set_charset("utf8");

    $sql="SELECT sinemalar.nam,zaman.date_type,gosterim.bilet_id, gosterim.room, gosterim.id FROM gosterim
            JOIN salon ON salon.id= gosterim.room
            JOIN zaman ON zaman.id=gosterim.date_time
            JOIN sinemalar ON sinemalar.id= salon.cinema_name
            WHERE gosterim.film=".$room_id." AND gosterim.date="."'$mov_date'";

    $result = $con->query($sql)OR DIE(mysqli_error());

 //  echo $sql;



    echo "
        
        <select id='cenzmnid' name='cenzmnid' class='form-control' onchange='my_select2()' onclick='my_select2()' onselect='my_select2()'>

            <option value=0></option>
            
                  
    ";
    while($row = mysqli_fetch_array($result)) {
        $sel_zaman = $row['date_type'];
        $sel_zaman_id = $row['id'];

        echo "
            <option value=$sel_zaman_id>$sel_zaman </option>
        ";

    }
    echo "  </select> ";






?>


