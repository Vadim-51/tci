<?php
require "PDOconnect.php";
session_start();
  if(isset($_POST['username']) && isset($_POST['password'])){
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
	if(!empty($user_name ) && !empty($user_password)){
	  if( strlen($user_name) >= 3 && strlen($user_password) >= 5 && strlen($user_password) <= 15){
      
try{
     $smt = $db->prepare("SELECT * FROM user_tci WHERE Uname=:username");
	 $smt->bindParam(":username", $user_name);
	 $smt->execute();
	 $count = $smt->fetchAll(PDO::FETCH_ASSOC);
	 
	 
	 if($smt){
	 if(count($count)==0){
	   echo '0'; //There is no user with this name
	 }else{
	   foreach($count as $rows){
	     $pass = $rows['Upass'];
	   }
	
	   if(password_verify($user_password, $pass)){
	   if($user_name=='vad05011981'){
	   	 echo '4';//User logged in as admin
		$_SESSION['admin'] = 'vad05011981';
	   }else{
	    echo '1'; //Passwords match, start session
		$_SESSION['valid_user'] = $user_name;
		}
	   }else{
	     echo '2';//Wrong password, try again later
	   
	   }
	 
	 }
	 }else{
	 //Query failed. Try later..
	   echo '3';
	 
	 }
	 
	}catch(PDOException $e){
	
	  echo $e->getMessage();
	} 
}//Check if username has at least 3 character, password is between 5 and 15 character long
}//Check if a user has typed in username and password
}//Chec if username and password are both set











?>





























