<?php
require_once 'classes/Route.php';
require_once 'controllers/Appointment.php';
require_once 'controllers/user.php';
Route::set('read',function(){
    creneaux::read();
});
Route::set('TimeDispo',function(){
    creneaux::singleread();
});
Route::set('create',function(){
    creneaux::create();
});
Route::set('update',function(){
    creneaux::update();
});
Route::set('delete',function(){
    creneaux::delete();
});
Route::set('login',function(){
   user::login();
});
Route::set('register',function(){
    user::register();
 });