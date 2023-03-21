<?php
 //To learn The Active record concept follow this website https://www.codeigniter.com/userguide2/database/active_record.html
class Usermodel extends MY_model
{
    
    public function getUserdata()
    {
       $this->load->database();
    //    $q =$this->db->query("Select * from users");
    //    $result =$q->result();
    //    echo "<pre>";
    //    print_r($result);
    // $this->db->select("Firstname");
    // $this->db->where("Firstname","Subha Ghanta");  //Alternate of Select * from useers where Firstname = "Subha Ghanta")
    // $q= $this->db->get("users");
 
        // return $q->result();

        // return $q->result_array();

     // In above case we will write a lots of same code like $this->db->select, $this->db->where, $this->db->get,
    // here ($this->db->) repeted lots of time  so to Optimize this we will write  like below  syntax

    $this->load->library('form_validation');  //Atfirst We should load the library then we use
    $this->form_validation->fb();

    //Which model,Libraries  are frequently and every time we load those things, to avoid it we use autoload ,so we do not load everytime



        $this->load->database();
        $q=$this->db->select("Firstname","Phone")
                    ->where("Firstname", "Subha Ghanta")
                     ->get("users");
        return $q->result();
     

        //If we pass $q-result(), it will return objects so when 
        // try to access this object we will use in view that $user->firstname like that 



        //When we want to return db details in array form we use command like @q->result_array();
        //By using this syntax we will return db details as an array and to acces this we use in view $user["FirstName"];


        //in this framework, we do not need to write full query this is the advantages of framework

      $this->test();
    }

}