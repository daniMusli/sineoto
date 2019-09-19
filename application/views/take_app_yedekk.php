<?php

$base_urll=base_url();
$base_url= rtrim($base_urll,"/");

$app_datee= $mov_date;
$userid=$user_id;



$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,"zdbodev");

?>
<script>
  function getDayOfWeek(date) {

    var dayOfWeek = new Date(date).getDay();
    return isNaN(dayOfWeek) ? null : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][dayOfWeek];
  }
</script>


<?php

$sql="SELECT filimler.name, filimler.year, filimler.director, diller.namee, filimler.time, filimler.image, gosterim.room, sinemalar.location, sinemalar.nam, zaman.date_type
      FROM gosterim 
      JOIN filimler ON filimler.id=gosterim.film
      JOIN salon ON salon.id=gosterim.room
      JOIN sinemalar ON sinemalar.id=salon.cinema_name
      JOIN zaman ON zaman.id=gosterim.date_time
      JOIN diller ON diller.id=filimler.lang
      WHERE gosterim.date='$app_datee' ";

$sql_count="SELECT  COUNT(gosterim.id)
      FROM gosterim 
      WHERE gosterim.date='$app_datee' ";


$result = $con->query($sql);
$sql_count=mysqli_num_rows($result);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "
<div class=\"content-wrapper\">

    <section class=\"content-header\">
    
        <section class=\"content container-fluid\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-10 \">
                        <div class=\"row\">
                        
    <a href = 'javascript:window.history.go(-1);' class='dropdown-toggle'>
      <i class='fa fa-backward' title='Back To appointment page' style=' font-size: 40px;'></i>
      </a>
      </br></br>
      <center>
    <form method='post' action='$base_url/index.php/user/paint_app' class='form-inline'>
        <div class=''>
             <input type='date' class='pa_date' id='pa_date' name='pa_date' value='$app_datee'>
             <b><h5 id='dateDay'></h5></b>
        </div>
        <input type='hidden' id='mov_id' name='mov_id' value='$app_datee'>
        <input type='hidden' id='user_id' name='user_id' value='$userid'>
        <button type='submit' class='btn btn-primary btn-circle btn-xl center-block' style='width: 78px;height: 78px;padding: 10px 9px;font-size: 20px;line-height: 1.33;border-radius: 35px;font-size: 12px;'>Re-Check </button>
      </form>
      </center>
      </br></br></br>
      <script type=\"text/javascript\">
      document.getElementById('dateDay').innerHTML = getDayOfWeek('$app_datee');
      </script>
    ";

if (mysqli_num_rows($result)==0) {
  echo "
  <center>
      <div class='callout callout-danger'>
        <p class='fa fa-bullhorn'> Sorry! in that Day( $app_datee) ther no more appointment</p>


      </div>
  </center>
                                  </div>
                            </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>


  ";
 }


 else {
  echo "

<div class=\"content-wrapper\">

    <section class=\"content-header\">
    
        <section class=\"content container-fluid\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-10 \">
                        <div class=\"row\">
  ";
  ?>








     <!-- /html -->
  <?php

  while($row = mysqli_fetch_array($result)) {

    $mov_name=$row['name'];
    $mov_year=$row['year'];
    $mov_dir=$row['director'];
    $mov_lang= $row['namee'];
    $mov_time=$row['time'];
    $mov_room = $row['room'];
    $mov_loc=$row['location'];
    $image=$row['image'];
    $cenima_name=$row['nam'];
    $mov_date=$row['date_type'];


    if(empty($image))
    {
        $image='uploads/temp.jpg';
    }

   ?>



  <?php


    echo "
      <div class=\"form-group\">
       
            <div class=\"col-md-3\">
                <div class=\"input-group\">
                   
                     <img class='rounded-circle' src='$base_url/$image' alt='No Doctor image' width='120' height='120'>
                      <p>$mov_name</p>
                       <p><a class='btn btn-secondary' href='$base_url/index.php/user/addApp/$app_datee/$userid' role='button' onclick=' return Confirim();'>Take appointment &raquo;</a></p>

                </div>
            </div>
        </div>


 


   ";


 }


   echo "
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>
   ";
}
  ?>



<script type="text/javascript">
    function Confirim() {
        return confirm('Are you sure you want to take this appointment');
    }
</script>
