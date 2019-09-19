<?php
$tag =  $title;
$uName="Visiter";
$user_name=$this->session->userdata('username');
$user_family=$this->session->userdata('surname');
$user_id = $this->session->userdata('id');
if($user_id){
    if($user_id>0){
        $uName = $user_name.$user_family;
    }
}

///

if($tag=='take') {
    $id_data = $mid;
    $shows_data = $mshows;
    $shows_data_id=$mshowid;
    $room_data = $mroom;
    $msid = $mshowid;
    $mov_name=$mmname;
    $basee = base_url();
    $base = rtrim($basee, "/");
    $price=10;

///
///

}
?>


<!--
$sel_mo_id= gosterim.id

-->

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-6">
                <b></b><h2><?php echo ($mov_name);?> Filmi</h2>
            </div>

        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-2">
                    <label>sinema Adı</label>
                <form method="post" action="<?php echo base_url() ?>index.php/user/insertTicket/">
                    <select id="cenid" name="cenid" class="form-control" onchange="my_select3()" onclick="my_select3()" onkeyup="my_select3()">
                        <option value="0"></option>
                        <?php
                        $query = $this->db->query("SELECT sinemalar.nam,zaman.date_type, gosterim.id, gosterim.room FROM gosterim
                                                       JOIN salon ON salon.id= gosterim.room
                                                       JOIN zaman ON zaman.id=gosterim.date_time
                                                       JOIN sinemalar ON sinemalar.id= salon.cinema_name
                                                       WHERE gosterim.film=$id_data GROUP BY sinemalar.nam ");
                       // echo $query;
                        foreach ($query->result() as $rowp) {
                            $sel_name = $rowp->nam;
                            $sel_name_room=$rowp->room;
                            $sel_mo_id=$rowp->id;
                            echo "
                                    <option value=$sel_name_room>$sel_name</option>
                                ";
                        }
                        ?>

                    </select>
            </div>

            <div class="col-md-2">
                <label>Tarih</label>
                <div  id="myreserve3" class="carousel-reviews broun-block"></div>
                <div  id="txtHint3" class="carousel-reviews broun-block"></div>
            </div>

            <div class="col-md-2">
                    <label>Zaman</label>
                    <div  id="myreserve" class="carousel-reviews broun-block"></div>
                    <div  id="txtHint" class="carousel-reviews broun-block"></div>
            </div>

            <div class="col-md-2">
                    <label>Koltuk NO</label>
                    <div  id="myreserve2" class="carousel-reviews broun-block"></div>
                    <div  id="txtHint2" class="carousel-reviews broun-block"></div>
            </div>

            <div class="col-md-2">
                <label>Fiyat</label>
                <div  id="myreserve4" class="carousel-reviews broun-block"></div>
                <div  id="txtHint4" class="carousel-reviews broun-block"></div>

            </div>

            </form>
        </div>
        <div class="row">

            <div  id="myreservee" class="carousel-reviews broun-block"></div>
            <div  id="txtHintt" class="carousel-reviews broun-block"></div>

        </div>
    </section>
</div>


<script type='text/javascript'>

    function my_select3(){
        var ee3 = document.getElementById('cenid');
        var iD_data= "<?php echo ($id_data);?>";
        if(ee3.selectedIndex>0) str_movdate_sel= ee3.options[ee3.selectedIndex].value;
        else str_movdate_sel='';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('myreserve3').innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "<?php echo base_url('aj_canli_sorgu3.php?q6=');?>"+iD_data+"&d="+str_movdate_sel, true);
        xmlhttp.send();
    }

    function my_select(){
        var e = document.getElementById('datesel');

        if(e.selectedIndex>0) str_movname_sel= e.options[e.selectedIndex].value;
        else str_movname_sel='';
        var str_address = '<?php echo base_url();?>';

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('myreserve').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo base_url('aj_canli_sorgu.php?q1=');?>"+str_movname_sel+"&q2=+str_address+&q3=+<?php echo ($id_data);?>", true);
        xmlhttp.send();
    }

    //for koltuk NO ve doluluk meselesi.
    function my_select2(){
        var ee = document.getElementById('cenzmnid');
        var de=document.getElementById('cenid');

        if(ee.selectedIndex>0) str_movtime_sel= ee.options[ee.selectedIndex].value;
        else str_movtime_sel='';

        if(de.selectedIndex>0) de_room= de.options[de.selectedIndex].value;
        else de_room='';

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('myreserve2').innerHTML = this.responseText;
            }
        };
        //  alert("asd"+de_room);
        xmlhttp.open("GET", "<?php echo base_url('aj_canli_sorgu2.php?q4=');?>"+str_movtime_sel+"&q5="+de_room, true);
        xmlhttp.send();
    }

    function my_select5(){
        var wq = document.getElementById('cenzmnid');

        if(wq.selectedIndex>0) fiyat= wq.options[wq.selectedIndex].value;
        else fiyat='';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('myreserve4').innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "<?php echo base_url('aj_canli_sorgu4.php?qq=');?>"+fiyat, true);
        xmlhttp.send();

    }



    function my_selectt(){
        var e = document.getElementById('datesel');
        var ee3 = document.getElementById('cenid');
        var ee = document.getElementById('cenzmnid');
        var wwq = document.getElementById('knso');

        if(e.selectedIndex>0) str_movname_sel= e.options[e.selectedIndex].value;
        else str_movname_sel='';

        if(ee3.selectedIndex>0) str_movdate_sel= ee3.options[ee3.selectedIndex].value;
        else str_movdate_sel='';

        if(ee.selectedIndex>0) str_movtime_sel= ee.options[ee.selectedIndex].value;
        else str_movtime_sel='';



        if(wwq.selectedIndex>0) str_k_no= $('#knso').val();
        else str_k_no='';

        //alert(str_k_no);

        var str_address = '<?php echo base_url();?>';
        var str_id_data= '<?php echo ($id_data);?>';
        var str_sel_name_room= '<?php echo ($sel_name_room);?>';
        var iD_data= "<?php echo ($id_data);?>";
        var user= "<?php echo ($user_id);?>";

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('myreservee').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo base_url('aj_insert.php?q1=');?>"+user+"&q2="+str_address+"&d="+str_movdate_sel+"&q4="+str_movtime_sel+"&kno="+str_k_no, true);
        xmlhttp.send();
    }






</script>






