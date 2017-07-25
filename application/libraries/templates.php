<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates {
	protected $CI;

    public function __construct() {
	 	$this->CI =& get_instance();
    }

    public function view_header($data) {
		$this->CI->load->view('templates/header', $data);
	}

	public function view_footer() {
		$this->CI->load->view('templates/footer');
	}

	public function view_edit_button($url) {
		echo '<a href="' . $url .'">Edit</a>';
	}

	public function view_btn_divider() {
		echo '|';
	}

	public function view_delete_button($url) {
		echo '<a href="' . $url . '">Delete</a>';
	}
}