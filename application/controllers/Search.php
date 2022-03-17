<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct(){
        parent::__construct();
		if(!$this->session->has_userdata('isLoggedIn')){
			$this->session->set_flashdata('forbidden_access', 'Kindly login or register to access content.');
			redirect('form/login');
		}
    }

    public function results(){

        $searchData = $this->input->post('search');

        $per_page = 16;

        $searchNumRows = $this->Picture_model->get_pictures_results_numrows($searchData);

		$config = [
			'base_url' => base_url()."search/results/",
			'total_rows' => $searchNumRows,
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
			'result_title' => $searchData,
			'user_uploads' => $this->Picture_model->get_picturesLimitOffsetSearch($searchData, $per_page, $this->uri->segment(3)),
			'links' => $this->pagination->create_links(),
			'prompt' => ""
		];

        $this->load->view('nav/navbar');
        $this->load->view('search_view', $data);
    }

	public function view(){

		$picture_id = $this->uri->uri_to_assoc(1);
		$this->Picture_model->update_picture_views($picture_id['picture_id']);
		$getPictureData = $this->Picture_model->get_single_picture($picture_id['picture_id']);
		$picture_tags = explode(" ", $getPictureData[0]->tags);

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
			'links' => $this->pagination->create_links(),
			'prompt' => $this->session->flashdata('prompt'),
			'error' => $this->session->flashdata('error'),
			'picture_data' => $getPictureData,
			'picture_tags' => $picture_tags,
			'curr_picture' => $picture_id,
			'similar' => $this->Picture_model->getSimilarPhotos($picture_tags)
		];

		$this->load->view('nav/navbar');
        $this->load->view('viewImage', $data);
	}

	public function addLike(){
		$picture_id = $this->uri->segment(3);
		$this->Picture_model->incrementLikes($picture_id);
	}

	public function removeLike(){
		$picture_id = $this->uri->segment(3);
		$this->Picture_model->decrementLikes($picture_id);
	}
}
