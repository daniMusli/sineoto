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
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->

                <!-- /.box -->
                </div>
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
        <div class="col-md-6 ">

        </div>
    </section>
    <!-- /.content -->
  </div>

