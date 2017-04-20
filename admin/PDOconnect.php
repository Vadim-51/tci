<?php
try{
	$db = new PDO('mysql:host=localhost;dbname=id643718_tci','id643718_tci_user','tehnolog_81');
	}catch(PDOException $e){
	echo $e->getMessage();
}
?>