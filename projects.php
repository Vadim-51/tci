<?php if(!isset($_GET['project'])){?>
<title>Projects</title>
<div class="articleContent">
<a class="big" href="https://tci.000webhostapp.com/index.php?page=projects&project=memoryGame">
<h1>Memory Game</h1>
<p class="gen">Best practice to improve your memory</p>
<img class="img-responsive"" src="./images/memoryGame.jpg"><br/>
<br/>
</a>
<hr />
</div>
<div class="articleContent">
<a class="big" href="https://tci.000webhostapp.com/index.php?page=projects&project=typingTest">
<h1>Typing Test</h1>
<p class="gen">Best practice to improve your memory</p>
<img class="img-responsive" src="./images/TypeTest.jpg"><br/><br/>
</a>
<hr />
</div>
<script>
$(document).ready(function(){
   $(".articleContent").hide().fadeIn(1000);
})
</script>
<?php
}else{
  $project = $_GET['project'];
  include($project.'.php');
}
?>