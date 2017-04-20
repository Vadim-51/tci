<?php
require "PDOconnect.php";

try{

$sql= "CREATE TABLE user_tci (UserID int(11) UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
                              Uname varchar(25) NOT NULL,
							  Uemail varchar(60) NOT NULL,
						      Upass varchar(255) NOT NULL,
						      Jdate datetime NOT NULL)";
			                  $db->exec($sql);
			                  echo 'Table was created successfully';
}catch(PDOException $e){
      echo $sql. '<br/'.$e->getMessage();
}	   




?>





























