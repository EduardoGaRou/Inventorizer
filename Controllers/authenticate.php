<?php

if(is_null(session_id())){
	
	//Check that parameters are set to URL
	if(isset($_GET['username']) && isset($_GET['pwd'])){
		$read_req = json_decode(file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/Inventorizer_v2/Controllers/readUser.php?username='.$_GET['username']),true);
		//The user data is correctly retrieved
		if(count($read_req) != 1){
			session_start();
			$_SESSION['userid'] = $read_req['displayname'];
			$_SESSION['lastAccess'] = date("Y-n-j H:i:s");
			echo "<script>window.location = '../Views/home.html'</script>";
		}
		//Only the logged error message is retrieved
		else {
			echo "<script>window.location = '../Views/login.html'</script>";
		}
	}
	//No parameters means a forced entry through URL was forced
	else {
		echo "<script>window.location = '../Views/login.html'</script>";
	}
}
else {
	
	$lastAccess = $_SESSION['lastAccess'];
	$now = date("Y-n-j H:i:s");
	$elapsed = strtotime($now) - strtotime($lastAccess);

	//Check elapsed seconds, 5 minutes of inactivity causes logout
	if($elapsed >= 300) {
		session_unset();
		session_destroy();
		echo "<script>window.location = '../Views/loggedout.html'</script>";
	}
	//Grants access if session timestamp is still valid
	else {
		$_SESSION['lastAccess'] = $now;
		echo "<script>window.location = '../Views/home.html'</script>";
	}
}

?>