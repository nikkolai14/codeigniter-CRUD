<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	private $page_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('templates', 'form_validation', 'session', 'table'));
		$this->load->model('crud_model');
	}

	public function index()
	{
		$this->page_data['title'] = 'CRUD Dashboard';

		// get user data fields
		$this->page_data['records'] = $this->crud_model->get_records();

		$this->templates->view_header($this->page_data);
		$this->load->view('home', $this->page_data);
		$this->templates->view_footer();
	}

	public function add_entry() {
		$this->page_data['title'] = 'CRUD Add Entry';
		$this->page_data['error_field'] = ($this->session->flashdata('error_field') == null) ? false  : $this->session->flashdata('error_field') ;
		$this->page_data['add_success'] = ($this->session->flashdata('add_success') == null) ? false  : $this->session->flashdata('add_success') ;

		$this->templates->view_header($this->page_data);
		$this->load->view('add_entry', $this->page_data);
		$this->templates->view_footer();
	}

	public function process_add_entry() {
		$this->form_validation->set_rules('name', 'Name', 'required');		
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_field', true);
			$this->session->set_flashdata('add_success', false);
            $this->add_entry();
        } else {
            $this->crud_model->add_entry();
            $this->session->set_flashdata('error_field', false);
            $this->session->set_flashdata('add_success', true);
            $this->add_entry();
        }
	}

	public function process_edit_entry() {
		$this->form_validation->set_rules('name', 'Name', 'required');		
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_field', true);
			$this->session->set_flashdata('add_success', false);
            $this->edit_entry();
        } else {
            $this->crud_model->edit_entry($this->input->post('id'));
            $this->session->set_flashdata('error_field', false);
            $this->session->set_flashdata('add_success', true);
            $this->edit_entry($this->input->post('id'));
        }
	}

	public function delete_entry($user_id) {
		$this->crud_model->delete_entry($user_id);
		redirect('crud');
	}

	public function edit_entry($user_id) {
		$this->page_data['title'] = 'CRUD Edit Entry';
		$this->page_data['error_field'] = ($this->session->flashdata('error_field') == null) ? false  : $this->session->flashdata('error_field') ;
		$this->page_data['add_success'] = ($this->session->flashdata('add_success') == null) ? false  : $this->session->flashdata('add_success') ;

		// get user data fields
		$this->page_data['records'] = $this->crud_model->get_specific_records($user_id);

		$this->templates->view_header($this->page_data);
		$this->load->view('edit_entry', $this->page_data);
		$this->templates->view_footer();
	}
}
