<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function show() {
		$currentUserID= $this->session->userdata('currentUser')['id'];
		$this->load->model('User');
		
		$output = [
			'pokeCount' => $this->User->getPokeCountForUser($currentUserID),
			'pokeArray'=> $this->User->getPokesFromForUser($currentUserID),
			'totalPokesArray' => $this->User->getTotalPokes()
		];
		// var_dump($output);
		// die();
		$this->load->view('pokepage',$output);
	}

	public function pokeUser($userID,$pokedByID) {
		$this->load->model('User');
		$this->User->pokeUser($userID,$pokedByID);
		redirect('/users/show');
	}

}
