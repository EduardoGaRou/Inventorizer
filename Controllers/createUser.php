<?php
// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// database and user model
include "../resources/config/dbcomm.php";
include "../Models/user.php";

$database = new Dbcomm();
$db = $database->getConnection();

$user = new User($db);

if(isset($_GET['username']) && isset($_GET['displayname']) && isset($_GET['email']) && isset($_GET['password'])) {
	$data->username = $_GET['username'];
	$data->displayname = $_GET['displayname'];
	$data->email = $_GET['email'];
	$data->password = $_GET['password'];
}
else {
	echo "<script>window.location='../Views/signup.html'</script>";
}

//$data = json_decode(file_get_contents("php://input"));

if(
	!empty($data->username) && !empty($data->password) &&
	!empty($data->displayname) && !empty($data->email)
){
	$user->id = $data->id;
	$user->username = $data->username;
	$user->email = $data->email;
	$user->displayname = $data->displayname;
	$user->password = $data->password;
	$user->deleted = 0;

	if($user->create()) {
		// response 201 - Created
		http_response_code(201);
		// message for user
		//echo json_encode(array("log" => "The requested user was created! :^)"));
		//Navigate to 'registered.html' screen
		echo "<script>window.location='../Views/registered.html'</script>";
	}
	else {
		// response 500 - Internal Server Error
		http_response_code(500);
		// message for user
		echo json_encode(array("log" => "An error occurred with the service. :^("));
	}
}
else {
	// response 400 - Bad Request
	http_response_code(400);
	// message for user
	echo json_encode(array("log" => "Invalid entry! Parameters cannot be null. :^("));
}
?>