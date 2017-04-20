
<?php
require_once('PDOconnect.php');
require_once('fnc.php');
start_session();
if(!isset($_SESSION['admin'])){
  header("Location: /TCI3/index.php");
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Delete</title>
<div class="adminArea">
<h1>Delete Article</h1>
<div id="confirmDel">
<p>

</p>
<?php
////////////////////////////////////////////////////////////////////////////////////////////
//Show Published Articles
///////////////////////////////////////////////////////////////////////////////////////////
                     //Select Image for deleting
					
                    try{
     $smt = $db->query("SELECT * from pages WHERE pageID='".$_SESSION['deletePage']."'");
	          while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $picure1 = $rows['articlesImage'];
						  $picure2 = $rows['pageImage'];}
	}catch(PDOException $e){
	 $showOutput .= $e->getMessage().'<br/>';
	}
					  if(file_exists($picure1)){
	                      unlink($picure1);
		                 }
					 
					 if(file_exists($picure2)){
	                      unlink($picure2);
		                 }
					 
					 
                      try{
					  $smt = $db->query("DELETE FROM pages WHERE pageID='".$_SESSION['deletePage']."'");
                       
					     }catch(PDOException $e){
 $showOutput .= $e->getMessage().'<br/>';
	                }	
?>
 
           <p>
              Article was deleted  <a href="index.php">Back to admin page</a>
           </p>
           </div>

































