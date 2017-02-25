<?php
include('password.php');
class User extends Password{
  private $_db;
  function __construct($db){
  	parent::__construct();
  	$this->_db = $db;
  }

	private function get_user_hash($username){
		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE email = :username OR mobile_no = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$stmt = $stmt->fetch();
			return $stmt;
		} catch(PDOException $e) {
		  echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
		}
	}

	public function login($username,$password){
		$row = $this->get_user_hash($username);
		if($this->password_verify($password,$row['password']) == 1) {
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $row['username'];
	    $_SESSION['memberID'] = $row['memberID'];
	    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
}
?>
