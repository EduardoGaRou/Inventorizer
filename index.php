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
Route::add('/registered',function(){
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
    include ('./Views/stashes.php');
});

//Categories page (stash filter)
Route::add('/fromStash/([0-9]*)/categories',function($var1){
    include_once("./Controllers/validateSession.php");
});

//Items page (stash filter)
Route::add('/fromStash/([0-9]*)/items',function($var1){
    include_once("./Controllers/validateSession.php");
});

//Items page (category filter)
Route::add('/fromCategory/([0-9]*)/items',function($var1){
    include_once("./Controllers/validateSession.php");
});

//echo "indexecho";
Route::run('/');

?>