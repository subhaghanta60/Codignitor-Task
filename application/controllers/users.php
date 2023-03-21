<?php
class Users extends CI_Controller
{
    public function User()
    {
       // $this->load->helper('Helper name') This is the way we can use helper function
        $this->load->model('Usermodel');
         $this->load->helper('xyz'); //To load the helper class
         test(); //directly we call the function
       $data['users'] = $this->Usermodel->getUserdata();
       
        $this->load->view('users/userlist',$data);


        //Array helper have its own functionality . also to add my own custom Functionality atfirst we create our own Custom Helper
        //the Helper namming should be My_Exitinghelper name.
        
        $this->load->helper('array');
        show();  

        //To override the extiing Helper

        $this->load->helper('array');
        $arr= ['ABC'=>'abc', 'XYZ'=>'xyz'];
       echo  element('ABC',$arr, 'Not Found');
       // This Element function call the custem helper function



       //to Access the custom library
       //Atfirst we make a Custome class .class name and file name should be same and both should be init cap formate

       $this->load->library('Text');
       $this->text->dbdetails();


       $this->load->library("email");
       $this->email->show()  //Custom library

    }
}

//Helper function means that We can build the function without class

//The way of nameing the custom helper class is helpername_helper.php.. When we use the helper function, we use while loading time we helpername just do not use _helper.



?>



<?php
// class A
// {
//     public function XYZ()
//     {

//     }
// }

// //Overridding means that within A class Xyz Function hava his own functionality and B class XYZ has its own functionality

// class B
// {
//     public function XYz()
//     {

//     }
// }

?>
