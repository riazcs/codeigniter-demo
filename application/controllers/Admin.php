<?php
defined('BASEPATH') OR exit('No direct script access allow');
class Admin extends CI_Controller
{
       function __construct(){
           parent::__construct();
           $this->load->model('admin_model');
           $this->load->library('session');
        }
      public function admin_login()
      {
          $email_address=$this->input->post('email_address',true);
          $password=$this->input->post('password',true);
          $this->load->model('admin_model');
          $result=$this->admin_model->admin_model_info($email_address,$password);
         
          $sdata=array();
          if ($result) {

          $sdata['admin_id'] = $result->admin_id;
          $sdata['admin_name'] = $result->admin_name;
          $this->session->set_userdata($sdata); 
          
          redirect('dashboard');
          # code...
          }
          else
          {

          $sdata['message']='Email or password is invalid';
          $this->session->set_userdata($sdata); 
          redirect(base_url());
          }
           /*$data=array();
           $data['admin_main_content']=$this->load->view('pages/admin_login','',true);
           $this->load->view('dashboard',$data);*/
      
      }

      public function logout()
      {
        $this->session->unset_userdata['admin_id'];
        $this->session->unset_userdata['admin_name'];
        $sdata['message']='logout successfully';
        $this->session->set_userdata($sdata);
        redirect(base_url());
      }
  
      public function backend()
      {
          $this->load->view('pages/admin_login');
      }

      public function add_student()
      {
         // $data=array();
          $this->load->model('admin_model','am');
          $data['admin_main_content'] = $this->am->get_division();
          //$data['admin_main_content']=$this->load->view('pages/add_student','',true $data);
          $this->load->view('dashboard',$data);
      }

     

      public function edit_admin()
      {
          $data=array();
          $data['admin_main_content']=$this->load->view('pages/edit_admin','',true);
          $this->load->view('dashboard',$data);
      }

      public function dashboard()
      {
          $data=array();
          $data['admin_main_content']=$this->load->view('pages/admin_index','',true);
          $this->load->view('dashboard',$data);
      }

      public function save_student()
      {
        $this->admin_model->save_student_info();
        $sdata=array();
        $sdata['message']='student added successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-student');
      }
       

       public function manage_admin()
       {
           $data=array();
         $data['all_admin_info']=$this->admin_model->all_admin_info();

          /*$url='http://localhost:8080/citry/api/user/Userdata/sdata';
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_URL, $url);
          $response = curl_exec($ch);
          curl_close($ch);
          $data['admin_main_content'] = json_decode($response);*/
          $data['admin_main_content']=$this->load->view('pages/manage_admin',$data,true); 
          
          $this->load->view('dashboard',$data);
       }

       
       public function manage_student()                 
      {
        
          //$data=array();
          // $data['all_student_info']=$this->admin_model->all_student_info();

          $this->load->model('admin_model','am');

          $this->load->library('pagination');
          $config=[
               'base_url'=>base_url('admin/manage_student'),
               'per_page'=>4,
               'total_rows'=>$this->am->number_rows(),
               'full_tag_open'=>"<span class='pagination' class='btn btn-primary'>",
               'full_tag_close'=>"</span>",
               //'next_link'=>'Continue',
               'next_tag_open'=> '<span class="btn btn-primary">',
               'next_tag_close' => '</span>',
               //'next_tag_open' =>"<li>",
              // 'next_tag_close' =>"</li>",
               'prev_tag_open' =>'<span class="btn btn-primary">',
               'prev_tag_close' =>"</span>",
               'num_tag_open' =>'<span class="btn btn-primary">',
               'num_tag_close' =>"</span>",
               'cur_tag_open' =>"<span class='active' class='btn btn-primary'><a>",
               'cur_tag_close' =>"</a></span>"
          ];

          $this->pagination->initialize($config);
          $studentList=$this->am->student_list($config['per_page'],$this->uri->segment(3));
          $data['all_student_info']=$studentList;
          $data['all_admin_info']=$this->am->all_admin_info();
          //$data['all_admin_info']=$this->am->all_student_info();
           // $data['all_admin_info']=$this->db->get('tbl_admin')->result();
          //$this->load->view('pages/manage_student',['student'=>$studentList]);

          /*$url = 'http://localhost:8080/citry/api/user/Userdata/data';
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_URL, $url);
          $response = curl_exec($ch);
          curl_close($ch);*/
          //$data['admin_main_content'] = json_decode($response);

          // echo "<pre>";
          // print_r($data['admin_main_content']);
          // exit();
           
          $data['admin_main_content']=$this->load->view('pages/manage_student',$data,true);
          $this->load->view('dashboard',$data);
          
      }


      public function edit_student($student_id)
      {

       $data=array();
       $data['all_student_info_by_id']=$this->admin_model->all_student_info_by_id($student_id);
       $data['admin_main_content']=$this->load->view('pages/edit_student','',true);
       $this->load->view('pages/edit_student',$data);
      }
      public function delete_student($student_id)
      {
        $this->admin_model->delete_student_by_id($student_id);
        $sdata=array();
        $sdata['message']='Student delete successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-student');
      }

      public function update_student()
      {
        $this->admin_model->update_student_info();
        $sdata['message']='Update successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-student');
      }

      public function save_admin()
      {
        $this->admin_model->save_admin_info();
        $sdata=array();
        $sdata['message']='Admin added successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-admin');
      }
      public function user_registration()
      {
        $this->load->view('pages/user_registration');
      }
     
      public function registration_info()
      {
        $this->admin_model->save_registration_info();
        $sdata=array();
        $sdata['message']='Registration successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-student');
      }
      public function add_question()
      {
        $data=array();
        $data['admin_main_content']=$this->load->view('pages/add_question','',true);
        $this->load->view('dashboard',$data);
      }
      public function save_question()
      {
        $this->admin_model->save_question_info();
        $sdata=array();
        $sdata['message']='Question added successfully';
        $this->session->set_userdata($sdata);
        redirect('manage-student');
      }
      

      public function crud_operation()
      {
        $this->load->view('pages/crud_operation');
      }


      function search_keyword()
     {   
         $originalstartDate = $this->input->post('registration');
         $startDate = date("d-m-Y", strtotime($originalstartDate)); 

         $originalendDate = $this->input->post('lregistration');
         $endDate = date("d-m-Y", strtotime($originalendDate)); 
        
         $student_name=$this->input->post('student_name');
         $student_phone=$this->input->post('student_phone');
         $student_roll=$this->input->post('student_roll');
         $address=$this->input->post('address');
         $subject=$this->input->post('subject');
         $year=$this->input->post('year');
         $registration=$this->input->post('registration');
         $lregistration=$this->input->post('lregistration');
         //$admin=$this->input->post('admin');
         $searchData = array(
         'student_name'=>$student_name,
         'student_phone'=>$student_phone,
         'student_roll'=>$student_roll,
         'address'=>$address,
         'subject'=>$subject,
         'year'=>$year,
         'registration'=>$registration,
         'lregistration'=>$lregistration,
         //'admin'=>$admin,


         );       
        $data['admin_main_content'] = $this->admin_model->search($searchData);

        // echo "<pre>";
        // print_r($data['admin_main_content']);
        // exit();

        $data['admin_main_content']=$this->load->view('pages/manage_student',$data,true);
        $this->load->view('dashboard',$data);
    }


    public function saveStudentId()
    {      

       $data=array(
       'related_student'=>implode(",", $this->input->post('students_id'))
       );
       $this->db->insert('student',$data);
    }

    public function get_sub_category(){
    $category_id = $this->input->post('id',TRUE);
    $data = $this->admin_model->get_sub_category($category_id)->result();
    echo json_encode($data);
  }

  public function get_upozilla(){
    $category_id = $this->input->post('id',TRUE);
    $data = $this->admin_model->get_upozilla($category_id)->result();
    echo json_encode($data);
  }

}