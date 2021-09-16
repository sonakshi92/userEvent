<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->helper("security");
        $this->load->helper('date');
    }

    public function index()
	{
        $chkAdminExist = $this->Admin_model->chkAdminExist();
	//	echo $chkAdminExist; exit;
        $data['title'] = "Welcome to User Events";
		$this->load->view('include/header', $data);
        $this->load->view('task/welcome', ['chkAdminExist'=>$chkAdminExist]);
		$this->load->view('include/footer');
	}

    public function asignup()
	{
           // if(!$this->session->autenticated){
             // $this->session->set_flashdata('message', 'Please Login Admin');
             // redirect('admin/asignin');
            //} else
            //{
                $data['title'] = "Admin Sign up";
                $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[12]');
                $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[admin.email]');
                $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
                $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[password]');
                $this->form_validation->set_rules('mobile', 'mobile', 'required|min_length[10]|max_length[10]');
                //|regex_match[/^[0-9]{10}$/]
                
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('include/header', $data);
                    $this->load->view('task/asignup');
                    $this->load->view('include/footer');
                } else{
                //echo'<pre>'; print_r($_POST); 
                $admindata = array(
                    'name' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'password' => md5($this->input->post('password', TRUE)),
                    'mobile' => $this->input->post('mobile', TRUE),
                    'a_created_at' => date('Y-m-d H:i:s', time()),
                );
                $this->Admin_model->save($admindata);
                $this->session->set_flashdata('message', 'Registration of Admin is successful');
                redirect('admin/adata');
                }
            //}
	}

   
    public function asignin()
	{
        if( $this->session->autenticated){
            $this->session->set_flashdata('message', 'Already Logged in');
            redirect('admin/adata');
          } else
          {
            $data['title'] = "Admin Login";

            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

                if($this->form_validation->run() == false)
                {
                    $this->load->view('include/header', $data);
                    $this->load->view('task/asignin', $data);
                    $this->load->view('include/footer', $data);
                } 
                else{
                    $email = $this->security->xss_clean($this->input->post('email'));
                    $password = $this->security->xss_clean($this->input->post('password'));

                    $admin = $this->Admin_model->login($email, $password);
                    //echo "<pre>"; print_r($admindata);
                if($admin){
                    $admindata = array(
                        'id' => $admin->id,
                        'name' =>$admin->name,
                        'mobile' => $admin->mobile,
                        'autenticated' => TRUE
                    );
                     //echo "<pre>"; print_r($admindata);

                    $this->session->set_userdata($admindata);
                     // print_r($_SESSION); exit; 
                    redirect('admin/adata');
                }
                else
                {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('admin/asignin');
                }
            }
        }
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/index');
    }

    public function adata()
	{
        if(! $this->session->autenticated){
          $this->session->set_flashdata('message', 'Please Login admin');
          redirect('admin/asignin');
        } else
        {
            $data['title'] = "Admin Details";
            $this->load->view('include/header', $data);
            $this->load->view('task/adata');
            $this->load->view('include/footer');
        //    redirect('admin/asignin');
	    }
    }

    public function usignup()
	{
        if(! $this->session->autenticated){
        $this->session->set_flashdata('message', 'Please Login admin');
        redirect('admin/asignin');
        } else
        {
            $data['title'] = "User Sign up";
            $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[password]|min_length[8]');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if($this->form_validation->run() == FALSE){
                $this->load->view('include/header', $data);
                $this->load->view('task/usignup');
                $this->load->view('include/footer');
            } else{
            //echo'<pre>'; print_r($_POST); 
            $userdata = array(
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'u_created_at' => date('Y-m-d H:i:s', time()),
            );
            $this->User_model->save($userdata);
            $this->session->set_flashdata('message', 'Registration of User is successful');
            redirect('admin/adata');
            }
        }
	}

    public function getusers()
	{
        if(! $this->session->autenticated){
            $this->session->set_flashdata('message', 'Please Login ADMIN');
            redirect('admin/asignin');
          } else
          {
            $data['title'] = "Display Users";
            $user = $this->Admin_model->getuser();
           // echo '<pre>'; print_r($user); 
            $data['userdata'] = $user;
            
            $this->load->view('include/header', $data);
            $this->load->view('task/displayusers');
            $this->load->view('include/footer');
          }
	}

    public function viewEvent($id){
        if(! $this->session->autenticated){
            $this->session->set_flashdata('message', 'Please Login ADMIN');
            redirect('admin/asignin');
          } else
          {
            $data['title'] = "Display Events Created by users";
            $getevent = $this->Admin_model->viewEvent($id);
            //echo '<pre>'; print_r($getevent); 
            $data['viewEvent'] = $getevent;
            $data['totalEvent']= count($getevent);
            $this->load->view('include/header', $data);
            $this->load->view('task/viewEvents');
            $this->load->view('include/footer');
          }
    }
}
