<?php
class user extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index(){
        $this->load->view('header.php');
        $this->load->view("login.php");
        $this->load->view('footer.php');
    }
    public function indexx(){
        $this->load->view('header.php');
        $this->load->view("register.php");
        $this->load->view('footer.php');
    }
    public function profieIndex()
    {
        $this->load->view('profile_header');
        $this->load->view('starter');
        $this->load->view('profile_content_empty');
        $this->load->view('profile_footer');
    }



    public function login_view(){
        $this->load->view('header');

        $this->load->view("login.php");
        $this->load->view('footer');
    }


    function user_profile(){
        $this->load->view('header');
        $this->load->view('starter');
        $this->load->view('user_profile.php');
        $this->load->view('footer');


    }
    public function user_logout(){
        $this->session->sess_destroy();
        $this->load->view('header');

        $this->load->view('phome');
        $this->load->view('footer');
    }

    public function update_view(){

        $this->load->view('header');

        $this->load->view("update_user_profile.php");
        $this->load->view('footer');

    }

    public function register_user(){

        $type_id = 0; // save to db as customer(not admin): admin=1, customer=0 dir.
        $user=array(
          'name'=>$this->input->post('name'),
          'surname'=>$this->input->post('surname'),
          'username'=>$this->input->post('username'),
          'password'=>md5($this->input->post('password')),
          'type_id'=> $type_id,
         );
        $username_check=$this->user_model->username_check($user['username']);

        // check for reqiured fildes...
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]');
        $this->form_validation->set_rules('surname', 'Surname', 'required|min_length[2]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('password2', 'Password Confirmation ', 'required|matches[password]');
        if($this->form_validation->run()== FALSE){
            $this->index();
        }
        else // if all filed ok. So we will check username..
        {
            //check if username is in database already...
            if($username_check){
                $this->user_model->register_user($user);
                $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                redirect('user/login_view');

                }
                else{
                  $this->session->set_flashdata('error_msg', 'that username is already associated with onether Person ');
                  redirect('user');
            }
        }
    }

    function login_user(){
        $user_login=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password'))
        );
        $data=$this->user_model->login_user($user_login['username'],$user_login['password']);

        //here we buffer our user's all info...
        if($data){
            $this->session->set_userdata('id',$data['id']);
            $this->session->set_userdata('name',$data['name']);
            $this->session->set_userdata('surname',$data['surname']);
            $this->session->set_userdata('username',$data['username']);
            $this->session->set_userdata('type_id',$data['type_id']);
            $this->session->set_userdata($data);
            $data['user_id'] = $data['type_id'];

            $this->load->view('profile_header');
            $this->load->view('starter');
            $this->load->view('profile_content_empty',$data);
            $this->load->view('profile_footer');
          }
          else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');

            $this->load->view('header');
        
            $this->load->view("login.php");
            $this->load->view('footer');
          }
    }


    public function useredit(){
        $this->load->view('user/useredit');
    }



    public function edit($id, $type, $tag){
        $data = array(
            "action" => base_url('index.php/user/profile_content/'.$id),
            "data" => $this->db->get_where('user',array('id'=>$id)),
        );
        $data['title'] = $tag;
        $type = $this->session->userdata('type_id');
        $this->load->view('profile_header');
        $this->load->view('starter');
        $this->load->view('profile_content', $data);
        $this->load->view('profile_footer');
    }



    public function getuser($id){
        if((int)$id < 1)//$id is not an integer
        {
            redirect('user/index', 'refresh');//no valid uri segme
        }
        else
        {
            $this->load->model('user');
            $userinfo['userinfo']=$this->user_model->getUser($id);
            if(! $userinfo['userinfo'])
            {
                redirect('user/index', 'refresh');//no $id in DB
            }
            else{
                $this->load->view('user/userprofile',$userinfo);
            }

        }
    }




     public function change_password($id){
         $arrData["oldPass"] = $this->input->post("oldPass");
         $arrData["password"] = $this->input->post("password");
         $arrData["password2"] = $this->input->post("password2");
         if(!empty($this->input->post("oldPass")) and !empty($this->input->post("password")) and !empty($this->input->post("password2"))) {
             $id = $this->session->userdata('id');
             $query = $this->db->query("SELECT * FROM `user` WHERE id=$id");
             foreach ($query->result() as $row) {
                 $user_pass = $row->password;
             }
             if ($user_pass == md5($this->input->post("oldPass"))) {
                 if ($this->input->post("password") == $this->input->post("password2")) {
                     $new_pass = md5($this->input->post("password"));
                     $this->db->set('password', $new_pass);
                     $this->db->where('id', $id);
                     $this->db->update('user');
                     echo "
                    <script type=\"text/javascript\">
                    alert('Thanks! Your password is changced.');
                    </script>
                ";

                     $this->load->view('profile_header');
                     $this->load->view('starter');
                     $this->load->view('profile_content_empty');
                     $this->load->view('profile_footer');
                 }
                 else{
                     echo "
                    <script type=\"text/javascript\">
                    alert('Password Dose not match!! Please Try again');
                    </script>
                ";
                     $passData['title']='changemypassword';
                     $this->load->view('profile_header');
                     $this->load->view('starter');
                     $this->load->view('profile_content', $passData);
                     $this->load->view('profile_footer');
                 }
             }
             else{
                 echo "
                    <script type=\"text/javascript\">
                    alert('Plaese check Your Old Password!');
                    </script>
                ";

                 $passData['title']='changemypassword';
                 $this->load->view('profile_header');
                 $this->load->view('starter');
                 $this->load->view('profile_content', $passData);
                 $this->load->view('profile_footer');

             }
         }
             else{
                 echo "
                    <script type=\"text/javascript\">
                    alert('Plaese supply all fields!!');
                    </script>
                ";

                 $passData['title']='changemypassword';
                 $this->load->view('profile_header');
                 $this->load->view('starter');
                 $this->load->view('profile_content', $passData);
                 $this->load->view('profile_footer');

             }
      }

    public function Admin($tag){
         $data['title'] = $tag;

         $this->load->view('profile_header');
         $this->load->view('starter');
         $this->load->view('profile_content', $data);
         $this->load->view('profile_footer');
     }


    public function do_update(){
        $id = $this->session->userdata('id');
        $type_id= $this->session->userdata('type_id');
        $query = $this->db->query("SELECT * FROM user WHERE user.id=$id");

        $data = array(
            'name'=> $this->input->post('name'),
            'surname'=> $this->input->post('surname'),
        );
        $this->form_validation->set_rules('name', 'name', 'required|min_length[2]');
        $this->form_validation->set_rules('surname', 'surname', 'required|min_length[2]');
        if($this->form_validation->run()== FALSE){
            $this->load->view('profile_header');
            $this->load->view("starter");
            $this->load->view("profile_content");
            $this->load->view('profile_footer');
        }
        else {
                //update user's or admin's common features
                $this->db->update('user', $data, array('id' => $this->session->userdata('id')));


                $this->load->view('profile_header');
                $this->load->view("starter");
                $this->load->view("profile_content_empty");
                $this->load->view('profile_footer');
        }
    }

    public function do_upload(){ // add new moview / upload and save image.

        $movies_name=array();
        $mappMoviesNameQuery= $this->db->query("SELECT id, namee FROM `diller` WHERE 1");
        foreach ($mappMoviesNameQuery->result() as $row) {
            $aa=$row->id;
            $bb=$row->namee;
            $movies_name[$bb]=$aa;
        }

        $mov_image = "uploads/temp.jpg";



        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name']     = 'resim';
        $config['max_size']      = 1000;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){
            $data['file'] = $mov_image;
        }
        else{
            $file = $this->upload->data();
            $data['file'] = 'uploads/' . $file['file_name'];
        }


        $title_data['title'] = 'addMov';
       // print_r($movies_name[$this->input->post('lang')]);
        $data=array(
            'name'=>$this->input->post('name'),
            'year'=>$this->input->post('year'),
            'actor'=>$this->input->post('actor'),
            'actres'=>$this->input->post('actres'),
            'director'=>$this->input->post('director'),
            'lang'=>$movies_name[$this->input->post('lang')],
            'time'=>$this->input->post('time'),
            'image'=>$data['file'],
        );

        $this->form_validation->set_rules('name', 'name', 'required');

        if($this->form_validation->run()== FALSE){
            $this->load->view('profile_header');
            $this->load->view("starter");
            $this->load->view("profile_content",$title_data);
            $this->load->view('profile_footer');
        }
        else {
            $movName_check = $this->user_model->movieName_check($data['name']);
            if($movName_check) {
                echo "
                        <script type=\"text/javascript\">
                        alert('Done! new Movie been added.');
                        </script>
                        ";

                $this->user_model->addMovie($data);
                $this->load->view('profile_header');
                $this->load->view("starter");
                $this->load->view("profile_content", $title_data);
                $this->load->view('profile_footer');
            }
            else{
                echo "
                        <script type=\"text/javascript\">
                        alert('Wrong! Sorry. That name is token by other movie.');
                        </script>
                        ";

                $this->user_model->addMovie($data);
                $this->load->view('profile_header');
                $this->load->view("starter");
                $this->load->view("profile_content", $title_data);
                $this->load->view('profile_footer');

            }
        }
    }

    public function AddScreen(){
        $title_data['title'] = 'addscreen';

        if($this->input->post('datetype')==="1"){
            $bilet_id="1"; //inirimlidir.
        }
        else{
            $bilet_id="2";
        }
        $data=array(
            'film'=>$this->input->post('moviename'),
            'room'=>$this->input->post('room'),
            'date'=>$this->input->post('moviedate'),
            'date_time'=>$this->input->post('datetype'),
            'bilet_id'=>$bilet_id,
        );

        echo "
            <script type=\"text/javascript\">
               alert('Done! new Movie screen been added.');
            </script>
        ";
        $this->user_model->addScreen($data);
        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $title_data);
        $this->load->view('profile_footer');
    }

    public function AddCenima(){
        $title_data['title'] = 'addcenima';
        $data=array(
            'name'=>$this->input->post('cenimaname'),
            'location'=>$this->input->post('location'),
            'roomNum'=>$this->input->post('roomnumber'),
        );
        echo "
            <script type=\"text/javascript\">
               alert('Done! new Cenima information been added.');
            </script>
        ";
        $this->user_model->addCeima($data);
        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $title_data);
        $this->load->view('profile_footer');
    }


    public function UpdateCenima($mov_id){
        $query = $this->db->query("SELECT name,year,des,time,image,namee FROM filimler
                                    JOIN diller ON diller.id=filimler.lang
                                    WHERE filimler.id=$mov_id");
        foreach ($query->result() as $row) {
            $movie_name = $row->name;
            $movie_year = $row->year;
            $movie_des = $row->des;
            $movie_lan = $row->namee;
            $movie_time = $row->time;
            $movie_image = $row->image;

        }
        $t_data['mid']=$mov_id;
        $t_data['mname']=$movie_name;
        $t_data['mimg']=$movie_image;
        $t_data['myear']=$movie_year;
        $t_data['mdes']=$movie_des;
        $t_data['mlan']=$movie_lan;
        $t_data['mtime']=$movie_time;

        $t_data['title'] = 'updatemovie';

        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $t_data);
        $this->load->view('profile_footer');

    }

    public function UpdateCenimaScreen($mov_id){
        $query = $this->db->query("SELECT gosterim.id,zaman.date_type,sinemalar.nam,gosterim.date, filimler.name,gosterim.film
                                  FROM gosterim 
                                  JOIN filimler ON filimler.id=gosterim.film
                                  JOIN salon ON salon.id=gosterim.room
                                  JOIN sinemalar ON sinemalar.id=salon.cinema_name
                                  JOIN zaman ON zaman.id=gosterim.date_time
                                  JOIN diller ON diller.id=filimler.lang
                                  WHERE gosterim.id=$mov_id");

 //       print_r($mov_id);
        foreach ($query->result() as $row) {
            $movie_id = $row->id;
            $movie_film_id=$row->film;
            $movie_name=$row->name;
            $movie_dtype = $row->date_type;
            $movie_room_name = $row->nam;
            $movie_date = $row->date;

        }
        $t_data['mid']=$mov_id;
        $t_data['mfid']=$movie_film_id;
        $t_data['mname']=$movie_name;
        $t_data['mdtype']=$movie_dtype;
        $t_data['mroomname']=$movie_room_name;
        $t_data['mdate']=$movie_date;

        //print_r($t_data);

        $t_data['title'] = 'updatemoviescreen';

        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $t_data);
        $this->load->view('profile_footer');

    }

    public function UpdateScreen(){
        $gid=$this->input->post('gosterid');
        if($this->input->post('datetype')==="1"){
            $bilet_id="1"; //inirimlidir.
        }
        else{
            $bilet_id="2";
        }

        $info=array(
            'film'=>$this->input->post('filmid'),
            'room'=>$this->input->post('room'),
            'date'=>$this->input->post('moviedate'),
            'date_time'=>$this->input->post('datetype'),
            'bilet_id'=>$bilet_id,
        );
        $this->user_model->UpdateScreen($gid,$info);
        echo "
            <script type=\"text/javascript\">
               alert('Done! Cenima Screen information been Updated..');
            </script>
        ";



    }


    public function DeleteMovie($mov_id){
        $this->user_model->DeleteMovie($mov_id);
    }

    public function DeleteScreen($mov_id){

        $this->user_model->DeleteScreen($mov_id);
    }


    public function TakeTicket(){
        $mov_name=array();
        $mov_img=array();
        $mov_id=array();
        $query = $this->db->query("SELECT DISTINCT  filimler.name, filimler.image, filimler.id
                                  FROM gosterim 
                                  JOIN filimler ON filimler.id=gosterim.film
                                  JOIN salon ON salon.id=gosterim.room
                                  JOIN sinemalar ON sinemalar.id=salon.cinema_name
                                  JOIN zaman ON zaman.id=gosterim.date_time
                                  JOIN diller ON diller.id=filimler.lang
                                  WHERE 1");


        foreach ($query->result() as $row) {
            $movie_name = $row->name;
            $movie_id = $row->id;
            $movie_img = $row->image;

            array_push($mov_name,$movie_name);
            array_push($mov_img,$movie_img);
            array_push($mov_id,$movie_id);
        }

        $t_data['mname']=$mov_name;
        $t_data['mimg']=$mov_img;
        $t_data['mid']=$mov_id;
        //print_r($mov_name);

        $t_data['title'] = 'taketicket';
        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $t_data);
        $this->load->view('profile_footer');
    }
    public function PaintTicket(){
        $mov_date= $this->input->post("movdate");
        $user_id = $this->input->post("usercode");

        $mov_info['mov_date'] = $mov_date;
        $mov_info['user_id']=$user_id;


        $title_data['title'] = 'taketicket';
        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("take_app_yedekk", $mov_info);
        $this->load->view('profile_footer');
    }

    public function MovieDashboard($move_id){

        $mov_shows_time=array();


        $query = $this->db->query("SELECT  gosterim.id, filimler.name, filimler.image,filimler.des, filimler.director, filimler.time, filimler.year,zaman.date_type,gosterim.room 
                                  FROM gosterim 
                                  JOIN filimler ON filimler.id=gosterim.film
                                  JOIN salon ON salon.id=gosterim.room
                                  JOIN sinemalar ON sinemalar.id=salon.cinema_name
                                  JOIN zaman ON zaman.id=gosterim.date_time
                                  JOIN diller ON diller.id=filimler.lang
                                  WHERE gosterim.film=$move_id");


        foreach ($query->result() as $row) {
            $mov_name = $row->name;

            $mov_img = $row->image;
            $mov_des=$row->des;
            $mov_direc=$row->director;
            $mov_time=$row->time;
            $mov_year=$row->year;
            $mov_shows=$row->date_type;
            $mov_show_id=$row->id;

            $mov_room=$row->room;
            array_push($mov_shows_time,$mov_shows);

        }

        $t_data['mname']=$mov_name;
        $t_data['mimg']=$mov_img;
        $t_data['mid']=$move_id;
        $t_data['mdes']=$mov_des;
        $t_data['mdirec']=$mov_direc;
        $t_data['mtime']=$mov_time;
        $t_data['myear']=$mov_year;
        $t_data['mshows']=$mov_shows_time;
        $t_data['mshowid']=$mov_show_id;
        $t_data['mroom']=$mov_room;



        $t_data['title'] = 'moviedashboard';
        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_content", $t_data);
        $this->load->view('profile_footer');
    }
    public function BuyTicket(){
        $quota_id=$this->input->post('roomid');
        $info=array(
            'user_id'=>$this->session->userdata('id'),
            'gosterim_id'=>$this->input->post('movid'),
            'salon_id'=>$this->input->post('roomid'),
            'koltuk_no'=>$this->input->post('kno'),
        );

        $quota = $this->db->query("SELECT salon.capacity, salon.customer_counter FROM `salon` WHERE salon.id=$quota_id");
        foreach ($quota->result() as $row) {
            $salon_kapasite = $row->capacity;
            $kontenjan= $row->customer_counter;
        }
        $doluluk=$salon_kapasite-$kontenjan;
        if($doluluk<=0){
            echo "
                <script type=\"text/javascript\">
                alert('Sorry! There are No Quota for this Salon');
                </script>
            ";
        }
        else{
            $this->db->insert('sales', $info);
            echo "
                <script type=\"text/javascript\">
                alert('Good! you took a ticket. ');
                </script>
            ";
        }

    }


    public function BuyTicketYedek(){
        $move_id=$this->input->post("enes");
        //print_r($move_id);
        $mov_shows_time=array();


        $query = $this->db->query("SELECT  gosterim.id, filimler.name, filimler.image,filimler.des, filimler.director, filimler.time, filimler.year,zaman.date_type,gosterim.room 
                                  FROM gosterim 
                                  JOIN filimler ON filimler.id=gosterim.film
                                  JOIN salon ON salon.id=gosterim.room
                                  JOIN sinemalar ON sinemalar.id=salon.cinema_name
                                  JOIN zaman ON zaman.id=gosterim.date_time
                                  JOIN diller ON diller.id=filimler.lang
                                  WHERE gosterim.film=$move_id");


        foreach ($query->result() as $row) {
            $mov_shows=$row->date_type;
            $mov_show_id=$row->id;
            $mov_room=$row->room;
            $mov_name=$row->name;
            array_push($mov_shows_time,$mov_shows);
        }



        $infooo['mid']=$move_id;
        $infooo['mshows']=$mov_shows_time;
        $infooo['mshowid']=$mov_show_id;
        $infooo['mroom']=$mov_room;
        $infooo['mmname']=$mov_name;
        $infooo['title'] = 'take';


        $this->load->view('profile_header');
        $this->load->view("starter");
        $this->load->view("profile_take", $infooo);
        $this->load->view('profile_footer');
    }
    public function insertTicket($userid,$k_no,$d_mov_room,$s_k_no){
        $sales_info=array(
            'user_id'=>$userid,
            'gosterim_id'=>$k_no,
            'salon_id'=>$d_mov_room,
            'koltuk_no'=>$s_k_no,
        );

        $insertData=$this->db->insert('sales', $sales_info);
        if($insertData){
            echo "
                <script type=\"text/javascript\">
                alert('Good! you took a ticket. ');
                </script>
            ";
        }

    }

}

?>
