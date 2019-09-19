<?php
$id = $this->session->userdata('id');
$query = $this->db->query("SELECT * FROM `user` WHERE id=$id");

foreach ($query->result() as $row)
{
        $user_name = $row->name;
        $user_surname = $row->surname;
        $type_id = $row->type_id;
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atauni</title>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src='<?php echo base_url();?>adminassets/js/moment.min.js'></script>




    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('profile/dist/css/bootstrap.min.css');?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css');?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('profile/bower_components/Ionicons/css/ionicons.min.css');?>">



    <link href="<?php echo base_url();?>adminassets/css/bootstrapValidator.min.css" rel="stylesheet" />


    <script src="<?php echo base_url();?>adminassets/js/bootstrapValidator.min.js"></script>


    <!-- password Validator -->



    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('profile/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo base_url('profile/dist/css/skins/skin-blue.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('profile/dist/css/skins/skin-green-light.css');?>">




    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<?php if ($type_id === '1') : ?>
    <body class="hold-transition skin-blue sidebar-mini">
<?php elseif ($type_id === '0') : ?>
    <body class="hold-transition skin-blue sidebar-mini" >
<?php endif; ?>


<!--    <body class="hold-transition skin-green-light sidebar-mini"> -->
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url('index.php/user/profieIndex');?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>H</b>OME</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>HOME</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <li class="dropdown messages-menu">
                  <!-- back to home button -->
                      <a href = "<?php echo base_url() ?>index.php/user/profieIndex" class="dropdown-toggle">
                        <i class="fa fa-fw fa-home" title="Back To Homepage" style=" font-size: 20px;"></i>
                      </a>
                  </li>
            <!-- /.home-menu -->








                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->

                            <span class="hidden-xs"> <?= $user_name; ?> <?= $user_surname; ?> </span>
                        </a>

                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
