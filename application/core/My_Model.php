<?php

class My_Model extends CI_model
{
public function test()
{
    echo "Testing MY_Controller Functionality";
}
}

class AdminInterface extends MY_Model
{
// Public  function
}

class UserInterface extends My_Model
{
    //function
}

?>


