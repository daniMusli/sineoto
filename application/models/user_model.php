<?php
class User_model extends CI_model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function register_user($user){
          $this->db->insert('user', $user);
      }

    public function addMovie($movie){
          $this->db->insert('filimler', $movie);
      }

    public function addSales($salesinfo){
        $this->db->insert('sales', $salesinfo);

    }

    public function addScreen($moviescreen){
            $this->db->insert('gosterim', $moviescreen);
        }

    public function DeleteMovie($movid){
        $this->db->where('id', $movid);
        $this->db->delete('filimler');
        echo "
            <script type=\"text/javascript\">
               alert('Good You delete that movie...');
            </script>
        ";
    }

    public function DeleteScreen($movid){
        $this->db->where('id', $movid);
        $this->db->delete('gosterim');
        echo "
            <script type=\"text/javascript\">
               alert('Good You delete that movie Screen...');
            </script>
        ";
    }

    public function addCeima($newCeima){

            $this->db->insert('sinemalar', $newCeima);
        }

    public function login_user($username,$password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
          return false;
        }
      }

      public function UpdateScreen($id,$data){
          $this->db->where('id', $id);
          $this->db->update('gosterim', $data);

      }

    public function username_check($username){
        // print_r($username);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query=$this->db->get();
        if($query->num_rows()>0){
          return false;
        }else{
          return true;
        }

      }


    public function movieName_check($name){
         //   print_r($name);
            $this->db->select('*');
            $this->db->from('filimler');
            $this->db->where('name',$name);
            $query=$this->db->get();
            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }

        }
}
?>
