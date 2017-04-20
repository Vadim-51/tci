<?php
require_once('./admin/PDOconnect.php');

$showOutput = '';
if(isset($_GET['pageID'])){
 $pageID = $_GET['pageID'];
}

try{$smt = $db->query("SELECT * FROM pages WHERE pageID='".$pageID."'");
                      while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $header = $rows['articlesHeader'];
						  $picture = substr($rows['pageImage'], 1);
						  $paragraph = $rows['pageParagraph'];
						  $pageContent = str_replace('|', '', $rows['pageContent']);
						  $pageID = $rows['pageID'];
                                                  $date = $rows['dateCreation'];
						  ?>
						   <div class="pageContent">
                            <?php echo $header.'<br/>'; ?>
                            <p class="dateCreation"><?php echo date('F j, Y', strtotime($date)); ?></p>
                            <p><img class="img-responsive" src="<?php echo $picture; ?>" ?></p>
                             <?php
							 echo '<br/>';
							 echo $paragraph;
							 echo $pageContent;
							 ?>
                            
                            </div>
                         
                          <?php
					    }
						  
					}catch(PDOException $e){
                            $showOutput .= $e->getMessage().'<br/>';
	
	                }
?>
<title><?php echo strip_tags($header);?></title>