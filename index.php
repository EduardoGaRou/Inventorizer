<?php
// Include Route class

include('./resources/config/Route.php');

//include_once("./Controllers/validateSession.php");

// Start page
Route::add('/',function(){
	include('./Views/login.html');
	//echo "Hola mundo";
});

// Register form
Route::add('/signup',function(){
	include('./Views/signup.html');
});

// Registered user (after signed up)
ROute::add('/registered',function(){
	include('./Views/registered.html');
});

// Logged out (session ended)
Route::add('/logout',function(){
	include_once('./Controllers/logout.php');
	include('./Views/loggedout.html');
});

// Main page
Route::add('/home',function(){
    include_once("./Controllers/validateSession.php");
    include('./Views/home.html');
});

// Items page inside home
Route::add('/items',function(){
    include_once("./Controllers/validateSession.php");
    include('./Views/items.html');
});

// Categories page
Route::add('/categories',function(){
    include_once("./Controllers/validateSession.php");
    include('./Views/categories.html');
});

// Stashes page
Route::add('/stashes',function(){ 
    include_once("./Controllers/validateSession.php");
    include ('./Views/stashes.html');
});

//echo "indexecho";
Route::run('/');

?>