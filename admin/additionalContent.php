<?php
require_once('PDOconnect.php');

$showOutput = '';

$page_number = $_POST['page'];

$item_per_page = 5;

if(!is_numeric($page_number)){
   exit('Did not receive any page');
}

$position = ($page_number * $item_per_page);



try{$smt = $db->query("SELECT * FROM pages ORDER BY pageID DESC LIMIT ".$position.", ".$item_per_page."");
                      while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $header = $rows['articlesHeader'];
						  $picture = substr($rows['articlesImage'], 1);
						  $paragraph = $rows['articlesParagraph'];
						  $pageID = $rows['pageID'];
                                                  $date = $rows['dateCreation'];
	?><div class="additionalContent"><a href="https://tci.000webhostapp.com/index.php?page=article&pageID=<?php echo $pageID; ?>" target="_blank">
                            <?php echo $header; ?>
                            <p class="dateCreation"><?php echo date('F j, Y', strtotime($date)); ?></p>
                            <p><img  class="img-responsive" src="<?php echo $picture; ?>" ?></p>
                             <?php
							 echo $paragraph;
							 ?>
                          </a>
                          <hr />
                          </div>
                          <?php
					    }
						 
					}catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
	                }


?>