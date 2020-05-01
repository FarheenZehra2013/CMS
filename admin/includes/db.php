<?php

//the mysqli function allows you to acces to the database

//mysqli_connect('localhost','root','','cms');

//now assign a varaiable

$connection = mysqli_connect('localhost','root','','cms',3308);

//if statement returns true or false

if($connection){

echo "we are connected";

}

//another way to connect database using constants.
/*
$db['db_host']="localhost";
$db['db_username']="root";
$db['db_password']="";
$db['db_name']="cms";

//for eachloop is using for looping through the values of an array
//constant are static

foreach($db as $key=>$value){
    define(strtolower($key),$value);
}

$connection= mysqli_connect('db_host','db_username',
'db_password','db_name',3308);
if($connection){

    echo 'we are connected';
}*/

//nnott working due to some reason


?>