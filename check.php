<?php


class CI_Controller
{
    public function view()
    {
      echo "view display";
    }
}

class Welcome
{
    private $load;
    public function __construct()
    {
        $load = new CI_Controller();
    }
    public function something()
    {
        $this->load->view();

    }
}

?>