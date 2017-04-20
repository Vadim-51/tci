<?php 
    ////////////////////////////////////////////////////////////////////////////////
	//Uploading Images to Server
	////////////////////////////////////////////////////////////////////////////////
	function uploadImage($uploadImageName, $targetDirectory, $uploadImageTmpName, $newImageName, $fileSize){
	$directory = $targetDirectory;
	$uploadFile = $directory .basename($uploadImageName);
	$imageFileType = pathinfo($uploadImageName, PATHINFO_EXTENSION);
	   $checkAll = 1;
	  $check = getimagesize($uploadImageTmpName);
	  if($check !== false){
	     //echo 'Size of file is normal<br/>';
	     $checkAll = 1;
	  } else {
	      $checkAll = 0;
		 //echo 'File has a size of 0';
	  }
      if($fileSize > 2000000){
	      $checkAll = 0;
	  }
	  if(file_exists($newImageName)){
	  if(!unlink($newImageName)){
	      $checkAll = 0;
		  //echo 'File already exists on the server<br/>';
		  }
	  } 

	if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType1!= 'gif'){
	      $checkAll = 0;
		  //echo 'Inapropriate extension<br/>';
	   }
	 if($checkAll == 1){
	     if(move_uploaded_file($uploadImageTmpName, $newImageName)){
		 //echo 'File was uploaded<br/>';
		 return true;
		 }else{
		 //echo 'Something wrong happend on final stage';
		 return false;
		 }
      }
 }
 
 
function start_session(){
   if(session_status()==PHP_SESSION_NONE){
      session_start();
   }
 }

 ?>