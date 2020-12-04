<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
 
	public function index_get($student_id = 0)
	{
        if(!empty($student_id)){
            $data = $this->db->get_where("student", ['student_id' => $student_id])->row_array();
        }else{
            $data = $this->db->get("student")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('student',$input);
     
        $this->response(['student created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($student_id)
    {
        $input = $this->put();
        $field = array(
        'student_name'=>$this->input->post('student_name'),
        'student_phone'=>$this->input->post('student_phone'),
        'student_roll'=>$this->input->post('student_roll')
        );
        /*$this->db->where('student_id', $student_id);
        $this->db->update('student', $field);*/
        $this->db->where('student_id',$student_id)->update('student',$field);
        $this->response(['student updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($student_id)
    {
        $this->db->delete('student', array('student_id'=>$student_id));
       
        $this->response(['student deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}