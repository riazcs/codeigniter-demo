<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Employee extends CI_Controller
{
  
  function __construct(){
    parent:: __construct();
    $this->load->model('employee_m', 'm');
  }
  

  function index(){
    //$this->load->view('layout/header');
    $this->load->view('employee/index');
   // $this->load->view('layout/footer');
  }

  public function showAllEmployee(){
    $url='http://localhost/citry/api/user/Userdata/adata';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = $this->m->showAllEmployee();
    echo json_encode($result);
  }

  public function addEmployee(){
    $result = $this->m->addEmployee();
    $msg['success'] = false;
    $msg['type'] = 'add';
    if($result){
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function editEmployee(){
    $result = $this->m->editEmployee();
    echo json_encode($result);
  }

  public function updateEmployee(){
    $result = $this->m->updateEmployee();
    $msg['success'] = false;
    $msg['type'] = 'update';
    if($result){
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function deleteEmployee(){
    $result = $this->m->deleteEmployee();
    $msg['success'] = false;
    if($result){
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }
  
  public function todo()
  {
    $this->load->view('employee/todolist');
  }


   function autoSearch()
  {
  $this->load->view('employee/autocomplete_view') ;
  }
/*
 function fetch()
 {
  $this->load->model('employee_m');
  echo $this->employee_m->fetch_data($this->uri->segment(3));
 }
*/

 public function searchStudent() { 
   $data = array();
   $both = $this->input->get('term');
   $this->db->like('student_name', $both, 'both');
   $result = $this->db->select('student_id,student_name,student_phone')->get('student')->result_array();
   foreach ($result as $row) {
       $list = array(

           'label' => $row['student_name'],
           'student_id' => $row['student_id'],
           'student_phone' => $row['student_phone'],
       );
       array_push($data, $list);
   }
   echo json_encode($data);
 }



public function add_to_cart(){ 
 
    $this->load->library('cart');
   
    $data = array(
      'id'      => 'sku_123ABC',
      'qty'     => 1,
      'price'   => 2,
      'name'    => 'T-Shirt',    
      'options' => array('student_id' => $this->input->post('student_id'),'student_phone' => $this->input->post('student_phone'))
      
    );
    $this->cart->insert($data);

    echo $this->show_cart();   
    $this->load->view('employee/autocomplete_view'); 
    //$this->load->view('cart');
  }

  function show_cart(){ 
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) { 
           
      $no++;
      $output .='
        <tr>
         
          <td>'.$items['options']['student_id'].'</td>
          <td>'.$items['options']['student_phone'].'</td>
          <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
        </tr>
      ';
    }
    $output .= '
      <tr>
       
      </tr>
    ';
    return $output;
  }

  function load_cart(){ 
    echo $this->show_cart();
  }

  function delete_cart(){ 
   
    $data = array(
      'rowid' => $this->input->post('row_id'), 
      'qty' => 0, 
    );
    $this->cart->update($data);
    echo $this->show_cart();
  }

  public function ledger_view()
  {
    $this->load->view('employee/ledger_view');
  }

  public function search_multiple_identity() { 
    $data = array();
    $both = $this->input->get('term');
    
    $this->db->like('multiple_identity', $both, 'both');
    $result = $this->db->select('multiple_identity,ledger_id')->get('acc_ledger')->result_array();
    foreach ($result as $row) {

       $multiple_identity = explode(',',$row['multiple_identity']);
       for($r=0; $r<count($multiple_identity); $r++)
       {
        // $ijnhni= array_values(array_unique($multiple_identity[$r], SORT_REGULAR));
        $list = array(
 
            'label' =>$multiple_identity[$r],
           'ledger_id' => $row['ledger_id'],
           'multiple_identity' =>$multiple_identity[$r],
        );
        array_push($data, $list);
       }
        
    }
    
    echo json_encode($data);
  }

}