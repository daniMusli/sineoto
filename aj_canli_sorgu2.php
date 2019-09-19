<?php
    $k_no= $_REQUEST["q4"];
    $k_no_movid= $_REQUEST["q5"];

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,"zdbodev");
    $con->set_charset("utf8");



    $sql2="SELECT koltuk_no FROM sales
           JOIN gosterim ON gosterim.id=sales.gosterim_id
           WHERE sales.gosterim_id=".$k_no." AND gosterim.room=".$k_no_movid." ORDER BY koltuk_no ASC";

    //echo $sql2;
    $result2 = $con->query($sql2)OR DIE(mysqli_error());

    $numrow = mysqli_num_rows($result2);
    echo "
        
            <select id='knso' name='knso' class='form-control kNo' onchange='my_select5()' onclick='my_select5()' onselect='my_select5()' multiple>
               <option value=0 disabled></option>
                       
    ";
    $dbarr=array();
    $arr=array(1,2,3,4,5);
    while ($r = mysqli_fetch_array($result2)){
        $sNo = $r['koltuk_no'];
        $nsNo=explode(",",$sNo);
        $l=sizeof($nsNo);
        //$s=intval($nsNo);
        for($p=0;$p<$l;$p++)
            array_push($dbarr,$nsNo[$p]);
    }
        foreach ($arr as $ar){
            if(in_array($ar,$dbarr)){
                echo "
        <option value=$ar disabled style='background: red;'>$ar</option>
        ";
            }
            else{
                echo "
        <option value=$ar>$ar</option>
        ";
            }
    }


    echo " </select> ";
?>
<!--

--!>