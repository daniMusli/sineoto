
<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Registration</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>



                    <form role="form" method="post" action="<?php echo base_url('index.php/user/register_user'); ?>">
                          <fieldset>
                              <div class="form-group">
                                   <label name="name" >Name</label>
                                  <?php echo form_error('name'); ?>
                                  <input class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>" type="text" autofocus>
                              </div>

			     <div class="form-group">

                                  <label name="surname">Surname</label>
                                <?php echo form_error('surname'); ?>
                                  <input class="form-control" placeholder="Surname" name="surname" value="<?php echo set_value('surname'); ?>" type="text" autofocus>

                              </div>

		            <div class="form-group">

                                  <label name="username">Username</label>
                                <?php echo form_error('username'); ?>
                                  <input class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" type="text" autofocus>

                              </div>


                              <div class="form-group">
                                  <?php echo form_error('password'); ?>
                                   <label name="Password">Password</label>
                                  <input class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" type="password">
                              </div>

 		             <div class="form-group">
                            <?php echo form_error('password2'); ?>
                                  <label name="rePassword">Re-Password</label>
                                  <input class="form-control" placeholder="Re-Password" name="password2" value="<?php echo set_value('password2'); ?>" type="password" value="">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('index.php/user/login_view'); ?>">Login here</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>

</span>
