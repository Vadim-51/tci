<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Memory Game</title>

<style>

#loadBoard{
  display: none;
  position: absolute;
  opacity: 1;
  width: 100%;
  height: 100%;
  background-color: #00FFFF;
  z-index: 150;
  transition: all 3s;
  font-size: 4em;
  font-weight: bold;
  text-align: center;
  color: red;
}
#loadBoardInner{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
}
#canvasWrap{
  position: relative;
  background-color: #00FFFF;
  margin-left: auto;
  margin-right: auto;
  margin-top: 1%;
 

}
body{
  font-size: 16px;
}
#myCanvas{
  display: block;
  padding: 0.5%;
  border: 2px solid #FF6347;
}
#clock{
  position: absolute;
  left: 69%;
  top: 1%;
  width: 30.3%;
  height: 98%;
  background-color: #DAA520;
  color: black;
  border-radius: 2%;
}
#insideTheClock{
  position:relative;
  width: 100%;
  height: 100%;
}
#BackgroundForClock{
  position: absolute;
  background-color: yellow;
  text-align: center;
  width: 90%;
  height: 94%;
  top: 3%;
  left: 5%;
}

.textString{
  position:relative;
  text-indent: 0;
  text-align:center;
  height: 6%;
  font-size: 1.4em;
}
#timeString{
  margin-top: 10%;
}

.button{
  text-align: center;
  background-color: AntiqueWhite;
  color: #8B4513;
  padding: 2%;
  border: 2px solid #8B4513;
  border-radius: 3px;
  font-size: 1.1em;
}
#pauseOfGame{
  top: 60%; 
}
#startNewGame{
  top: 80%;
}

#pauseOfGame:hover, #startNewGame:hover{
  cursor: pointer;
  color: #FFFAF0;
  background-color: #B8860B;
}
#overlayForDialog{
  display: none;
  opacity: 0;
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  background-color: white;
  z-index: 150;
}
#alertDialog{
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -90px;
  margin-left: -155px;
  width: 300px;
  height: 180px;
  background-color: Gold;
  background: linear-gradient(to bottom, Red, Gold);
  z-index: 160;
  border-radius: 10px;
  border: 6px DarkRed solid;
  transition: opacity 0.32s linear;
  text-align: center;
  padding-top: 20px;
}
#startNg, #continueG {
  margin-left: 8px;
  background-color: #F5DEB3;
  color: DarkRed;
  padding: 8px;
  border-radius: 10px;
  border: 2px DarkRed solid;
}
#startNg:hover, #continueG:hover{
  cursor: pointer;
  background-color: red;
  color: #FFFFE0;
}
.project{
  font-size: 1.4em;
  text-align: center;
  color:#666666;
}
@media screen and (max-width:480px){
  .project{
  font-size: .7em;
}
.button{
  border-width: .5px;
  border-radius: 1px;
}
#myCanvas{
  border-width: .5px;
}
.textString{
  height: 4.5%;
}

#loadBoard{
  font-size: 1em;
}
}
@media screen and (min-width:480px) and (max-width:768px){
  .button{
  border-width: .1px;
  border-radius: 1px;
}
#myCanvas{
  border-width: .5px;
}
.textString{
  height: 7%;
}
}
</style>
<div class="pageContent">
<h2 class="project">Memory Game</h2>
<div id="overlayForDialog"></div>
<div id="alertDialog">
  <div>
    <div id="mainPart" style="height: 120px;">Make your choice, please:</div>
	<div id="bottomPart"></div>
  </div>
</div>
<div id="imgContainer" style="display: none;"></div>
<div id="canvasWrap">
<div id="loadBoard"><div id="loadBoardInner">Loading...</div></div>
<canvas id="myCanvas">
Your browser does not support the HTML5 canvas tag
</canvas>
<div id="clock">
<div id="insideTheClock">
<div id="BackgroundForClock">
<p id="timeString" class="textString">Time of Game:</p>
<p id="timeOfclock" class="textString">00:00:00</p>
<p class="textString">Failed Attempts:</p>
<p id="numAttem" class="textString">0</p>
<p class="textString">Successful Attempts:</p>
<p id="successfulAttempts" class="textString">0</p>
<button id="pauseOfGame" class="button">Pause Game</button><br><br>
<button id="startNewGame" class="button" onclick="startGame();">Start New Game</button><br>
</div>
</div>
</div>
</div>
 <script>
 function clearGameArea(){
 $("#loadBoard").css({"display": "none"});
 }
 $(document).ready(function(){
   $("#loadBoard").css({"opacity": "0"});
   setTimeout(clearGameArea, 2050);
 })

 var timeOfclock = document.getElementById('timeOfclock').innerHTML;
 var timeOfclockArr = timeOfclock.split(':');
 var seconds = parseInt(timeOfclockArr[2]);
 var hours = parseInt(timeOfclockArr[0]);
 var minutes = parseInt(timeOfclockArr[1]);
 function numberOfSec(){
	 seconds++;
	 if (seconds == 60){
	 seconds = 0;
	 minutes++;
	 }
	 if(minutes == 60){
	 minutes = 0;
	 hours++;
	 } 
	 var numOfTime = '';
	 
	 
	 if (seconds < 10){
	  seconds = '0' + seconds;
	 }
	if (hours < 10){
	numOfTime = '0' + hours + ':' + minutes + ':' + seconds;
	} 
	 if (minutes < 10){
    numOfTime = hours + ':' + '0' + minutes + ':' + seconds;
	}
	
	if (hours < 10 && minutes < 10){
	numOfTime = '0' + hours + ':' + '0' + minutes + ':' + seconds;
	}
	return document.getElementById('timeOfclock').innerHTML = numOfTime;
  }
 function timer(){
    idInterval = setInterval(numberOfSec, 1000);
  }
var myCanvas = document.getElementById("myCanvas");
var canvasWrap  = document.getElementById("canvasWrap");
var ctx = myCanvas.getContext("2d");



function drawCanvas(){
  ctx.canvas.width = $(".pageContent").width()*0.67;
  ctx.canvas.height = $(".pageContent").width()*0.536; 
}
  window.addEventListener('load', drawCanvas, false);
  window.addEventListener('resize', drawCanvas, false);

  
 
//Changing Font Size While Resizing
var firstWidthSize = $(".pageContent").width();
var screenWidth = screen.width;
var scale = firstWidthSize/screenWidth;
document.getElementById('insideTheClock').style.fontSize = (scale * 100) + '%';
function resizeTheFont(){
var firstWidthSize = window.innerWidth;
var scale = firstWidthSize/screenWidth;
if(firstWidthSize <= 450){
   document.getElementById('insideTheClock').style.fontSize = '0.29em';
} else {
document.getElementById('insideTheClock').style.fontSize = (scale * 100) + '%';
}
}
window.addEventListener('load', resizeTheFont, false);
window.addEventListener('resize', resizeTheFont, false);

var idInterval;
//Game
 var Tile = function (x, y, face){
	this.x = x;
	this.y = y;
	this.face = face;
	this.width = $(".pageContent").width()/7.7;
}
 var tiles = [];
 function preload(containerId, urlOfimage) {
    var imageLoaded = document.createElement('img');
	imageLoaded.onload = function(){
	var container = document.getElementById(containerId);
	container.appendChild(this);
	}
	return imageLoaded.src = urlOfimage;
}
var img1 = preload("imgContainer","./memoryGameImages/apple.png"); 
var img2 = preload("imgContainer","./memoryGameImages/apricot.png"); 
var img3 = preload("imgContainer","./memoryGameImages/banana.png");
var img4 = preload("imgContainer","./memoryGameImages/cherry.png");
var img5 = preload("imgContainer","./memoryGameImages/gooseberry.png");
var img6 = preload("imgContainer","./memoryGameImages/grapes.png");
var img7 = preload("imgContainer","./memoryGameImages/lemon.png");
var img8 = preload("imgContainer","./memoryGameImages/mango.png");
var img9 = preload("imgContainer","./memoryGameImages/melon.png");
var img10 = preload("imgContainer","./memoryGameImages/nectarine.png");
var img11 = preload("imgContainer","./memoryGameImages/orange.png");
var img12 = preload("imgContainer","./memoryGameImages/watermelon.png");
var img13 = preload("imgContainer","./memoryGameImages/pear.png");
var img14 = preload("imgContainer","./memoryGameImages/persimmon.png");
var img15 = preload("imgContainer","./memoryGameImages/plum.png");
var img16 = preload("imgContainer","./memoryGameImages/raspberries.png");
var img17 = preload("imgContainer","./memoryGameImages/strawberry.png");
var img18 = preload("imgContainer","./memoryGameImages/peach.png");


var column = 5;
var row = 4;

var images = [];

var faces = [
img1,
img2,
img3,
img4,
img5,
img6,
img7,
img8,
img9,
img10,
img11,
img12,
img13,
img14,
img15,
img16,
img17,
img18
];
var selected = [];
function inserting(){
var insertFaces = faces.slice(0);
for(i=0; i<10; i++){
  var randomId = Math.floor(Math.random(insertFaces.length));
  var face = insertFaces[randomId];
  selected.push(face);
  selected.push(face);
  insertFaces.splice(randomId, 1);
}
selected.sort(
 function(){
 return 0.5 - Math.random();
 }
)
for(i=0; i<column; i++){
	for(j=0; j<row; j++){
		tiles.push(new Tile((i*1.05 * $(".pageContent").width()/7.78) , (j *1.05* $(".pageContent").width()/7.78) , selected.pop()));
	}	
}
}

Tile.prototype.drawFaceDown = function() {
   ctx.beginPath();
   var rectWidth = this.width;
   var rectHeight = this.width;
   var rectX = this.x;
   var rectY = this.y;
   var cornerRadius = this.width * 0.1;
   ctx.moveTo(rectX + cornerRadius, rectY);
   ctx.lineTo(rectX + rectWidth - cornerRadius, rectY);
   ctx.arcTo(rectX + rectWidth, rectY, rectX + rectWidth, rectY + cornerRadius, cornerRadius);
   ctx.lineTo(rectX + rectWidth, rectY + rectHeight - cornerRadius);
   ctx.arcTo(rectX + rectWidth, rectY + rectHeight, rectX + rectWidth - cornerRadius, rectY + rectHeight , cornerRadius);
   ctx.lineTo(rectX + cornerRadius, rectY + rectHeight);
   ctx.arcTo(rectX, rectY + rectHeight, rectX, rectY + rectHeight - cornerRadius, cornerRadius);
   ctx.lineTo(rectX, rectY + cornerRadius);
   ctx.arcTo(rectX, rectY, rectX + cornerRadius, rectY, cornerRadius);
   var my_gradient = ctx.createLinearGradient(this.x,0,this.x + this.width,0);
   my_gradient.addColorStop(0, "orange");
   my_gradient.addColorStop(0.1, "red");
   my_gradient.addColorStop(0.5, "yellow");
   my_gradient.addColorStop(0.9, "red");
   my_gradient.addColorStop(1, "orange");
   ctx.fillStyle = my_gradient;
   ctx.fill();
   this.isFaceUp = false;
}

Tile.prototype.drawFaceDownAnimate = function() {
function animatingX() {  
  var id = setInterval(frame, 5);
  var beginning = this.x + this.width/2;
  var ending = this.x;
  function frame() {
    if (beginning == ending) {
      clearInterval(id);
    } else {
      beginning--; 
      return  beginning;
    }
  }
}
   ctx.beginPath();
   var rectWidth = this.width;
   var rectHeight = this.width;
   var rectX = animatingX;
   var rectY = this.y;
   var cornerRadius = this.width * 0.1;
   ctx.moveTo(rectX + cornerRadius, rectY);
   ctx.lineTo(rectX + rectWidth - cornerRadius, rectY);
   ctx.arcTo(rectX + rectWidth, rectY, rectX + rectWidth, rectY + cornerRadius, cornerRadius);
   ctx.lineTo(rectX + rectWidth, rectY + rectHeight - cornerRadius);
   ctx.arcTo(rectX + rectWidth, rectY + rectHeight, rectX + rectWidth - cornerRadius, rectY + rectHeight , cornerRadius);
   ctx.lineTo(rectX + cornerRadius, rectY + rectHeight);
   ctx.arcTo(rectX, rectY + rectHeight, rectX, rectY + rectHeight - cornerRadius, cornerRadius);
   ctx.lineTo(rectX, rectY + cornerRadius);
   ctx.arcTo(rectX, rectY, rectX + cornerRadius, rectY, cornerRadius);
   var my_gradient = ctx.createLinearGradient(this.x,0,this.x + this.width,0);
   my_gradient.addColorStop(0, "orange");
   my_gradient.addColorStop(0.1, "red");
   my_gradient.addColorStop(0.5, "yellow");
   my_gradient.addColorStop(0.9, "red");
   my_gradient.addColorStop(1, "orange");
   ctx.fillStyle = my_gradient;
   ctx.fill();
   this.isFaceUp = false;
}
Tile.prototype.faceUp = function(){ 
  var rectWidth = this.width;
  var rectHeight = this.width;
  var rectX = this.x;
  var rectY = this.y;
  var cornerRadius = this.width * 0.1;
  ctx.beginPath();
  ctx.moveTo(rectX + cornerRadius, rectY);
  ctx.lineTo(rectX + rectWidth - cornerRadius, rectY);
  ctx.arcTo(rectX + rectWidth, rectY, rectX + rectWidth, rectY + cornerRadius, cornerRadius);
  ctx.lineTo(rectX + rectWidth, rectY + rectHeight - cornerRadius);
  ctx.arcTo(rectX + rectWidth, rectY + rectHeight, rectX + rectWidth - cornerRadius, rectY + rectHeight , cornerRadius);
  ctx.lineTo(rectX + cornerRadius, rectY + rectHeight);
  ctx.arcTo(rectX, rectY + rectHeight, rectX, rectY + rectHeight - cornerRadius, cornerRadius);
  ctx.lineTo(rectX, rectY + cornerRadius);
  ctx.arcTo(rectX, rectY, rectX + cornerRadius, rectY, cornerRadius);
  ctx.fillStyle = 'Gold';
  ctx.fill();
  var my_pick2 = new Image;
  my_pick2.src = this.face;
  ctx.drawImage(my_pick2, this.x, this.y, this.width, this.width);
  this.isFaceUp = true;
}
Tile.prototype.isUnderMouse = function(x, y){
   return x >= this.x && x <= (this.x + this.width) && y >= this.y && y <= (this.y + this.width)
  }
var numOfFaces = [];
var numClicked = 0;
var numAttem = 0;
var numOfSuccess = 0;

$(myCanvas).on(" mouseover", function(e){
	 var rect = myCanvas.getBoundingClientRect();
     var x1 = e.clientX - rect.left;
     var y1 = e.clientY - rect.top;
	for(i=0; i < tiles.length; i++){
	if(tiles[i].isUnderMouse(x1, y1)){
    $(this).css("cursor", "pointer");
	}
	}
})
	
myCanvas.onclick = function (e){
  
  var rect = myCanvas.getBoundingClientRect();
  var x1 = e.clientX - rect.left;
  var y1 = e.clientY - rect.top;
  for(i=0; i < tiles.length; i++){
  if(tiles[i].isUnderMouse(x1, y1)){
   
  
  
  if (numClicked < 1){
  numClicked++;
  timer();
  }
  
  if(!tiles[i].isFaceUp && numOfFaces.length < 2){
    tiles[i].faceUp();
	numOfFaces.push(tiles[i]);
	if(numOfFaces.length == 2){
	 if(numOfFaces[0].face == numOfFaces[1].face){
	   numOfFaces[0].isMatch = true;
	   numOfFaces[1].isMatch = true;
	}
	
	if(tiles[i].isMatch){
	 tiles[i].faceUp();
	numOfFaces.splice(0, numOfFaces.length);
	numOfSuccess++;
	  if(numOfSuccess == 10){
     clearInterval(idInterval);
	 document.getElementById('pauseOfGame').disabled = true;
    }
	document.getElementById('successfulAttempts').innerHTML = numOfSuccess;
	 }else{
	 numAttem++;
     document.getElementById('numAttem').innerHTML = numAttem;
	function drawBack(){
for(i=0; i<tiles.length; i++){
  if(!tiles[i].isMatch){
  tiles[i].drawFaceDown();
  numOfFaces.splice(0, numOfFaces.length) ;
  }
}
}
	}
	setTimeout(drawBack, 700);
	}	
	}
	}
	}
  }
function Game(){
document.getElementById('pauseOfGame').disabled = false;
inserting();
for(i=0; i<tiles.length; i++){
	tiles[i].drawFaceDown();
}

//Changing the Sizes of the Game Area When Resizing the Window of the Browser
var secondWidthSize;
window.addEventListener('resize', function (){
  secondWidthSize = $(".pageContent").width();
}, false);
//Calculating Changing in Window Sizes
function calculateResize(){
var persentageChange = secondWidthSize/firstWidthSize;
firstWidthSize = secondWidthSize;
return persentageChange;
}
	
function changeSize(){
var correction = calculateResize();
for(i=0; i<tiles.length; i++){
tiles[i].x = tiles[i].x * correction;
tiles[i].y = tiles[i].y * correction;
}
for(i=0; i<tiles.length; i++){
 tiles[i].width = ctx.canvas.width/5.205;
if(!tiles[i].isFaceUp){
 ctx.clearRect(tiles[i].x, tiles[i].y, tiles[i].width, tiles[i].width);
 tiles[i].drawFaceDown();
}else{
 ctx.clearRect(tiles[i].x, tiles[i].y, tiles[i].width, tiles[i].width);
 tiles[i].faceUp();
}
}
}
window.addEventListener('resize', changeSize, false);



 function pauseTheGame(){
   clearInterval(idInterval);
 }
  document.getElementById('pauseOfGame').addEventListener('click', pauseTheGame, false);
  document.getElementById('pauseOfGame').addEventListener('click', openAlert, false);
}
//Customizes Alert Box
    var alertDialog = document.getElementById('alertDialog');
	var overlayForDialog = document.getElementById('overlayForDialog');
	var fromOpacity = 10;
	
    function openAlert(){
	   overlayForDialog.style.display = 'block';
	   $("#alertDialog").fadeIn(500);
	   document.getElementById('bottomPart').innerHTML = '<button id="startNg" onclick="startGame(); closeAlert()">Start New Game</button>        <button id="continueG" onclick="continueGame();">Continue Game</button>'
	}
	function closeAlert(){
		$("#alertDialog").fadeOut(1000);
	    overlayForDialog.style.display = 'none';
	}
 function continueGame(){
 if (numClicked > 0){
  timer();
  }
  closeAlert()
 }
 //Starting New Game
 function startGame(){
   document.getElementById('pauseOfGame').disabled = false;
   tiles.length=0;
   inserting();
   numOfFaces = [];
   numClicked = 0;
   numAttem = 0;
   numOfSuccess = 0;
 for(i=0; i<tiles.length; i++){
  tiles[i].drawFaceDown();
  }

   window.clearInterval(idInterval);
   document.getElementById('timeOfclock').innerHTML = "00:00:00";
   document.getElementById('numAttem').innerHTML = '0';
   document.getElementById('successfulAttempts').innerHTML = '0';
   seconds = 0;
   hours = 0;
   minutes = 0;
 }

window.addEventListener("load", Game, false);
 
 </script>
</div>