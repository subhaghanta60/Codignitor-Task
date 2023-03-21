<?php
class Text 
{
public function dbdetails()

{
    $this->load->helper('array') // With in custome library ,if we want to accesss helper class this is the wrong method. this show error

    echo "This function will provide dedetails";


    $ci= &get_instance();
    $ci->load->helper('array');

    $arr=['ABC'=>'abc', 'XYZ'=>'xyz'];
    echo element('ABC',$arr,'Not Found');

}
}
?>