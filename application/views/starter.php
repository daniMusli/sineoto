<?php
  $uName="Visiter";
  $user_name=$this->session->userdata('username');
  $user_family=$this->session->userdata('surname');
  $user_id = $this->session->userdata('id');
  if($user_id){
      if($user_id>0){
          $uName = $user_name.$user_family;
      }
  }

  $id = $this->session->userdata('id');
  $query = $this->db->query("SELECT * FROM `user` WHERE id=$id");
  foreach ($query->result() as $row) {
      $u_id=$row->id;
      $type_id = $row->type_id;

  }
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar -align-right" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
              <a href = "<?php echo base_url() ?>index.php/pf/index">
              </a>
            </div>

            <div class="pull-left info">
              <br>
                <p> <?php echo $user_name; ?>  </p>

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
            <li class="header" style="font-size:26px"></li>
            <!-- Optionally, you can add icons to the links -->
            <?php if ($type_id === '0'): ?>
            <li class="treeview">
                <a href="#"><i class="fa fa-plus-square"></i> <span>Movies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>index.php/user/Taketicket" >Take an ticket</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- if Admin is loggin So he could be setup ticket times vs -->
            <?php if ($type_id === '1'): ?>
                <li class="treeview">
                    <a href=""><i class="fa fa-plus-square"></i> <span>Setup</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url() ?>index.php/user/Admin/addMov">Add new movie</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/user/Admin/addscreen">Add new movie screening</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/user/Admin/addcenima">Add new Cenima</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/user/Admin/updateallmovies">Update a Movie</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/user/Admin/updateallmoviesscrens">Update a Movie Screen</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="treeview">
                <a href="#"><i class="fa fa-plus-square"></i> <span>profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>index.php/user/edit/<?php echo $this->session->userdata('id');?>/<?php echo $this->session->userdata('type_id');?>/ediit" >Edit My Profile</a></li>
                    <li><a href="#">View my all tickets</a></li>

                </ul>
            </li>





            <li class="treeview">
                <a href="#">
                <i class="fa fa-share"></i> <span>Security</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Password Setting
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url() ?>index.php/user/edit/<?php echo $this->session->userdata('id');?>/<?php echo $this->session->userdata('type_id');?>/changemypassword"><i class="fa fa-circle-o"></i> Change your password</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-plus-square"></i> <span >Help</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">How to ?</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </li>

        </ul>
    <!-- /.sidebar-menu -->
    </section>
<!-- /.sidebar -->
</aside>
