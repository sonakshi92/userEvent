<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper("security");
        $this->load->helper('date');
    }

    public function index()
	{
        $data['title'] = "Sign up User";
		$this->load->view('include/header', $data);
        $this->load->view('task/welcome');
		$this->load->view('include/footer');
	}

   
    public function usignin()
	{
        if( $this->session->autenticate){
            $this->session->set_flashdata('message', 'Already Logged in');
            redirect('user/udata');
          } else
          {
            $data['title'] = "User Login";

            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

                if($this->form_validation->run() == false)
                {
                    $this->load->view('include/header', $data);
                    $this->load->view('task/usignin');
                    $this->load->view('include/footer');
                } 
                else{
                    $email = $this->security->xss_clean($this->input->post('email'));
                    $password = $this->security->xss_clean($this->input->post('password'));

                    $user = $this->User_model->login($email, $password);
                    //echo "<pre>"; print_r($userdata);
                if($user){
                    $userdata = array(
                        'id' => $user->id,
                        'name' =>$user->name,
                        'autenticate' => TRUE
                    );
                    //echo "<pre>"; print_r($userdata);

                    $this->session->set_userdata($userdata);
                    //print_r($_SESSION); 
                    redirect('user/udata');
                }
                else
                {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('user/usignin');
                }
            }
        }
	}

   
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/usignin');
    }

    public function udata()
    {
        if(! $this->session->autenticate){
            $this->session->set_flashdata('message', 'Please Login User');
            redirect('user/usignin');
          } else
          {
                $uid = $this->session->userdata('id');
                $event = $this->User_model->getusers($uid);
                $data['count_event']= count($event); 
                $data['title'] = "Create Event";

                $this->form_validation->set_rules('event', 'event', 'trim|required|is_unique[event.event]');
                $this->form_validation->set_rules('status', 'status', 'required');
                
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('include/header', $data);
                    $this->load->view('task/udata');
                    $this->load->view('include/footer');
                } else{
                //echo'<pre>'; print_r($_POST); 
                $eventdata = array(
                    'event' => $this->input->post('event', TRUE),
                    'uid' => $this->session->userdata('id'),
                    'status' => $this->input->post('status', TRUE),
                    'created_at' => date('Y-m-d H:i:s', time()),
                );
                $this->User_model->saveevent($eventdata);
                $this->session->set_flashdata('message', 'Event creation is successful');
                redirect('user/udata');

                }
            }
            
    }

    public function getevent()
	{
        if(! $this->session->autenticate){
            $this->session->set_flashdata('message', 'Please Login user');
            redirect('user/usignin');
          } else
          {
            $data['title'] = "User Events";
            $uid = $this->session->userdata('id');
            $event = $this->User_model->getevent($uid);
        //  echo '<pre>';
        //   print_r($event);
            // echo '</pre>';
            $data['eventdata'] = $event;
            
            $this->load->view('include/header', $data);
            $this->load->view('task/userevent');
            $this->load->view('include/footer');
          }
	}

    
}
