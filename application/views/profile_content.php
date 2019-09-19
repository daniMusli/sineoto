

<?php
$tag =  $title;



$type_id = $this->session->userdata('type_id');
$uName="Visiter";
$user_name=$this->session->userdata('username');
$user_family=$this->session->userdata('surname');
$user_id = $this->session->userdata('id');
if($user_id){
    if($user_id>0){
        $uName = $user_name.$user_family;
    }
}


// get info from db and put them in fileds...
$id = $this->session->userdata('id');
$query = $this->db->query("SELECT * FROM `user` WHERE id=$id");

foreach ($query->result() as $row) {
    $user_name = $row->name;
    $user_surname = $row->surname;
    $user_username = $row->username;
    $user_pass = $row->password;
    $type_id = $row->type_id;
    $temp_img='uploads/temp.jpg';
}

?>
<!-- ana sayfa için tüm filimlerin listesi -->
<?php
    if($type_id==0 and $tag=='taketicket'){
    $name_data=$mname;
    $img_data=$mimg;
    $id_data=$mid;

}

?>

<!-- ana sayfa için. bir filim seçilirse onun profiline gitmek için -->
<?php
if($type_id==0 and $tag=='moviedashboard') {
    $name_data = $mname;
    $img_data = $mimg;
    $id_data = $mid;
    $des_data = $mdes;
    $direc_data = $mdirec;
    $time_data = $mtime;
    $year_data = $myear;
    $shows_data = $mshows;
    $room_data = $mroom;
    $msid = $mshowid;

    $basee = base_url();
    $base = rtrim($basee, "/");
}






?>




<!-- this script for show uploaded image directly... -->
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    function readURL(input) {
        javascript:document.getElementById('imgg').style.display = 'inline';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.imgg')
                    .attr('src', e.target.result)

            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>
<script type="text/javascript">
    function showHide(elm) {
        javascript:document.getElementById('code_confirim').style.display = 'block';
    }

</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <!-- allow for type_id == 0 and 1  -->
                        <?php if (($tag === 'changemypassword')): ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/change_password/<?php echo $user_id;?>">
                                <fieldset class="form-horizontal">
                                    <legend>Change Your password</legend>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Password">Old-Password</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-unlock-alt"> </i>
                                                </div>
                                                <input id="oldPass" name="oldPass" value="" type="text" placeholder="Enter Your Old password" class="form-control input-md">
                                            </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Password2">New-Password</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                                <input id="password" name="password" value="" type="password" placeholder="Enter Your New password" class="form-control input-md">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Password3">Reply new-Password</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                                <input id="password2" name="password2" value="" type="password" onkeyup="checkPass(); return false;" placeholder="Reply Your New password" class="form-control input-md">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-push-4  col-xs-4" >
                                        <input type="submit" value="change my password" style="text-align: center;" class="btn btn-default"></input>
                                    </div>
                                </fieldset>
                            </form>

                            <!--user type_id = 1 'admin', and clik on edit -->
                        <?php elseif ($tag === 'ediit' and $type_id === '1'): ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="row">
                                            <!-- above our reayly form -->
                                            <fieldset class="form-horizontal">
                                                <?php echo form_open_multipart('user/do_update');?>
                                                <legend>Admin profile</legend>
                                                <!-- Text input-->
                                                <div class="col-md-3 col-xs-12">

                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Userame">Username</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user"> </i>
                                                                </div>
                                                                <input id="username" name="userame" value='<?= $user_username; ?>' type="text" placeholder="Username" class="form-control input-md" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Name">Name</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">  </i>
                                                                </div>
                                                                <input id="name" name="name" value="<?= $user_name; ?>" type="text" placeholder="Name" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Surname">Surname</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">
                                                                    </i>
                                                                </div>
                                                                <input id="surname" name="surname" value="<?=$user_surname; ?>" type="text" placeholder="Surname" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3  col-xs-4">
                                                        <input class="btn btn-lg  btn-primary " type="submit" value="Update" />
                                                    </div>
                                                    <div class="col-md-3 col-xs-4">
                                                        <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/pf/index"> Cancel </a>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>


                            <!--user type_id = 2 , and clik on edit -->
                        <?php elseif ($tag === 'ediit' and $type_id === '0'): ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="row">
                                            <!-- above our reayly form -->
                                            <fieldset class="form-horizontal">
                                                <?php echo form_open_multipart('user/do_update');?>
                                                <legend>User profile</legend>
                                                <!-- Text input-->
                                                <div class="col-md-3 col-xs-12">

                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Userame">Username</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user"> </i>
                                                                </div>
                                                                <input id="username" name="userame" value='<?= $user_username; ?>' type="text" placeholder="Username" class="form-control input-md" readonly>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Name">Name</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">  </i>
                                                                </div>
                                                                <input id="name" name="name" value="<?= $user_name; ?>" type="text" placeholder="Name" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Surname">Surname</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">
                                                                    </i>
                                                                </div>
                                                                <input id="surname" name="surname" value="<?=$user_surname; ?>" type="text" placeholder="Surname" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3  col-xs-4">
                                                        <input class="btn btn-lg  btn-primary " type="submit" value="Update" />
                                                    </div>
                                                    <div class="col-md-3 col-xs-4">
                                                        <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/pf/index"> Cancel </a>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>



                                 <!-- admin and add movie is clicked -->
                        <?php elseif ($tag === 'addMov' and $type_id === '1'): ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="row">
                                            <!-- above our reayly form -->
                                            <fieldset class="form-horizontal">
                                                <?php echo form_open_multipart('user/do_upload');?>
                                                <legend>Adding New Movie</legend>
                                                <!-- Text input-->
                                                <div class="col-md-3 col-xs-12">
                                                    <div class="user-panel">
                                                        <div class="pull-left image col-md-0">
                                                            <img src="<?php echo base_url($temp_img);?>" onclick="javascript:document.getElementById('image').click();" class="imgg" id="imgg"  alt="User Image" style="max-width: 175px;">
                                                        </div>
                                                        <div class="pull-left image col-md-10 col-xs-10 ">
                                                            <input type = "button" value = "Choose image" id="imgupload" class="btn btn-box-tool"
                                                                   onclick ="javascript:document.getElementById('image').click();" >
                                                            <input type = "button" value = "remove" id="remove" class="btn btn-box-tool"
                                                                   onclick ="javascript:document.getElementById('removeimage').click();">
                                                            <input id = "removeimage" onclick="javascript:document.getElementById('imgg').style.display = 'none'";  class="righti" type="button" style='visibility: hidden;' />
                                                            <input id = "image" onchange="readURL(this);" name="userfile" class="right" type="file" style='visibility: hidden;'  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-xs-12">

                                                </div>
                                                <!-- Success message -->
                                                <div class="alert alert-success" role="alert" id="success_message" style="display: none;">Success
                                                    <i class="glyphicon glyphicon-thumbs-up"></i> Thank you</div>

                                                <div class="col-md-9">




                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Name">Name</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">  </i>
                                                                </div>
                                                                <input id="name" name="name" value="" type="text" placeholder="Name" class="form-control input-md" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Year">Year</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">
                                                                    </i>
                                                                </div>
                                                                <input id="year" name="year" value="" type="text" placeholder="year" class="form-control input-md" required>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Actor">Actor</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-lock">
                                                                    </i>
                                                                </div>
                                                                <input id="actor" name="actor" value="" type="text" placeholder="actor" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Actres">Actres</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-lock">
                                                                    </i>
                                                                </div>
                                                                <input id="actres" name="actres" value="" type="text" placeholder="Actres" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Director">Director</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">
                                                                    </i>
                                                                </div>
                                                                <input type="text" id="director" name="director" placeholder="Director" value="" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Language">Language</label>
                                                        <div class="col-md-7">

                                                            <select id="lang" name="lang" class="form-control">
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('diller');
                                                                $query=$this->db->get();

                                                                foreach ($query->result_array() as $row){
                                                                    $item =  $row['namee'];
                                                                    echo "<option value=$item> $item </option>";
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Time">Time</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-phone">
                                                                    </i>
                                                                </div>
                                                                <input id="time" name="time" value="" type="text" placeholder="Time" class="timepicker form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>






                                                    <label class="col-md-3 control-label col-xs-12"></label>
                                                    <div class="col-md-3  col-xs-4">
                                                        <input class="btn btn-lg  btn-primary " type="submit" value="Add" />
                                                    </div>
                                                    <div class="col-md-3 col-xs-4">
                                                        <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/pf/index"> Cancel </a>
                                                    </div>
                                                </div>
                                                </form>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($tag === 'addscreen' and $type_id === '1'): ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/AddScreen/">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <div class="row">
                                                <div class="form-horizontal">
                                                    <legend>Adding New Movie Screeing</legend>

                                                    <div class="col-md-3 col-xs-12">

                                                    </div>
                                                    <!-- Success message -->
                                                    <div class="alert alert-success" role="alert" id="success_message" style="display: none;">Success
                                                        <i class="glyphicon glyphicon-thumbs-up"></i> Thank you</div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Movie Name">Movie Name</label>
                                                            <div class="col-md-7">

                                                                <select id="moviename" name="moviename" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('filimler');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['name'];
                                                                        $item_id =  $row['id'];
                                                                        echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Room">Room</label>
                                                            <div class="col-md-7">
                                                                <select id="room" name="room" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('sinemalar');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['nam'];
                                                                        $item_id=$row['id'];
                                                                        echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Actor">Date</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-lock">
                                                                        </i>
                                                                    </div>
                                                                    <input id="moviedate" name="moviedate" value="" type="date"  class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Date Type">Date Type</label>
                                                            <div class="col-md-7">

                                                                <select id="datetype" name="datetype" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('zaman');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['date_type'];
                                                                        $item_id=$row['id'];
                                                                        echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <label class="col-md-3 control-label col-xs-12"></label>
                                                        <div class="col-md-3  col-xs-4">
                                                            <input class="btn btn-lg  btn-primary " type="submit" value="Add" />
                                                        </div>
                                                        <div class="col-md-3 col-xs-4">
                                                            <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/pf/index"> Cancel </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>




                        <?php elseif ($tag === 'addcenima' and $type_id === '1'): ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/AddCenima/">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <div class="row">
                                                <div class="form-horizontal">
                                                    <legend>Adding New Ceiema information</legend>

                                                    <div class="col-md-3 col-xs-12">

                                                    </div>
                                                    <!-- Success message -->
                                                    <div class="alert alert-success" role="alert" id="success_message" style="display: none;">Success
                                                        <i class="glyphicon glyphicon-thumbs-up"></i> Thank you</div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Cenima Name">Cenima Name</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user">
                                                                        </i>
                                                                    </div>
                                                                    <input id="cenimaname" name="cenimaname" type="text" placeholder="Cenima Name" class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Location">Location</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user">
                                                                        </i>
                                                                    </div>
                                                                    <input id="location" name="location"  type="text" placeholder="Movie Room" class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Room Number">Room Number</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-lock">
                                                                        </i>
                                                                    </div>
                                                                    <input id="roomnumber" name="roomnumber" value="" type="text" placeholder="Room Number" class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label class="col-md-3 control-label col-xs-12"></label>
                                                        <div class="col-md-3  col-xs-4">
                                                            <input class="btn btn-lg  btn-primary " type="submit" value="Add" />
                                                        </div>
                                                        <div class="col-md-3 col-xs-4">
                                                            <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/pf/index"> Cancel </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>



                        <?php elseif ($tag === 'updateallmovies' and $type_id === '1'): ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <div class="row">
                                                <div class="form-horizontal">
                                                    <legend>Update Movie </legend>

                                                    <div class="row">
                                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('filimler');
                                                        $query=$this->db->get();
                                                        $basee=base_url();
                                                        $base= rtrim($basee,"/");

                                                        foreach ($query->result_array() as $row){
                                                            $mov_id=$row['id'];
                                                            $name_data =  $row['name'];
                                                            $img_data=$row['image'];

                                                            echo "
                                                            <div class=\"col-md-3\">
                                                                <div class=\"input-group\">
                                                                     <img class='rounded-circle' src='$base/$img_data' alt='No Valid image' width='150' height='215'>
                                                                      <p>$name_data</p>
                                                                       <p><a class='btn btn-secondary' href='$base/index.php/user/UpdateCenima/$mov_id' role='button'>Update &raquo;</a></p>
                                                                </div>
                                                            </div>
                                                         ";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php elseif ($tag === 'updateallmoviesscrens' and $type_id === '1'): ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="row">
                                            <div class="form-horizontal">
                                                <legend>Update Movie Screen </legend>
                                                <div class="row">
                                                    <?php
                                                    $query = $this->db->query("SELECT gosterim.id, filimler.name,sinemalar.nam, filimler.image, gosterim.date, zaman.date_type
                                                                              FROM gosterim 
                                                                              JOIN filimler ON filimler.id=gosterim.film
                                                                              JOIN salon ON salon.id=gosterim.room
                                                                              JOIN sinemalar ON sinemalar.id=salon.cinema_name
                                                                              JOIN zaman ON zaman.id=gosterim.date_time
                                                                              JOIN diller ON diller.id=filimler.lang
                                                                              WHERE 1");
                                                    $basee=base_url();
                                                    $base= rtrim($basee,"/");

                                                    foreach ($query->result_array() as $row){
                                                        $mov_id=$row['id'];
                                                        $name_data =  $row['name'];
                                                        $img_data=$row['image'];
                                                        $date_data=$row['date'];
                                                        $room_data=$row['nam'];
                                                        $room_date_time=$row['date_type'];

                                                        echo "
                                                            <div class=\"col-md-3\">
                                                                <div class=\"input-group\">
                                                                     <img class='rounded-circle' src='$base/$img_data' alt='No Valid image' width='150' height='215'>
                                                                      <p>$name_data</p>
                                                                      <p>$date_data</p>
                                                                      <p>$room_data $room_date_time</p>
                                                                     
                                                                       <p><a class='btn btn-secondary' href='$base/index.php/user/UpdateCenimaScreen/$mov_id' role='button'>Update &raquo;</a></p>
                                                                </div>
                                                            </div>
                                                         ";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php elseif ($tag === 'updatemovie' and $type_id === '1'): ?>
                            <?php
                            $movie_idd=$mid;
                            $movie_name=$mname;
                            $movie_year=$myear;
                            $movie_img=$mimg;
                            $movie_time=$mtime;
                            $movie_lan=$mlan;
                            $movie_des=$mdes;


                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="row">
                                            <!-- above our reayly form -->
                                            <fieldset class="form-horizontal">
                                                <?php echo form_open_multipart('user/do_upload');?>
                                                <legend>Update <?php echo ($movie_name);?> Movie</legend>
                                                <!-- Text input-->
                                                <div class="col-md-3 col-xs-12">
                                                    <div class="user-panel">
                                                        <div class="pull-left image col-md-0">
                                                            <img src="<?php echo base_url($temp_img);?>" onclick="javascript:document.getElementById('image').click();" class="imgg" id="imgg"  alt="User Image" style="max-width: 175px;">
                                                        </div>
                                                        <div class="pull-left image col-md-10 col-xs-10 ">
                                                            <input type = "button" value = "Choose image" id="imgupload" class="btn btn-box-tool"
                                                                   onclick ="javascript:document.getElementById('image').click();" >
                                                            <input type = "button" value = "remove" id="remove" class="btn btn-box-tool"
                                                                   onclick ="javascript:document.getElementById('removeimage').click();">
                                                            <input id = "removeimage" onclick="javascript:document.getElementById('imgg').style.display = 'none'";  class="righti" type="button" style='visibility: hidden;' />
                                                            <input id = "image" onchange="readURL(this);" name="userfile" class="right" type="file" style='visibility: hidden;'  />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12"></div>

                                                <div class="col-md-9">

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Name">Name</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">  </i>
                                                                </div>
                                                                <input id="name" name="name" value="<?php echo ($movie_name);?>" type="text" placeholder="Name" class="form-control input-md" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Year">Year</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user">
                                                                    </i>
                                                                </div>
                                                                <input id="year" name="year" value="<?php echo ($movie_year);?>" type="text" placeholder="year" class="form-control input-md" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Language">Language</label>
                                                        <div class="col-md-7">

                                                            <select id="lang" name="lang" class="form-control">
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('diller');
                                                                $query=$this->db->get();

                                                                foreach ($query->result_array() as $row){
                                                                    $item =  $row['namee'];
                                                                    if($item==$movie_lan)
                                                                        echo "<option value=$item selected> $item </option>";
                                                                    else
                                                                        echo "<option value=$item> $item </option>";
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="Time">Time</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-phone">
                                                                    </i>
                                                                </div>
                                                                <input id="time" name="time" value="<?php echo ($movie_time);?>" type="text" placeholder="Time" class="timepicker form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label class="col-md-3 control-label col-xs-12"></label>
                                                    <div class="col-md-3  col-xs-4">
                                                        <input class="btn btn-lg  btn-primary " type="submit" value="Update" />
                                                    </div>
                                                    <div class="col-md-3 col-xs-4">
                                                        <a class="btn btn-lg  btn-primary" href="<?php echo base_url()?>index.php/user/DeleteMovie/<?php echo ($movie_idd);?>" onclick="return Confirim();"> Delete </a>
                                                    </div>
                                                </div>
                                                </form>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">
                                function Confirim() {
                                    return confirm('Are you sure That you want to Delete this movie!');
                                }
                            </script>

                        <?php elseif ($tag === 'updatemoviescreen' and $type_id === '1'): ?>
                        <?php

                            $movie_idd=$mid;
                            $movie_fid=$mfid;
                            $movie_name=$mname;
                            $movie_dateType=$mdtype;
                            $movie_roomName=$mroomname;
                            $movie_date=$mdate;
                        ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/UpdateScreen/">
                                <input id="gosterid" name="gosterid" style="visibility: hidden;" value="<?php echo ($movie_idd);?>">
                                <input id="filmid" name="filmid" style="visibility: hidden;" value="<?php echo ($movie_fid);?>">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <div class="row">
                                                <div class="form-horizontal">
                                                    <legend>Updating Movie Screeing</legend>

                                                    <div class="col-md-3 col-xs-12">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Movie Name">Movie Name</label>
                                                            <div class="col-md-7">

                                                                <select id="moviename" name="moviename" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('filimler');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['name'];
                                                                        $item_id =  $row['id'];
                                                                        if($item==$movie_name)
                                                                            echo "<option value=$item_id selected> $item </option>";
                                                                        else
                                                                            echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Room">Room</label>
                                                            <div class="col-md-7">
                                                                <select id="room" name="room" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('sinemalar');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['nam'];
                                                                        $item_id=$row['id'];
                                                                        if($movie_roomName==$item)
                                                                            echo "<option value=$item_id selected> $item </option>";
                                                                        else
                                                                            echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Actor">Date</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-lock">
                                                                        </i>
                                                                    </div>
                                                                    <input id="moviedate" name="moviedate" value="<?php echo($movie_date);?>" type="date"  class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="Date Type">Date Type</label>
                                                            <div class="col-md-7">

                                                                <select id="datetype" name="datetype" class="form-control">
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('zaman');
                                                                    $query=$this->db->get();

                                                                    foreach ($query->result_array() as $row){
                                                                        $item =  $row['date_type'];
                                                                        $item_id=$row['id'];
                                                                        if($movie_dateType==$item)
                                                                            echo "<option value=$item_id selected> $item </option>";
                                                                        else
                                                                            echo "<option value=$item_id> $item </option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <label class="col-md-3 control-label col-xs-12"></label>
                                                        <div class="col-md-3  col-xs-4">
                                                            <input class="btn btn-lg  btn-primary " type="submit" value="Update" />
                                                        </div>
                                                        <div class="col-md-3 col-xs-4">
                                                            <a class="btn btn-lg  btn-primary" href="<?php echo base_url() ?>index.php/user/DeleteScreen/<?php echo ($movie_idd);?>"> Delete </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>





                        <?php elseif ($tag === 'taketicket' and $type_id === '0'): ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/PaintTicket/">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Date">Date</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </div>
                                            <input id="movdate" name="movdate"  type="date" class="form-control input-md" required>
                                            <input type="hidden" id="usercode" name="usercode" value="<?php echo ($user_id);?>">
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-md  btn-primary" type="submit" value="Check" />
                                <br/><br/><br/>
                            </form>
                            <div class="row">
                            <?php
                            $basee=base_url();
                            $base= rtrim($basee,"/");

                            for($h=0;$h<sizeof($name_data);$h++) {
                                echo "      
                                                            
                                    <div class=\"col-md-4\">
                                        <div class=\"input-group\">
                                             <img class='rounded-circle' src='$base/$img_data[$h]' alt='No Valid image' width='150' height='215'>
                                              <p>$name_data[$h]</p>
                                               <p><a class='btn btn-secondary' href='$base/index.php/user/MovieDashboard/$id_data[$h]' role='button' onclick=' return Confirim();'>Take Ticket &raquo;</a></p>
                                        </div>
                                    </div>
                                
                                    
                                ";
                            }
                            ?>
                            </div>


                        <?php elseif ($tag === 'moviedashboard' and $type_id === '0'): ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/user/BuyTicketYedek/">
                                <input style="visibility: hidden;" id="movid" name="movid" value="<?php echo ($msid);?>">
                                <input style="visibility: hidden;" id="roomid" name="roomid" value="<?php echo ($room_data);?>">
                                <input style="visibility: hidden;" id="enes" name="enes" value="<?php echo ($id_data);?>">
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
                                        <div class="col-md-3">
                                            <br>

                                        </div>
                                        <div class="col-md-6">
                                            <h4><b> Yönetmen: <?php echo ($direc_data);?> </b></h4>
                                            <h4><b> Süre: <?php echo ($time_data);?>  </b>Dakika</h4>
                                            <h4><b> Yapım: <?php echo ($year_data);?> </b></h4>

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

                                            <br/><br/><br/><br/><br/><br/><br/>
                                            <center>
                                                <input type="submit" class="btn btn-primary btn-circle btn-xl center-block" style="width: 95px;height: 85px;padding: 10px 16px;font-size: 20px;line-height: 1.33;border-radius: 35px;" value="Bilet Al">  </input>
                                            </center>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>



