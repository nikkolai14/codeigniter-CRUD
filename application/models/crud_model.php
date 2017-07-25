<?php

class Crud_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_records() {
		$sql = 'SELECT * FROM users';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_specific_records($user_id) {
		$sql = "SELECT * FROM users WHERE id = ?";
		$query = $this->db->query($sql, array($user_id));
		return $query->row_array();	
	}

	public function add_entry() {
		$sql = "INSERT INTO users (name, email, phone, created) VALUES (?, ?, ?, ?)";

		$data = array(
			$this->input->post('name'),
			$this->input->post('email'),
			$this->input->post('phone'),
			date("Y-m-d H:i:s")
		);
		return $this->db->query($sql, $data);
	}

	public function delete_entry($user_id) {
		$sql = "DELETE FROM users WHERE id = ?";
		return $this->db->query($sql, array($user_id));
	}

	public function edit_entry($user_id) {
		$sql = "UPDATE users SET name = ?, email = ?, phone = ?, created = ? WHERE id = ?";

		$data = array(
			$this->input->post('name'),
			$this->input->post('email'),
			$this->input->post('phone'),
			date("Y-m-d H:i:s"),
			$user_id
		);
		return $this->db->query($sql, $data);
	}
}