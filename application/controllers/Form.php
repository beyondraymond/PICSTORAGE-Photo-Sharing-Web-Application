<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Temporary Login Controller

class Form extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('isLoggedIn')){
            redirect('homepage/dashboard');
        }
        $this->load->helper('string');
    }

    public function login(){
        $data = [
            'success' => "",
            'error' => $this->session->flashdata('forbidden_access'),
        ];

        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $validateUser = $this->Form_model->validateUser([
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ]);
        
        if ($this->form_validation->run() == FALSE){
            $data['success'] = '';
            $this->load->view('form/login', $data);
        }else {
            if($validateUser[0] && $validateUser[1]){
                $data['success'] = $validateUser;
                $this->load->view('form/login', $data);
                $id = $this->Form_model->getUserId([
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                ]);
    
                $sessionData = [
                    'isLoggedIn' => TRUE,
                    'userId' => $id
                ];
    
                $this->session->set_userdata($sessionData);
                redirect('homepage/dashboard/');
            }else if(!$validateUser[0]){
                $data['error'] = "Username/Password Incorrect";
                $this->load->view('form/login', $data);
            }else if(!$validateUser[1]){
                $data['error'] = "Check email for verification";
                $this->load->view('form/login', $data);
            }
        }
    }

    public function register(){

        $config = [
			"upload_path" => './uploads/',
			"allowed_types" => "gif|png|jpg|jpeg"
		];

        $generatedCode = random_string('alnum', 20);

		$this->upload->initialize($config);
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('form/registration');
		}else{	
			if (!$this->upload->do_upload('profilepic')) {
				$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('prompt', $error);
                redirect('form/register');
			} else {
				$data = $this->upload->data('file_name');
				$this->Form_model->addUser([
					'first_name'=> $this->input->post('firstname', true),
					'last_name'=> $this->input->post('lastname', true),
					'email'=> $this->input->post('email', true),
					'password'=> $this->input->post('password', true),
					'profile_pic'=> $data,
                    'verification_code' => $generatedCode,
                    'verification_status' => 0
				]);

                $this->sendMail($generatedCode, $this->input->post('email', true));
				$this->session->set_flashdata('prompt', "Registration Successful! Check email for verification");
                redirect('form/login');
			}
		}
    }

    public function sendMail($generatedCode, $userEmail){

        $data = [
            'verification_code' => $generatedCode
        ];

        $this->load->library('email');
        $this->email->from('picstorageincorporated@gmail.com','Picstorage Verification');
		$this->email->to($userEmail);
		$this->email->subject('EMAIL VERIFICATION');

        // $messageBody = "<h1>By clicking this <a href='localhost/finalProject/form/verify/".$generatedCode."'></a>, you will be able share your moments!</h1>";
        // $this->email->message($messageBody);

        // Not working, href getting disabled everytime
		$this->email->message($this->load->view('email_body', $data, TRUE));

		if($this->email->send()){
			echo "Email sent successfully";
		}
		else{
			echo $this->email->print_debugger();
		}
    }

    public function verify(){
        $verification_code = $this->uri->segment(3);
        $this->Form_model->changeVerificationStatus($verification_code);
        redirect('form/login');
    }
}