<?php
#[\AllowDynamicProperties]
class Employes extends CI_Controller
{
  public function Welcome()
  {
    $this->load->view('Task/Welcome');
  }
    public function Employe ()
    {
      // $this->load->model('Employee');
      $data['Employee'] =  $this->Employee->getEmployeeData();
    //   print_r($data);
      
       $this->load->view('Task/EmployeeList',$data);
    }

    public function create() {
     
      $config=[
        'upload_path'=>'./upload/',
        'allowed_types'=>'gif|jpg|png',
      ];
      $this->load->library('upload',$config);
     
      
      // $this->load->model('Employee');
      $this->form_validation->set_rules('Empno','Employee No ', 'required|numeric');
      $this->form_validation->set_rules('Ename','Employee Name', 'required');
      $this->form_validation->set_rules('Phone','Employe Phone Number', 'required|exact_length[10]|numeric');
      $this->form_validation->set_rules('Email','Employee Email Id', 'required|valid_email');
      $this->form_validation->set_rules('Mgr','Employee Manager No', 'required|numeric');
      $this->form_validation->set_rules('Salary','Employee Salary', 'required|numeric');
      
      $this->form_validation->set_rules('Designation','Designation', 'required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

     $this->upload->do_upload();
      $data=$this->upload->data();
         
 
      if($this->form_validation->run() ){
      
       
        $formArray = $this->input->post();
        $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
        $formArray['image_path']=$image_path;
        
        $this->Employee->CreateData($formArray);
        $this->session->set_flashdata('success', 'Employee Data added Successfully');
        redirect(base_url().'index.php/Employes/Employe');
      }
      else {
       

        // $formArray['Empno'] = $this->input->post('Empno');
        // $formArray['Ename'] = $this->input->post('Ename');
        // $formArray['Phone'] = $this->input->post('Phone');
        // $formArray['Email'] = $this->input->post('Email');
        // $formArray['Mgr'] = $this->input->post('Mgr');
        // $formArray['Salary'] = $this->input->post('Salary');
        // $formArray['Designation'] = $this->input->post('Designation');
       

      
        
        $this->load->view('Task/Create');
      }

      
    
    }

    


    public function edit($Empno)
    {
   
      // $this->load->model('Employee');
      $Employe = $this->Employee->getEmp($Empno);
      $data =array();
      $data['Employee'] = $Employe;
      
      

      
      $this->form_validation->set_rules('Ename','Employee Name', 'required');
      $this->form_validation->set_rules('Phone','Employe Phone Number', 'required|exact_length[10]|numeric');
      $this->form_validation->set_rules('Email','Employee Email Id', 'required|valid_email');
      $this->form_validation->set_rules('Mgr','Employee Manager No', 'required|numeric');
      $this->form_validation->set_rules('Salary','Employee Salary', 'required|numeric');
    
      $this->form_validation->set_rules('Designation','Designation', 'required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

      $this->upload->do_upload();
        

      if ($this->form_validation->run() == false){
        $this->load->view('Task/Update', $data);
      }
      else {
        $formArray = array();
        $formArray['Empno'] = $Empno;
        $formArray['Ename'] = $this->input->post('Ename');
        $formArray['Phone'] = $this->input->post('Phone');
        $formArray['Email'] = $this->input->post('Email');
        $formArray['Mgr'] = $this->input->post('Mgr');
        $formArray['Salary'] = $this->input->post('Salary');
        $formArray['Designation'] = $this->input->post('Designation');

        $data=$this->upload->data();
        
        

        $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
       
        $formArray['image_path']=$image_path;

  

        $this->Employee->updateEmp($Empno, $formArray);
        $this->session->set_flashdata('success', 'Employee Details Updated Successfully');
        redirect(base_url().'index.php/Employes/Employe');
      }
    }

    public function delete($Empno)
    {
      // $this->load->model('Employee');

      $Emp=$this->Employee->getEmp($Empno);
      if(empty($Emp)){
        $this->session->set_flashdata('failure', 'Employee Details not found in database ');
        redirect(base_url().'index.php/Employes/Employe');

      }
      $this->Employee->deleteEmp($Empno);
      $this->session->set_flashdata('success', 'Employee Details deleted successfully');
      redirect(base_url().'index.php/Employes/Employe');
    }

    public function login()
    {
      $this->load->view('Task/Login');
    }
    public function process ()
    {
      $user = $this->input->post('Email');
      $pwd = $this->input->post('pwd');

      if($user =='Subhaghanta60@gmail.com' && $pwd =='Subha@123'){
        $this->session->set_userdata(array('user'->$user));
        redirect(base_url().'index.php/Employes/Employe');
      }
      else {
        $this->session->set_flashdata('failure', 'UserId & Password not matched ');
        redirect(base_url().'index.php/Employes/login');
      }
    }
    public function Logout()
    {
      $this->session->unset_userdata('user');
      redirect(base_url().'index.php/Employes/Welcome');
    }

 
public function export()
{
  $storData = array();
  $metaData[] = array('Empno' => 'Empno', 'Ename' => 'Ename', 'Phone' => 'Phone', 'Email' => 'Email', 'Mgr' => 'Mgr','Salary'=>'Salary','Designation'=>'Designation','image_path'=>'image_path');       

  $customerInfo = $this->Employee->getEmployeeData(); 

  foreach($customerInfo as $key=>$element) {
      $storData[] = array(
          'Empno' => $element['Empno'],
          'Ename' => $element['Ename'],
          'Phone' => $element['Phone'],
          'Email' => $element['Email'],
          'Mgr' => $element['Mgr'],
          'Salary' =>$element['Salary'],
          'Designation' =>$element['Designation'],
          'image_path' =>$element['image_path']
      );
  }
  $data = array_merge($metaData,$storData);
  header("Content-type: application/csv");
  header("Content-Disposition: attachment; filename=\"csv-sample-customer".".csv\"");
  header("Pragma: no-cache");
  header("Expires: 0");
  $handle = fopen('php://output', 'w');
  foreach ($data as $data) {
      fputcsv($handle, $data);
  }
      fclose($handle);
  exit;
}

}


  




?>