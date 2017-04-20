<?php

require_once('PDOconnect.php');
require_once('fnc.php');
start_session();
if(!isset($_SESSION['admin'])){
  header("Location: /TCI3/index.php");
}
$showOutput = '';
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<title>Edit article</title>
<?php include('../header.php'); ?>
<div class="adminArea">

<?php
if(isset($_SESSION['editPageId'])){
  $pageID = $_SESSION['editPageId'];
   //Select Image for editiing				
                    try{
     $smt = $db->prepare("SELECT * from pages WHERE pageID=:id");
	             $smt->bindParam(":id", $_SESSION['editPageId']);
				 $smt->execute();
				  
	          while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $picure1 = $rows['articlesImage'];
						  $picure2 = $rows['pageImage'];}
	            }catch(PDOException $e){
	            $showOutput .= $e->getMessage().'<br/>';
	            }                         
	
	          $rand = rand(10, 100000);           
						 
	
  if(isset($_POST['articlesHeader']) && isset($_POST['articlesParagraph']) && isset($_POST['pageParagraph'])){
    $articlesHeader = '<h1 class="main">'.$_POST['articlesHeader'].'</h1>';
	$articlesParagraph = '<p class="main">'.$_POST['articlesParagraph'].'</p>';
    $pageHeader = '<h1 class="page">'.$_POST['articlesHeader'].'</h1>';
	$pageParagraph = '<p class="page">'.$_POST['pageParagraph'].'</p>';
	date_default_timezone_set("Europe/Kiev");
	$dateCreation = date("Y-m-d H:i:s");
	$trimedHeader = preg_replace('/\s+/', '', $_POST['articlesHeader']);
    $directory = "../images/";
  if(!empty($_POST['articlesHeader']) && !empty($_POST['articlesParagraph']) && !empty($_POST['pageParagraph'])){
  
   if($_FILES['uploadFile1']['size'] != 0){
                          if($picure1 != ''){
	                      $picureNew1 = $picure1;
						  }else{
				 $picureNew1 = $directory.$rand.'1'.'.'.pathinfo($directory . basename($_FILES["uploadFile1"]["name"]),PATHINFO_EXTENSION);
						  }
	$uploadImageName1 = $_FILES['uploadFile1']['name'];
	$uploadImageTmpName1 = $_FILES['uploadFile1']['tmp_name'];
	$newImageName1 = $picureNew1;
	$fileSize1 = $_FILES['uploadFile1']['size'];
	if(uploadImage($uploadImageName1, $directory, $uploadImageTmpName1, $newImageName1, $fileSize1)){
	                     $showOutput .= 'First image was uploaded<br>';
	}else{
	                     $showOutput .= 'First image was not uploaded. Try again later<br>';
	}
	                      try{
					     $smt  = $db->prepare("UPDATE pages SET articlesImage=:newImageName1
                          WHERE pageID=:pageID");
						 $smt->bindParam(":newImageName1", $newImageName1);
						 $smt->bindParam(":pageID", $pageID);
						 $smt->execute();
					    }catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
                        }
}
  
  if($_FILES['uploadFile2']['size'] != 0){
                          if($picure2 != ''){
						  $picureNew2 = $picure2;
						  }else{
                     $picureNew2 = $directory.$rand.'2'.'.'.pathinfo($directory . basename($_FILES["uploadFile1"]["name"]),PATHINFO_EXTENSION);
						  }
	$uploadImageName2 = $_FILES['uploadFile2']['name'];
	$uploadImageTmpName2 = $_FILES['uploadFile2']['tmp_name'];
	$newImageName2 = $picureNew2; 
	$fileSize2 = $_FILES['uploadFile2']['size'];
	if(uploadImage($uploadImageName2, $directory, $uploadImageTmpName2, $newImageName2, $fileSize2)){
	                     $showOutput .= 'Second image was uploaded<br>';
	}else{
	                     $showOutput .= 'Second image was not uploaded. Try again later<br>';
	}
	                      try{
					      $smt  = $db->prepare("UPDATE pages SET articlesImage=:newImageName2
                          WHERE pageID=:pageID");
						 $smt->bindParam(":newImageName2", $newImageName2);
						 $smt->bindParam(":pageID", $pageID);
						 $smt->execute();
					    }catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
                        }
}
 
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
		  try{
					     $smt  = $db->prepare("UPDATE pages SET pageContent=:dbContent WHERE pageID=:pageID");
                         $smt->bindParam(":dbContent", $dbContent);
						 $smt->bindParam(":pageID", $pageID);
						 $smt->execute();
					    }catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
                        }
  }
}
 
 
  
                     try{
					     $smt  = $db->prepare("UPDATE pages SET articlesHeader=:articlesHeader,
                         articlesParagraph=:articlesParagraph, pageHeader=:pageHeader, pageParagraph=:pageParagraph WHERE                         pageID=:pageID");
						 $smt->bindParam(":articlesHeader", $articlesHeader);
						 $smt->bindParam(":articlesParagraph", $articlesParagraph);
						 $smt->bindParam(":pageHeader", $pageHeader);
						 $smt->bindParam(":pageParagraph", $pageParagraph);
						 $smt->bindParam(":pageID", $pageID);
						 $smt->execute();
						  
                          $smtSelect = $db->prepare("SELECT * FROM pages WHERE pageID=:pageID");
						  $smtSelect->bindParam(":pageID", $pageID);
						  $smtSelect->execute();
                          $rows = $smtSelect->fetch(PDO::FETCH_ASSOC);
						  $header = strip_tags($rows['articlesHeader']);
                    
					    }catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
                        }
	                


}
}
}
?>

  <h1>Edit Article</h1>
 <p>Page <?php echo '"'.$header.'"'; ?> was successfully changed!</p>
 <p><a href="index.php">Back to admin page</a></p>
</div>
<?php include('../footer.php'); ?>