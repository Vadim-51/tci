<?php
require "PDOconnect.php";

try{

$sql= "CREATE TABLE pages (pageID int(11) UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
               articlesHeader VARCHAR(255) NOT NULL,
               articlesImage VARCHAR(255) NOT NULL,
               articlesParagraph TEXT NOT NULL,
	           pageHeader VARCHAR(255) NOT NULL,
               pageImage VARCHAR(255) NOT NULL,
               pageParagraph TEXT NOT NULL,
			   pageContent TEXT NOT NULL,
			   dateCreation TIMESTAMP)";
			   $db->exec($sql);
			   echo 'Table was created successfully';
}catch(PDOException $e){
      echo $sql. '<br/'.$e->getMessage();
}	   




?>





























