<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">

                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            </div>

            <div class="pull-left info">
                <p> <?php echo $user_name; ?>  </p>
                <a href="#">Add Profile Photo</a>

            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->


              <li class="treeview">
              <a href="#"><i class="fa fa-plus-square"></i> <span>Appointment</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Make an appointment</a></li>
                <li><a href="#">View my appointments</a></li>
                <li><a href="#">Cancel appointment</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#"><i class="fa fa-phone"></i> <span>Verification Benifites</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">by whatsaap</a></li>
                <li><a href="#">by telegram</a></li>
                <li><a href="#">by viper</a></li>
              </ul>
            </li>

        </ul>
    <!-- /.sidebar-menu -->
    </section>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="container">
            <div class="row">
                <div class="col-md-10 ">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('user/update_profile'); ?>">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>User profile</legend>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Userame">Username</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                            <i class="fa fa-user"> </i>
                                       </div>
                                        <?php echo $user_name;?>
                                       <input id="Username" name="Userame" value='<?= $user_name; ?>' type="text" placeholder="Username" class="form-control input-md" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Name">Name</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                            <i class="fa fa-user">  </i>
                                       </div>
                                       <input id="Name" name="Name" value=" <?php echo $this->session->userdata('name'); ?>" type="text" placeholder="Name" class="form-control input-md">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="Surname">Surname</label>
                              <div class="col-md-6">
                             <div class="input-group">
                                   <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                   </div>
                                   <input id="Surname" name="Surname" value=" <?php echo $this->session->userdata('surname'); ?>" type="text" placeholder="Surname" class="form-control input-md">

                                  </div>
                              </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Userame">User ID</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key">
                                            </i>
                                        </div>
                                        <input id="User ID" name="User ID" value=" <?php echo $this->session->userdata('User_ID'); ?>" type="text" placeholder="User ID" class="form-control input-md">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Email Address">Email Address</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>

                                        </div>
                                        <input id="Email Address" name="Email Address" value=" <?php echo $this->session->userdata('mail'); ?>" type="email" placeholder="Email Address" class="form-control input-md">

                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Phone number">Phone</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone">
                                            </i>
                                        </div>
                                        <input id="Phone" name="Phone" value=" <?php echo $this->session->userdata('phone'); ?>" type="text" placeholder="Phone" class="form-control input-md">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label col-xs-12" for="Permanent Address">Address</label>
                                    <div class="col-md-2  col-xs-4">
                                        Country:
                                        <select id="country" name="country" class="form-control"></select>
                                    </div>

                                    <div class="col-md-2 col-xs-4">
                                        State:
                                        <select name="state" id="state" class="form-control"></select>
                                        <br>
                                    </div>

                                    <div class="col-md-3 col-xs-4">
                                        Full Address:
                                        <input id="adress" name="adress"  value="" type="text" placeholder="Your Full Adress" class="form-control">
                                    </div>

                            </div>







<!--


<div class="form-group">
<label class="col-md-4 control-label col-xs-12" for="Temporary Address">Temporary Address</label>
<div class="col-md-2  col-xs-4">
<input id="Temporary Address" name="Temporary Address" type="text" placeholder="District" class="form-control input-md ">
</div>

<div class="col-md-2 col-xs-4">

<input id="Temporary Address" name="Temporary Address" type="text" placeholder="Area" class="form-control input-md ">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="Temporary Address"></label>
<div class="col-md-2  col-xs-4">
<input id="Temporary Address" name="Temporary Address" type="text" placeholder="Street" class="form-control input-md ">
</div>

</div>

-->

                            <div class="row">
                                <div class="col-sm-offset-5 col-sm-2 text-center">
                                    <div class="btn-group" data-toggle="buttons">
                                        <input class="btn btn-lg btn-success " type="submit" value="Update" name="update_profile" >
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                    <fieldset>
                        <legend>Ödeme Bilgileri Ekle</legend>
                        <h3> NOT: Hocam burası henüz hazır değildir...</h3>
                        <!-- Main content -->
                        <section class="content">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Select2</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Minimal</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Disabled Result</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option disabled="disabled">California (disabled)</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </section>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
