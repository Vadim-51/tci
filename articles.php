<title>Articles</title>
<?php
require_once('./admin/PDOconnect.php');
//require_once('./admin/captcha.php');
$showOutput = '';



try{$smt = $db->query("SELECT * FROM pages ORDER BY pageID DESC LIMIT 0, 5");
                      while($rows = $smt->fetch(PDO::FETCH_ASSOC)){
						  $header = $rows['articlesHeader'];
						  $picture = substr($rows['articlesImage'], 1);
						  $paragraph = $rows['articlesParagraph'];
						  $pageID = $rows['pageID'];
                                                  $date = $rows['dateCreation'];
						  ?><div class="articleContent">
                            <a href="https://tci.000webhostapp.com/index.php?page=article&pageID=<?php echo $pageID; ?>" target="_blank">
                            <?php echo $header; ?>
                            <p class="dateCreation"><?php echo date('F j, Y', strtotime($date)); ?></p>
                            <p><img class="img-responsive" src="<?php echo $picture; ?>" ?></p>
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
         <div id="additionalContent"></div>
        
   

<script>
var trackPage = 1;
var checkLoad = false;


$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height()  >= $(document).height() - 30){
    function checkVariable(){
	   if(checkLoad==false){
		  loadContent(trackPage);
		  trackPage++;
	   }
	
	}
     setTimeout(checkVariable, 200);
  }
})


function loadContent(trackPage){
   if(checkLoad==false){
      checkLoad = true;

   $.ajax({
       method: 'POST',
	   url: "./admin/additionalContent.php",
	   data: {page:trackPage},
	   
	   success: function(data){
	     
		 if(data.trim().lentgh==0){
		    $("#loadingImage").html("No more records..");
		 
		 }
		
		 $(data).hide().appendTo("#additionalContent").fadeIn(1500);
		 checkLoad = false;
		 
		 
	   }
   
   })
   
   }

}








</script>