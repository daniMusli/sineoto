
<!-- Main Footer
<footer class="main-footer">


    <strong>Copyright &copy; 2017 <a href="<?php echo base_url() ?>index.php/phome/">VisDr</a>.</strong> All rights reserved.
</footer>

-->

<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('profile/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('profile/dist/js/adminlte.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('profile/dist/js/checkPass.js');?>"></script>

<!-- this for admin setup -->



<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script>
    $('.timepicker').timepicker({
        timeFormat: 'h:mm',
        interval: 1,
        minTime: '1',
        maxTime: '3:00am',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>




</body>


</html>
