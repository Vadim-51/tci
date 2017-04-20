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
<?php include_once('../header.php'); ?>
<title>Delete</title>
<h1>Confirm Deleting an Article</h1>
<div id="confirmDel">
<p>
You want to delete article:
</p>
<?php
////////////////////////////////////////////////////////////////////////////////////////////
//Show Published Articles
///////////////////////////////////////////////////////////////////////////////////////////
                      if(isset($_GET['page'])){
					  $_SESSION['deletePage'] = $_GET['page'];
					  //$pageToDelete = $_GET['page'];
					  }
                      try{$smt = $db->query("SELECT * FROM pages WHERE pageID='".$_SESSION['deletePage']."'");
                      while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $header = strip_tags($rows['articlesHeader']);
						  ?>
						    <p >
                            <?php echo $header; ?> 
                            <p>
                            <p>
               Confirm deleting <a href="selectDeleteId.php?delete=<?php $_SESSION['deletePage']; ?>">Yes</a> | <a href="index.php">Back to admin page</a>
                            </p>
                          <?php
					    }
						  
					}catch(PDOException $e){
 $showOutput .= $e->getMessage().'<br/>';
	                }	
?>
 



































