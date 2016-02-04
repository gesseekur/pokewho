<?php 

	class User extends CI_Model{

	public function add_user($user) {
		$query= "INSERT INTO user(name,alias,email,password) 
				VALUES (?,?,?,?)";
		$values=array($user['name'], $user['alias'],$user['email'],$user['password']);
	 	$this->db->query($query,$values);
		$newUserID= $this->db->insert_id();
		if ($newUserID) {
			$query = "SELECT * FROM user WHERE id=$newUserID";
			return $this->db->query($query)->row_array();
		}
		return FALSE;
	}


	public function select_user($userData) {
		// var_dump($userData);
		// die();
		$query="SELECT * FROM user WHERE email=? AND password=?";
		$values=array($userData['email'], $userData['password']);
		return $this->db->query($query,$values)->row_array();
	}

	public function select_all() {
		return $this->db->query("SELECT * FROM user ORDER BY name")->result_array();
	}

	public function getUser($userID) {
		return $this->db->query("SELECT * FROM userwhere id=?", array($userID))->row_array();
	}

	public function getPokeCountForUser($userID) {
		$query="SELECT count(*) as poke_count FROM poke WHERE user_id=?";
		$values=array($userID);
		return $this->db->query($query,$values)->row()->poke_count;

	}

	public function getPokesFromForUser($userID) {
		$query="SELECT u.name,sum(p.poke_count) as poke_count FROM poke p JOIN user u ON p.poked_by_id = u.id WHERE p.user_id=? GROUP BY p.poked_by_id";
		$values=array($userID);
		return $this->db->query($query,$values)->result_array();

	}

	public function getTotalPokes() {
		$query= "SELECT u.id, u.name, u.alias, u.email, SUM(p.poke_count) as TOTAL_POKES FROM user u LEFT JOIN poke p on u.id = p.user_id WHERE u.id != ? GROUP BY u.id";
		return $this->db->query($query, [$this->session->userdata('currentUser')['id']])->result_array();
	}

	public function pokeUser($userID,$pokerID) {
		$query="INSERT INTO poke (user_id, poked_by_id, poke_count) VALUES (?,?,1) ON DUPLICATE KEY UPDATE poke_count=poke_count+1";
		$this->db->query($query,[$userID, $pokerID]);
	}
	// public function select_all($id) {
	// 	$query="SELECT * FROM user
	// 			WHERE id NOT in (SELECT id from user where id=?)";
	// 	$values=array($id);
	// 	return $this->db->query($query,$values)->result_array();
	// }

	// public function increase($counter){
	// 	$query="INSERT INTO poke(poked_id,poke_id) 
	// 			VALUES (?,?)";
	// 	$values=array($counter['poked'],$counter['poke']);
	// 	return $this->db->query($query,$values);

	// }

	// public function update($sum,$counter){
	// 	$query="UPDATE user SET count=? WHERE id=?";
	// 	$values=array($sum,$counter['poked']);
	// 	return $this->db->query($query,$values)->row_array();
	// }

	// public function name() {
	// 	$query="SELECT * from user 
	// 			LEFT JOIN poke on user.id = poke.poke_id 
	// 			LEFT JOIN user as user2 on user2.id = poke.poked_id";
	// 	return $this->db->query($query)->result_array();
	// }
}
