<?php
// headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// database and user model
include "../resources/config/dbcomm.php";
include "../Models/user.php";

$database = new Dbcomm();
$db = $database->getConnection();

$user = new User($db);

if(isset($_SESSION['userid']) && isset($_SESSION['username']) && isset($_SESSION['displayid']) && isset($_SESSION['emailreg']) && isset($_SESSION['ciphpass'])) {
	$data['id'] = $_SESSION['userid'];
	$data['username'] = $_SESSION['username'];
	$data['email'] = $_SESSION['emailreg'];
	$data['displayname'] = $_SESSION['displayid'];
	$data['password'] = $_SESSION['ciphpass'];
}
else {
	echo "<script>window.location='/Inventorizer/userSettings'</script>";
}

//$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
	
	$user->id = $data['id'];
	$user->username = $data['username'];
	$user->email = $data['email'];
	$user->displayname = $data['displayname'];
	$user->password = $data['password'];

	if($user->update()) {
		// response 202 - Accepted
		http_response_code(202);
		// message for user
		//echo json_encode(array("log" => "The requested user was updated! :^)"));
		echo "<script>window.location='/Inventorizer/userSettings'</script>";
	}
	else {
		// response 404 - Not Found
		http_response_code(404);
		// message for user
		//echo json_encode(array("log" => "ID not recognized for update! :^("));
		echo "<script>window.location='/Inventorizer/userSettings'</script>";
	}
}
else {
	// response 400 - Bad Request
	http_response_code(400);
	// message for user
	//echo json_encode(array("log" => "Invalid ID entry to fulfill the service. :^("));
	echo "<script>window.location='/Inventorizer/userSettings'</script>";
}

?>