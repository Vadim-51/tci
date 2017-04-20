<?php
require "PDOconnect.php";
session_start();

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['captcha'])){

$user_name = $_POST['username'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$user_Rpassword = $_POST['rpassword'];
date_default_timezone_set("Europe/Kiev");
$joining_date = date('Y-m-d H:i:s');
$captcha = $_POST['captcha'];
   if(!empty($user_name) && !empty($user_email) && !empty($user_password) && !empty($captcha) && !empty($user_Rpassword)){
    if(strlen($user_name) >= 3 && strlen($user_password) >= 5 && strlen($user_password) <= 15 &&
	   strlen($user_Rpassword) >= 5 && strlen($user_Rpassword) <= 15 && strlen($captcha) == 5){
	   if($user_password==$user_Rpassword){
	   if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
         $password = password_hash($user_password, PASSWORD_BCRYPT);

if(isset($_SESSION['captcha']) && $captcha==$_SESSION['captcha']){
try{
     $smt = $db->prepare("SELECT * FROM user_tci WHERE Uemail=:email");
	 $smt->bindParam(":email", $user_email);
	 $smt->execute();
	 $count = $smt->fetchAll();
	 
	 if(count($count)==0){
	 $smt = $db->prepare("INSERT INTO user_tci (Uname, Uemail, Upass, Jdate) VALUES(
	                           :uname, :email, :pass, :jdate)");
	
	 $smt->bindParam(":uname", $user_name);
	 $smt->bindParam(":email", $user_email);
	 $smt->bindParam(":pass", $password);
	 $smt->bindParam(":jdate", $joining_date);
	 $smt->execute();
	
	 
     if($smt){
	  echo '2';
	  $_SESSION['valid_user'] = $user_name;
	 }else{
	  echo '3';
	 }
	  
    }else{
	  echo '1';
	}
}catch(Exception $e){
      echo $e->getMessage();
}
}else{
    echo '4';
}

}else{
//Validate email
    echo '5';
}
}//Check if password was reptyped properly
}//Check if user typed in enough characters
}//Check if a user filled out all required fields
}//Check if all data from form is set













?>





























