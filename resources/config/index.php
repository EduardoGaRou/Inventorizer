<?php
// Include Route class
include('Route.php');

include_once("../../Controllers/validateSession.php");

// Start page
Route::add('/home',function(){
    include('home.html');
});

// Items page inside home
Route::add('/items',function(){
    include('items.html');
});

// Categories page
Route::add('/categories',function(){
    include('categories.html');
});

// Stashes page
Route::add('/stashes',function(){ 
    include ('stashes.html');
});

//echo "indexecho";
Route::run('/home');
?>