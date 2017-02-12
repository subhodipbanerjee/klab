<?php
	ob_start();
	session_start();
	// set timezone
	// date_default_timezone_set('Asia/India');
	// database credentials
	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPASS','subhodip');
	define('DBNAME','klab');
	//application address
	define('BASE_URL','http://localhost/klab');
	define('SITEEMAIL','noreply@domain.com');
	try {
		$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo '<p class="bg-danger">'.$e->getMessage().'</p>';
	  exit;
	}
	include('classes/user.php');
	include('classes/phpmailer/mail.php');
	$user = new User($db);
?>
