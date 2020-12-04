<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_m extends CI_Model{

  public function showAllEmployee(){
    $this->db->order_by('created_at', 'dsec');
    $query = $this->db->get('tbl_employees');
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }
  public function addEmployee(){
    $field = array(
      'employee_name'=>$this->input->post('txtEmployeeName'),
      'address'=>$this->input->post('txtAddress'),
      'created_at'=>date('Y-m-d H:i:s')
      );
    $this->db->insert('tbl_employees', $field);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }
  public function editEmployee(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $query = $this->db->get('tbl_employees');
    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function updateEmployee(){
    $id = $this->input->post('txtId');
    $field = array(
      'employee_name'=>$this->input->post('txtEmployeeName'),
      'address'=>$this->input->post('txtAddress'),
      'updated_at'=>date('Y-m-d H:i:s')
      );
    $this->db->where('id', $id);
    $this->db->update('tbl_employees', $field);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }
  function deleteEmployee(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $this->db->delete('tbl_employees');
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }


  function fetch_data($query)
  {

    $this->db->like('student_name', $query);
    $query = $this->db->get('student');
    if($query->num_rows() > 0)
    {
     foreach($query->result_array() as $row)
     {
      $output[] = array(
       'student_name'  => $row["student_name"],     
       'student_id'  => $row["student_id"]
       );
    }
    echo json_encode($output);
  }

}


 


}
