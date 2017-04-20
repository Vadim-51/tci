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
<title>Edit article</title>

<?php include('../header.php'); ?>
<div class="adminArea">

<div id="publishedArticles">
<?php
if(isset($_GET['id'])){
  $_SESSION['editPageId'] = $_GET['id'];
  $pageID = $_GET['id'];
                     try{
                          $smt = $db->query("SELECT * FROM pages WHERE pageID='".$pageID."'");
                          $rows = $smt->fetch(PDO::FETCH_ASSOC);
						  $header = strip_tags($rows['articlesHeader']);
                          $articlesParagraph = strip_tags($rows['articlesParagraph']);
						  $pageParagraph = strip_tags($rows['pageParagraph']);
						  $pageContent = $rows['pageContent'];
						  $articlesImage = $rows['articlesImage'];
						  $pageImage = $rows['pageImage'];		  
					    }catch(PDOException $e){
                          $showOutput .= $e->getMessage().'<br/>';
                        }
	                }
					    $pageContent3 = substr($pageContent, 0, -1);
						$pageContent1 = explode('|', $pageContent3);
?>
  </div>
  <h1>Edit Article</h1>
  <div id="textFields">
  <form id="addForm" action="edited.php" enctype='multipart/form-data' method="post">
  <div id="forArticlesPage">
  <p><input type="text" size="101" name="articlesHeader" placeholder="Header" value="<?php echo $header; ?>" /></p>

  <div style="visibility: hidden; position: absolute;">
  <input name="uploadFile1" id="uploadFile1" type="file" value="<?php echo $articlesImage; ?>" />
  </div>
  <p><input type="image" class="img-responsive" style="display: inline-block; margin: 0 auto;" src="<?php echo $articlesImage; ?>" alt="Submit" id="imageLoad1"></p>
  <p><textarea rows="20" cols="86" name="articlesParagraph" ><?php echo $articlesParagraph; ?></textarea></p>
  </div>
  <div id="requiredForPage">
  <div style="visibility: hidden; position: absolute;">
  <input name="uploadFile2" id="uploadFile2" type="file" value="<?php echo $pageImage; ?>" />
  </div>
  <p><input type="image" class="img-responsive" style="display: inline-block; margin: 0 auto;" src="<?php echo $pageImage; ?>" alt="Submit" id="imageLoad2"></p>
  <p><textarea rows="20" cols="86" name="pageParagraph"><?php echo $pageParagraph; ?></textarea></p>
  </div>
  <div id="forPage">
  <?php
 /////////////////////////////////////////////////////////////////////////////////////////
 //Generate Dynamic Input Fields with Content in them
 ////////////////////////////////////////////////////////////////////////////////////////
    foreach($pageContent1 as $key=>$value){
					     //echo strip_tags($pageContent1[3]);
						 $tagCharacter = substr($value, 1, 1);
					     switch($tagCharacter){
				         case 'h':
						 ?>
	<p><input type="text" name="data[header]['<?php echo $key +1; ?>']" size="101" value="<?php echo strip_tags($value); ?>" /></p>
                         <?php
						 break;
						 case 'p':
						 ?>
   <p><textarea rows="20" name="data[paragraph]['<?php echo $key +1; ?>']" cols="86"><?php echo strip_tags($value); ?></textarea></p>
                         <?php
						 break;
						 case 'o':
						 ?>
  <p><textarea rows="12" name="data[oList]['<?php echo $key +1; ?>']" cols="45"><?php echo strip_tags($value); ?></textarea></p>
                         <?php
						 break;
						 case 'u':
						 ?>
  <p><textarea rows="12" name="data[uList]['<?php echo $key +1; ?>']" cols="45"><?php echo strip_tags($value); ?></textarea></p>
                         <?php
						 break;
						 default:
						  echo '';
						 }
						}

  ?>
 
  </div>
  <div style="visibility: hidden; position: absolute;">
  <input name="fieldsNumber" id="fieldsNumber1" type="text" />
  </div>
  <p><input type="submit" id="addArticle" style="width: 100px;" value="Change" /></p>
  </form>
  </div>
 <ul id="noDec">
  <li>Header &nbsp; <button value="+" id="addHeader" onclick="addHeader();" class="controlBtn"><b>+</b></button></li>
  <li>Paragraph &nbsp; <button value="+" onclick="addTextarea()" class="controlBtn"><b>+</b></button></li>
  <li>Ordered List &nbsp; <button value="+" onclick="addOl();" class="controlBtn"><b>+</b></button></li>
  <li>Unordered list &nbsp; <button value="+" onclick="addUl();" class="controlBtn"><b>+</b></button></li>
  <li>Delete Element &nbsp;<button value="-" id="removeHeader" onclick="deleteHeader();" class="controlBtn"><b>-</b></button></li>
 </ul>
 </div>
<script>

$("#addArticle").on("mouseover", function(){
     $("#addArticle").css("cursor", "pointer");
})

$('.controlBtn').on({
    mousedown: function(){
   $(this).css({'background-color': 'black', 'color': '#FFFFFF', 'cursor': 'pointer'});
   },
    mouseup: function(){
   $(this).css({'background-color': '#CCCCCC', 'color': '#666666', 'cursor': 'pointer'});
   },
    mouseover: function(){
   $(this).css({'background-color': '#FFFFFF', 'color': '#666666', 'cursor': 'pointer'});
   },
      mouseout: function(){
   $(this).css({'background-color': '#CCCCCC', 'color': '#666666'});
   }

});
i=0;
function addHeader(){
  i++;
  var list = document.getElementById("forPage");
  var node = document.createElement('input');
  node.type = 'text';
  node.size = '101';
  node.placeholder='Header';
  var headName = i + 'attachedHeader';
  $(node).attr('name', 'data[header]['+i+']');
  $("#fieldsNumber1").attr('value', i);
  var paragraph = document.createElement('p');
  paragraph.appendChild(node);
  document.getElementById("forPage").appendChild(paragraph);
  list.insertBefore(paragraph, list.childNodes[list.length+1]); 
}
function addTextarea(){
  i++;
  var node = document.createElement('textarea');
  node.rows = '20';
  node.cols = '86';
  node.placeholder='Paragraph';
  var paragraphName = i + 'attachedParagraph';
  $(node).attr('name', 'data[paragraph]['+i+']');
  $("#fieldsNumber1").attr('value', i);
  var paragraph = document.createElement('p');
  paragraph.appendChild(node);
  document.getElementById("forPage").appendChild(paragraph);
  var list = document.getElementById("forPage");
  list.insertBefore(paragraph, list.childNodes[list.length+1]); 
}
function addOl(){
  i++;
  var node = document.createElement('textarea');
  node.rows = '12';
  node.cols = '45';
  node.placeholder='Ordered List';
  var oListName = i + 'attacedOlist';
  $(node).attr('name', 'data[oList]['+i+']');
  $("#fieldsNumber1").attr('value', i);
  var paragraph = document.createElement('p');
  paragraph.appendChild(node);
  document.getElementById("forPage").appendChild(paragraph);
  var list = document.getElementById("forPage");
  list.insertBefore(paragraph, list.childNodes[list.length+1]); 
}
function addUl(){
  i++;
  var node = document.createElement('textarea');
  node.rows = '12';
  node.cols = '45';
  node.placeholder='Unordered List';
  var uListName = i + 'attacedUlist';
  $(node).attr('name', 'data[uList]['+i+']');
  $("#fieldsNumber1").attr('value', i);
  var paragraph = document.createElement('p');
  paragraph.appendChild(node);
  document.getElementById("forPage").appendChild(paragraph);
  var list = document.getElementById("forPage");
  list.insertBefore(paragraph, list.childNodes[list.length+1]); 
}

function deleteHeader(){
  var list = document.getElementById("addForm");
  $('#forPage p:last-child').remove();
  i--;
}
$("#imageLoad1").on("click", function(e){
	    e.preventDefault();
})
$("#imageLoad2").on("click", function(e){
	    e.preventDefault();
})
$("#imageLoad1").click(function(){
  $("#uploadFile1").trigger("click");
})
$("#imageLoad2").click(function(){
  $("#uploadFile2").trigger("click");
})
$("#uploadFile1").change(function(e){
   $("#imageLoad1").fadeIn("fast").attr("src", URL.createObjectURL(e.target.files[0]));
})
$("#uploadFile2").change(function(e){
   $("#imageLoad2").fadeIn("fast").attr("src", URL.createObjectURL(e.target.files[0]));
})
$(document).ready(
function(){
  $('#uploadFile1').attr('value', '');
  $('#uploadFile2').attr('value', '');
}
)


</script>
<?php include('../footer.php'); ?>


































