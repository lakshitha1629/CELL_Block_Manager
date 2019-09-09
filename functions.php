<?php
session_start();

    require_once ('connect.php');

    // call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

    function login(){
		global $con, $username, $errors;

		// grap form values
		$username = e($_POST['Username']);
		$password = e($_POST['password']);

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			//$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
            $query ="SELECT * FROM `cbm_user_account` WHERE `user_name`='$username' AND `password`='$password' LIMIT 1";
            $results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == '1') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: Admin_dashboard.php');		  
                }else if($logged_in_user['user_type'] == '2'){
                    $_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: dashboard_Requestor.php');


                }else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: dashboard.php');
				}
			}else {
				echo "Wrong username/password combination";
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == '1' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $con;
		return mysqli_real_escape_string($con, trim($val));
	}

	// function display_error() {
	// 	global $errors;

	// 	if (count($errors) > 0){
	// 		echo '<div class="error">';
	// 			foreach ($errors as $error){
	// 				echo $error .'<br>';
	// 			}
	// 		echo '</div>';
	// 	}
	// }




?>