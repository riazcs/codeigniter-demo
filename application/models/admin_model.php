<?php
defined('BASEPATH') OR exit('No direct script access allow');
class Admin_model extends CI_Model
{

  public function admin_model_info($email_address,$password)
  {
    $this->db->select('*');
    $this->db->from('tbl_admin');
    $this->db->where('email_address',$email_address);
    $this->db->where('password',md5($password));

    $query_result=$this->db->get();
    $result=$query_result->row();
    return $result;

  }
 
 public function save_student_info()
 {
  // $data=array();
  // $data['student_name']=$this->input->post('student_name',true);
  // $data['student_phone']=$this->input->post('student_phone',true);
  // $data['student_roll']=$this->input->post('student_roll',true);
  // $data['subject']=$this->input->post('subject',true);
  // $data['address']=$this->input->post('address',true);
  // $data['year']=$this->input->post('year',true);
  // $data['registration']=$this->input->post('registration',true);
  // $data['sex']=$this->input->post('sex',true);
  $data['admin_id']=$this->session->userdata('admin_id',true);
  $related_student = $this->input->post('students_id');
  $test = implode(",", (array) $related_student);
  $data=array(
       'student_name'=>$this->input->post('student_name',true),
       'student_phone'=>$this->input->post('student_phone',true),
       'student_roll'=>$this->input->post('student_roll',true),
       'subject'=>$this->input->post('subject',true),
       'address'=>$this->input->post('address',true),
       'year'=>$this->input->post('year',true),
       'registration'=>$this->input->post('registration',true),
       'sex'=>$this->input->post('sex',true),
       'related_student'=>$test,
       'student_division_id' => $this->input->post('address'),
       'student_distict_id' => $this->input->post('distict') 
       );
  $this->db->insert('student',$data);
 }
 
  public function all_admin_info()
 {
 	$this->db->select('*');
 	$this->db->from('tbl_admin');
  $this->db->join('student', 'student.admin_id = tbl_admin.admin_id');
 	$query_result=$this->db->get();

 	$admin_info=$query_result->result();
 	return $admin_info;
 }
 public function all_student_info()
 {
 	$this->db->select('*');
 	$this->db->from('student');
  //$this->db->join('student', 'student.admin_id = tbl_admin.admin_id');
  //$query = $this->db->get();
  //$this->db->order_by("student name", "desc");

 	$query_result=$this->db->get();

 	$std_info=$query_result->result();
 	return $std_info;
 }

 public function all_student_info_by_id($student_id)
 {	
 	$this->db->select('*');
 	$this->db->from('student');
 	$this->db->where('student_id',$student_id);
 	$query_result=$this->db->get();
 	$result=$query_result->row();
 	return $result;
 }


 public function update_student_info()
 {
 	$data=array();
 	$student_id=$this->input->post('student_id',true);
 	$data['student_name']=$this->input->post('student_name',true);
  $data['student_phone']=$this->input->post('student_phone',true);
  $data['student_roll']=$this->input->post('student_roll',true);
  $data['subject']=$this->input->post('subject',true);
  $data['address']=$this->input->post('address',true);
  $data['year']=$this->input->post('year',true);
  $data['registration']=$this->input->post('registration',true);
  $data['sex']=$this->input->post('sex',true);
 	$this->db->where('student_id',$student_id);
 	$this->db->update('student',$data);
 }

  public function delete_student_by_id($student_id)
  {

  	$this->db->where('student_id',$student_id);
  	$this->db->delete('student');
  }

  public function save_admin_info()
  {

   $data=array();
   $data['admin_name']=$this->input->post('admin_name',true);
   $data['email_address']=$this->input->post('email_address',true);
   $data['password']=$this->input->post('password',true);
   $data['admin_phone']=$this->input->post('admin_phone',true);
   $sdata=array();
   $error="";
   $config['upload_path']='image/';
   $config['allowed_types']='jpg|png|gif';
   $config['max_size']=100000;
   $config['max_width']=2048;
   $config['max_height']=1024;
   $this->load->library('upload',$config);
   if (!$this->upload->do_upload('admin_image'))

    {
   	# code...
   	$error=$this->upload->display_errors(); 	
   }
   else
   {
   	$sdata=$this->upload->data();
   	$data['admin_image']=$config['upload_path'].$sdata['file_name'];
   }

    $this->db->insert('tbl_admin',$data);

  }

   public function save_registration_info()
   {
   	$data=array();
   	$data['student_id']=$this->input->post('student_id',true);
    $data['student_name']=$this->input->post('student_name',true);
    $data['student_phone']=$this->input->post('student_phone',true);
    $data['student_session']=$this->input->post('student_session',true);
    $data['student_batch']=$this->input->post('student_batch',true);
    $data['email_address']=$this->input->post('email_address',true);
    $data['password']=$this->input->post('password',true);
    
    $this->db->insert('registration',$data);
   }
   public function save_question_info()
   {
   	$data=array();
    $data['question']=$this->input->post('question',true);
    $data['answer']=$this->input->post('answer',true);

    
    $this->db->insert('question',$data);
   }


   function search($searchData)
    {
        
        if ($searchData['student_name']) {
         $this->db->like('student_name',$searchData['student_name']);
        }
        if ($searchData['student_phone']) {
          $this->db->like('student_phone',$searchData['student_phone']);
        }
        if ($searchData['student_roll']) {
         $this->db->like('student.student_roll',$searchData['student_roll']);
        }
        if ($searchData['address']) {
          $this->db->like('address',$searchData['address']);
        }
        if ($searchData['subject']) {
          $this->db->like('subject',$searchData['subject']);
        }
        if ($searchData['year']) {
          $this->db->like('student.year',$searchData['year']);
        }
        if ($searchData['registration']) {
          $this->db->where('registration >=', $searchData['registration']);
        }
        if ($searchData['lregistration']) {
           $this->db->where('registration <=', $searchData['lregistration']);
        }
        /*if ($searchData['admin']) {
           $this->db->join("student", "student.admin_id = tbl_admin.admin_id",$searchData['admin']);
        }*/
         
       
        //$this->db->where("$searchData BETWEEN $registration AND $lregistration");    
        $query = $this->db->get('student');
        return $query->result();
    }

    public function number_rows()
    {
      $id=$this->session->userdata('student_id');
      $q=$this->db->select()
                  ->from('student')
                  ->where(['student_id=>$id'])
                  ->get();
      return $q->num_rows();
    }

    public function student_list($limit,$offset)
    {
      $id=$this->session->userdata('student_id');
      $q=$this->db->select()
                  ->from('student')
                  ->where(['student_id=>$id'])
                  ->limit($limit,$offset)
                  ->get();
      return $q->result();
    }

   public function get_division(){
    $this->db->select('*');
    $this->db->from('address');
  //$this->db->join('student', 'student.admin_id = tbl_admin.admin_id');
  //$query = $this->db->get();
  //$this->db->order_by("student name", "desc");

   $query_result=$this->db->get();

   $std_info=$query_result->result();
   return $std_info;
  }

  public function get_sub_category($category_id){
    $query = $this->db->get_where('sub_address', array('distict_division_id' => $category_id));
    return $query;
  }
  public function get_upozilla($category_id){
    $query = $this->db->get_where('upozilla', array('distict_id' => $category_id));
    return $query;
  }

  public function get_products(){
    $this->db->select('student_id,student_name,student_phone,student_roll,subject,address,year,registration,sex,admin_id,related_student,division_name,distict_name');
    $this->db->from('student');
    $this->db->join('address','student_division_id = division_id','left');
    $this->db->join('sub_address','student_distict_id = distict_id','left'); 
    $query = $this->db->get();
    return $query;
  }
}