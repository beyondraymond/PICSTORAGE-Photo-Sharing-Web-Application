<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('isLoggedIn')){
			$this->session->set_flashdata('forbidden_access', 'Kindly login or register to access content.');
			redirect('form/login');
		}
	}

	public function dashboard()
	{
		$id = $this->session->userdata('userId');

		$per_page = 16;

		$config = [
			'base_url' => base_url()."homepage/dashboard/",
			'total_rows' => $this->Picture_model->get_pictures_numrows($id),
			'per_page' => $per_page,
			'full_tag_open' => '<nav aria-label="Page navigation">
									<ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul>
								</nav>',
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active page-item">',
			'cur_tag_close' => '</li>',
			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>'
		];

		$this->pagination->initialize($config);

		$data = [
			'user_info' => $this->User_model->get_person($id, 'user_id'),
			'user_uploads' => $this->Picture_model->get_picturesLimitOffset($id, $per_page, $this->uri->segment(3)),
			'links' => $this->pagination->create_links(),
			'prompt' => $this->session->flashdata('prompt'),
			'error' => $this->session->flashdata('error')
		];

		$this->load->view('nav/navbar');
        $this->load->view('homepage_view', $data);
	}

	public function uploadImage(){

		$this->form_validation->set_rules('tags', 'Tags', 'trim|required');

		$id = $this->session->userdata('userId');

		$config = [
			"upload_path" => './uploads/',
			"allowed_types" => "gif|png|jpg|jfif|jpeg"
		];

		$data = [
			'success' => "",
			'error' => ""
		];

		$this->upload->initialize($config);

		if ($this->form_validation->run() == FALSE){
			$this->load->view('nav/navbar');
			$this->load->view('uploadPhoto_view.php', $data);
		} else {
			if ($this->upload->do_upload('image')) {
				$imageData = $this->upload->data('file_name');
	
				$this->Picture_model->upload_picture([
					'user_id'=> $id,
					'picture_name'=> $imageData,
					'likes'=> 0,
					'views'=> 0,
					'tags' => $this->input->post('tags')
				]);
				$data['success'] = "Successfully uploaded $imageData!";
				$this->load->view('nav/navbar');
				$this->load->view('uploadPhoto_view.php', $data);
			} else {
				$data['error'] = array('error' => $this->upload->display_errors());
				$this->load->view('nav/navbar');
				$this->load->view('uploadPhoto_view.php', $data);
			}
		}
	}

	public function editProfile(){
		$id = $this->session->userdata('userId');
		$config = [
			"upload_path" => './uploads/',
			"allowed_types" => "gif|png|jpg|jpeg"
		];

		$data = [
			'success' => '',
			'error' => '',
			'user_info' => ''
		];

		$this->upload->initialize($config);
		$this->form_validation->set_rules('fName', 'First Name', 'required');
		$this->form_validation->set_rules('lName', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$data['user_info'] = $this->User_model->get_person($id, "user_id");
			$this->load->view('nav/navbar');
			$this->load->view('editProfile_view', $data);

		}else{	
			if (!$this->upload->do_upload('image')) {
				$data['error'] = array('error' => $this->upload->display_errors());
				$data['user_info'] = $this->User_model->get_person($id, "user_id");
				$this->load->view('nav/navbar');
				$this->load->view('editProfile_view', $data);

			} else {
				$result = $this->User_model->get_person($id, 'user_id');
				unlink("uploads/".$result[0]->profile_pic);
				$imageData = $this->upload->data('file_name');
				$this->User_model->update_person($id, [
					'first_name'=> $this->input->post('fName', true),
					'last_name'=> $this->input->post('lName', true),
					'email'=> $this->input->post('email', true),
					'password'=> $this->input->post('password', true),
					'profile_pic'=> $imageData
				]);
				$data['success'] = "Profile Update Successful!";
				$data['user_info'] = $this->User_model->get_person($id, "user_id");
				$this->load->view('nav/navbar');
				$this->load->view('editProfile_view', $data);
			}	
		}
	}

	public function deleteImage($picture_id){
		$user_id = $this->session->userdata('userId');
		$result = $this->Picture_model->get_single_picture($picture_id);
		unlink("uploads/".$result[0]->picture_name);
		$this->Picture_model->delete_picture($picture_id);
		$this->session->set_flashdata('prompt', 'A photo has been successfully deleted.');
		redirect('homepage/dashboard');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('form/login');
	}
}
