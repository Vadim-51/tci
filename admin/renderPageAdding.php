<?php 
require_once('fnc.php');
require_once('PDOconnect.php');
require_once('fnc.php');
start_session();
if(!isset($_SESSION['admin'])){
  header("Location: /TCI3/index.php");
}
$showOutput = '';
  
            $random = rand(10, 100000);
   
   
   

if(isset($_POST['articlesHeader']) && isset($_POST['articlesParagraph']) && isset($_POST['pageParagraph'])){
    $articlesHeader = '<h1 class="main">'.$_POST['articlesHeader'].'</h1>';
	$articlesParagraph = '<p class="main">'.$_POST['articlesParagraph'].'</p>';
    $pageHeader = '<h1 class="page">'.$_POST['articlesHeader'].'</h1>';
	$pageParagraph = '<p class="page">'.$_POST['pageParagraph'].'</p>';
	date_default_timezone_set("Europe/Kiev");
	$dateCreation = date("Y-m-d H:i:s");
	$trimedHeader = preg_replace('/\s+/', '', $_POST['articlesHeader']);
	
	//Uploading Images to Server
if(!empty($_POST['articlesHeader']) && !empty($_POST['articlesParagraph']) && !empty($_POST['pageParagraph']) && ($_FILES['uploadFile1']['size'] != 0) 
	&& ($_FILES['uploadFile2']['size'] != 0)){
	//First Image
	$directory = "../images/";

	$uploadImageName1 = $_FILES['uploadFile1']['name'];
	$uploadImageTmpName1 = $_FILES['uploadFile1']['tmp_name'];
	$newImageName1 = $directory.$random.'1.'.pathinfo($directory . basename($_FILES["uploadFile1"]["name"]),PATHINFO_EXTENSION);
	$fileSize1 = $_FILES['uploadFile1']['size'];
	if(uploadImage($uploadImageName1, $directory, $uploadImageTmpName1, $newImageName1, $fileSize1)){
	$showOutput .= 'First image was uploaded successfully.</br>';
	
	} else {
	$showOutput .= 'Seems that you have a problem with uploading first image to the server<br/>';
	$showOutput .= 'Please make sure that you\'ve choosen file with extension jpg, png, jpeg or gif.<br/>';
	$showOutput .= 'File must have the size no more than 2 Mb.<br/>';
	$showOutput .= 'File must have not been uploaded previously on the server<br/>';
	$showOutput .= 'Please try to edit your article on admin page<br/>';
	}
	//Second Image

	$uploadImageName2 = $_FILES['uploadFile2']['name'];
	$uploadImageTmpName2 = $_FILES['uploadFile2']['tmp_name'];
	$newImageName2 = $directory.$random.'2.'.pathinfo($directory . basename($_FILES["uploadFile2"]["name"]),PATHINFO_EXTENSION); 
	$fileSize2 = $_FILES['uploadFile2']['size'];
	if(uploadImage($uploadImageName2, $directory, $uploadImageTmpName2, $newImageName2, $fileSize2)){
	$showOutput .= 'Second image was uploaded successfully.</br>';
	
	} else {
	$showOutput .= 'Seems that you have a problem with uploading second image to the server<br/>';
	$showOutput .= 'Please make sure that you\'ve choosen file with extension jpg, png, jpeg or gif.<br/>';
	$showOutput .= 'File must have the size no more than 2 Mb.<br/>';
	$showOutput .= 'File must have not been uploaded previously on the server<br/>';
	$showOutput .= 'Please try to edit your article on admin page<br/>';
	}

	
	
	
	
	
	
	//Text////////////////////////////////////////////////////////////////////////////
if(isset($_POST['data'])){
if(!empty($_POST['data'])){

          if(isset($_POST['data']['header'])){
           if(!empty($_POST['data']['header'])){
           foreach($_POST['data']['header'] as $key=>$value){
           $contentArray[$key] = '<h3 class="page">'.$value.'</h3>|';
               }
             }
           }

		if(isset($_POST['data']['paragraph'])){
         if(!empty($_POST['data']['paragraph'])){
        foreach($_POST['data']['paragraph'] as $key=>$value){
        $contentArray[$key] = '<p class="page">'.$value.'</p>|';
            }
          }
        }
        if(isset($_POST['data']['oList'])){
        if(!empty($_POST['data']['oList'])){
        foreach($_POST['data']['oList'] as $key=>$value){
   
        $contentArray[$key] = '<ol><li>'.str_replace("\n",'</li><li>', $value).'</li></ol>|';
            }
          }
        }
        if(isset($_POST['data']['uList'])){
        if(!empty($_POST['data']['uList'])){
        foreach($_POST['data']['uList'] as $key=>$value){
        $contentArray[$key] = '<ul><li>'.str_replace("\n",'</li><li>', $value).'</li></ul>|';
            }
          }
        }
        ksort($contentArray);
        //Turn array into string
        $numerical = array();
        foreach($contentArray as $key=>$value){
        $numerical[] = $value;
        }
        $dbContent = implode('', $numerical);

		//Query 
		try{$smt  = $db->prepare("INSERT INTO pages (articlesHeader, articlesImage,
                              articlesParagraph, pageHeader, pageImage, pageParagraph,
							  pageContent, dateCreation)
                              VALUES(:articlesHeader, :articlesImage,
                              :articlesParagraph, :pageHeader, :pageImage, :pageParagraph, 
							  :pageContent,:dateCreation)");
			   $smt->bindParam(":articlesHeader", $articlesHeader);		 
			   $smt->bindParam(":articlesImage", $newImageName1);			 
			   $smt->bindParam(":articlesParagraph", $articlesParagraph);
               $smt->bindParam(":pageHeader", $pageHeader);
               $smt->bindParam(":pageImage", $newImageName2);	
               $smt->bindParam(":pageParagraph", $pageParagraph);
               $smt->bindParam(":pageContent", $dbContent);
               $smt->bindParam(":dateCreation", $dateCreation);			   
			   $smt->execute();
               if($smt){
				//$showOutput .= 'Query was executed<br/>';
			   }else{
				 $showOutput .= 'Something wrong happend<br/>';  
			   }		   
							 
				
							 
					}catch(Exception $e){
	     $showOutput .= $e->getMessage().'<br/>';
	     $showOutput .= 'Your first headings and paragraphs were not stored in MySQL. Please, try again later.<br/>';
	                }	
	
					
						 
 
	
	$showOutput .= 'Your article is stored in MySQL successfully.</br>';
	
  }else{
	 $showOutput .=  'You have to fill out additional content<br/>';
  }
  }else{
	 $showOutput .= 'Your article must have at least one additional content<br/>';
  }
  }else{
	$showOutput .= 'You have to fill out paragraphs, headers and choose images<br/>';
  }

} 



?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>TCI</title>
<style type="text/css">
<!--
.стиль1 {font-size: 12px}
-->
</style>
<?php include('../header.php'); ?>
 <table width="974" height="33" border="0" align="center">
   <tr>
     <td width="964" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <?php

     echo $showOutput.'<br/>'; 
	  ?>
     <a href="index.php">Back to admin page</a>
   
     </td>
   </tr>
 </table>
 <?php include('../footer.php'); ?>