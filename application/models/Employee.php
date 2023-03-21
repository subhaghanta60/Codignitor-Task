<?php
class Employee extends CI_model
{
    public function getEmployeeData()
    {
        $this->load->database();
        $q= $this->db->get('Employes');

        return $q->result_array();
    }
    public function allEmpData()
    {
       

        $this->db->select("*");
        $this->db->from('Employes');
        return $this->db->get();
    }

    public function CreateData($formArray)
    {
        $this->db->insert('Employes', $formArray);
    }

    public function getEmp($Empno)
    {
        $this->db->where('Empno',$Empno);      
        return $Employe = $this->db->get('Employes')->row_array();   //Select * from Employes where Empno=$Empno;
        
        
    }

    public function updateEmp($Empno, $formArray) 
    {
        $this->db->where('Empno', $Empno);
        $this->db->update('Employes', $formArray);
    }

    public function deleteEmp($Empno)
    {
        $this->db->where('Empno', $Empno);
        $this->db->delete('Employes');
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    
}


?>