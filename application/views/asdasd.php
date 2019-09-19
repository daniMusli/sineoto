<form method="post" action="<?php echo base_url() ?>index.php/user/BuyTicket/">
    <input style="visibility: hidden;" id="movid" name="movid" value="<?php echo ($id_data);?>">
    <input style="visibility: hidden;" id="roomid" name="roomid" value="<?php echo ($room_data);?>">
    <div class="form-group">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <img class='rounded-circle' src='<?php echo (base_url($img_data));?>' alt='No Valid image' width='210' height='270'>
            </div>
            <div class="col-md-6">
                <h4><?php echo ($des_data)?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4><b>Yönetmen:</b>  <?php echo ($direc_data)?></h4>
                <h4><b>Süre:</b>  <?php echo ($time_data)?></h4>
                <h4><b>Yapım:</b>  <?php echo ($year_data)?></h4>

                <!--
                <h4><b>Seanslar</b></h4>
                -->
                <!--
                                                <?php
                for($h=0;$h<sizeof($shows_data);$h++){
                    echo "
                                                        <button type=\"button\" class=\"btn btn-link\" style=\"display:inline-block\">$shows_data[$h],</button>
                                                    ";
                }
                ?>
                                                -->
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <label>sinema Adı</label>
                <select id="cenid" name="cenid" class="form-control">
                    <?php
                    $query = $this->db->query("SELECT sinemalar.nam,zaman.date_type FROM gosterim 
                                                                                JOIN salon ON salon.id= gosterim.room
                                                                                JOIN zaman ON zaman.id=gosterim.date_time
                                                                                JOIN sinemalar ON sinemalar.id= salon.cinema_name
                                                                                WHERE gosterim.film=$id_data");
                    foreach ($query->result() as $row) {
                        $sel_name = $row->nam;
                        echo "<option value=$sel_name> $sel_name </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <label>Zaman</label>
                <select id="cenzmnid" name="cenzmnid" class="form-control">
                    <?php
                    $query = $this->db->query("SELECT sinemalar.nam,zaman.date_type FROM gosterim 
                                                                                JOIN salon ON salon.id= gosterim.room
                                                                                JOIN zaman ON zaman.id=gosterim.date_time
                                                                                JOIN sinemalar ON sinemalar.id= salon.cinema_name
                                                                                WHERE gosterim.film=$id_data");
                    foreach ($query->result() as $row) {

                        $sel_zaman = $row->date_type;
                        echo "<option value=$sel_zaman> $sel_zaman </option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label>Koltuk NO</label>
                <select id="kno" name="kno" class="form-control">
                    <option value=1> 1 </option>
                    <option value=2> 2 </option>
                    <option value=3> 3 </option>
                    <option value=4> 4 </option>
                    <option value=5> 5 </option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary btn-md" style="margin-top: 24px;">
        </div>
    </div>
</form>




















<?php
$queryy = $this->db->query("SELECT koltuk_no FROM sales
                                                                WHERE sales.gosterim_id=$msid
                                                                ORDER BY koltuk_no ASC");

foreach ($queryy->result() as $roww) {
    $check = $roww->koltuk_no;
}
echo " 
                            <script type='text/javascript'>
                                $('option[value=$check]').attr('disabled', 'disabled');
                                $('option[value=$check]').css('background-color', 'red');
                                 
                                function my_select(){
                                    var e = document.getElementById('cenid');
                                 
                                    if(e.selectedIndex>0) str_movname_sel= e.options[e.selectedIndex].value;
                                    else str_movname_sel='';
                                    var str_address = '<?php echo base_url();?>';
                            
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById('myreserve').innerHTML = this.responseText;
                                        }
                                    };
                                      xmlhttp.open('GET', '$basee.aj_canli_sorgu.php?q1='+str_movname_sel, true);
                                      xmlhttp.send();                            
                                }
                             
                            </script>
                            
                            ";
?>
