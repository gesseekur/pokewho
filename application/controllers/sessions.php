<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
	public function index() {
		$this->load->view('register_login');
	}

	public function register() {
		$this->load->model('User');
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('alias', 'Alias', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[conpw]|min_length[8]');
		$this->form_validation->set_rules('conpw', 'Password confirmation', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required|date_valid');
		if ($this->form_validation->run()) {
			$user = $this->User->add_user($this->input->post());
			if ($user) {
				$this->session->set_userdata('currentUser', $user);
				$this->session->set_flashdata('msg', 'User successfully created!');
				   redirect('/');
			}
		
			else {
				$this->session->set_flashdata('msg', 'An error occurred while registering, please try again');
				redirect('/');
			}
		}

		else {
			$this->session->set_flashdata('msg', validation_errors());
			redirect('/');
		}
	}	

	public function login() {
		$this->load->model('User');
		// var_dump($this->input->post());
		// die()   
		if (strlen($this->input->post('email')) == 0 || strlen($this->input->post('password')) == 0) {
			redirect('/');
		}
		else {
			$User=$this->User->select_user($this->input->post());
			// var_dump($User);
			// die();
			if($User) {
				$this->session->set_userdata('currentUser', $User);
				redirect('/users/show');
			}
			else {
				$this->session->set_flashdata('invalid', 'Invalid Username or Password');
				redirect('/');
			}
		}
	
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}


}