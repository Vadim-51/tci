<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Typing Test</title>
<style>
#divParent{
  display: none;
}
.textGame{
  min-width: 220px;
}
#mainPartOfTheGame{
  width: 90%;
  min-width: 190px;
  margin: 0 auto;
  padding: 6% 5% 10% 5%;
  border-radius: 4px;
}
.board{
  margin-bottom: 5%;
  text-align: center;
  clear: both;
}
.board li{
  list-style: none;
  display: inline-block;
  background-color: #3fb0ac;
  border: 2px teal solid;
  box-shadow: 0 0 2px black;
  padding: 1%;
  border-radius: 4px;
  text-align: center;
  margin-left: 1% 1% 0% 1%;
}

#textForTest{
  font-size: 16px;
  width: 200px;
  background-color: #F79F79;
  color: #30231d;
  margin: 0 auto;
  margin-top: 8%;
  border-radius: 3px;
  padding: 20px 30px;
  height: 20px;
  border: 2px #e05038 solid;
  box-shadow: 0 0 20px black;
  overflow: auto;
  overflow-x: hidden;
}
#errorArea{
  height: 10%;
  margin-top: 2%;
  margin-bottom: 2%;
  color: darkRed;
  font-weight: bold;
  font-size: 1.2em;
}
#inputTextArea{
  text-align: center;
}
#inputText{
  padding: 20px;
  font-size: 1.4em;
  border-color: #64706c;
  color: #64706c;
  border-radius: 3px;
  background-color: aliceBlue;
  width: 160px;
  transition: .35s all;
}
#inputText:focus{
  border-color: #f6f1ed;
}
#needToBeTypedLetter{
  position: absolute;
  margin-left: -2px;
  margin-top: .5px;
  border: 1px grey solid;
  border-radius: 7px;
  padding-top: 20px;
  padding-bottom:20px;
  font-size: 24px;
  height: 30px;
  width: 38px;
  text-align: center;
}
#forBorder{
  display: inline-block;
  text-align: right;
  width: 245px;
  padding-right: 50px;
  border: 1px grey solid;
  border-radius: 7px;
  padding: 8px;
  box-shadow: 0 0 10px black;
  margin-bottom: 20px;
}
#hightlight{
  background-color: yellow;
}
.project{
  font-size: 1.4em;
  text-align: center;
  color:#666666;
}
#lowerButtons{
  position: relative;
}
#arrowImage{
  float: right;
  margin-bottom: -5%;
  opacity: 0;
  transition: all .3s;
}

#leftRight{
  position: relative;
  display: inline-block;
  float: right;
  margin-bottom: 20px;
}

#skipRight{ 
  transition: all .3s;
}
#skipLeft{
  margin-right: 15px;
  transition: all .3s;
}
#restartLevel{
  margin-left: 15px;
  transition: all .3s;
}
#restartGame{
  transition: all .3s;
}


@media screen and (min-width:480px) and (max-width:768px){
  .board li{
   display: block;
   margin: 0 auto;
   width: 135px;
   margin-bottom: 2%;
   font-size: 1.1em;
  }
  #arrow{
  margin-left: 70%;
  margin-top: 5%;
  margin-bottom: -10%;
}
#textForTest{
  width: 170px;
}
#inputText{
  padding: 15px;
  font-size: 1.2em;
  width: 154px;
}
#forBorder{
  width: 217px;
  padding-right: 30px;
  border: 1px grey solid;
  border-radius: 7px;
  padding: 8px;
  box-shadow: 0 0 10px black;
  margin-bottom: 30px;
  margin-top: 10px;
}
#needToBeTypedLetter{
  height: 20px;
  width: 30px;
  font-size: 1.2em;
  margin-left: -5px;
  margin-top: 1px;
  padding-top: 16px;
  padding-bottom: 16px;
  text-align: center;
}
#skipLeft, #skipRight, #restartGame, #restartLevel, #arrowImage{
  width: 50px;
  height: 50px;
}
#leftRight{
  margin-bottom: 30px;
}
}
@media screen and (max-width:480px){
   .board li{
   display: block;
   margin: 0 auto;
   width: 135px;
   margin-bottom: 2%;
   font-size: 1.1em;
  }
  .project{
 
  font-size: .7em;
}
input{
  width: 220px;
}

#arrow{
  margin-left: 60%;
  margin-top: 5%;
  margin-bottom: -10%;
}
#textForTest{
  width: 120px;
}
#inputText{
  padding: 15px;
  font-size: 1.2em;
  width: 102px;
}
#forBorder{
  width: 165px;
  padding-right: 29px;
  border: 1px grey solid;
  border-radius: 7px;
  padding: 8px;
  box-shadow: 0 0 10px black;
  margin-bottom: 30px;
  margin-top: 10px;
}
#needToBeTypedLetter{
  height: 20px;
  width: 28px;
  font-size: 1.2em;
  margin-left: -4px;
  margin-top: 1px;
  padding-top: 16px;
  padding-bottom: 16px;
  text-align: center;
}
#skipLeft, #skipRight, #restartGame, #restartLevel, #arrowImage{
  width: 40px;
  height: 40px;
}
#leftRight{
  margin-bottom: 30px;
}
}
</style>
<div class="pageContent">
<h2 class="project">Typing Test</h2>
<div id="mainPartOfTheGame">
<div id="leftRight">
<image class="hoverButtons" id="skipLeft" src="./typingGameImages/skipLeft.png"><image class="hoverButtons" id="skipRight" src="./typingGameImages/skipRight.png"></div>
<div class="board">
   <li id="time">00:00:00</li>
   <li>Speed: <span id="speedQuantity">0</span></li>
   <li>Word number: <span id="wordNumber">0</span></li>
   <li>Error number: <span id="errors">0</span></li>
   <li>Level: <span id="level1">1</span></li>
</div>
 <div id="textForTest">
 <p></p>
 </div>
 <div id="inputTextArea">
  <div id="errorArea">
   No key has pressed so far...
  </div>
  <div id="forBorder">
  <div id="needToBeTypedLetter">A</div>
  <input type="text" id="inputText" autofocus/>
  </div>
 </div>
 
<div id="lowerButtons"><image id="arrowImage" class="hoverButtons" src="./typingGameImages/moveLevel.png">
<image id="restartGame" class="hoverButtons" src="./typingGameImages/restartGame.png">
<image id="restartLevel" class="hoverButtons" src="./typingGameImages/restartLevel.png">
</div>
 <div id="divParent"></div>
</div>
<script>
var levelNumber = 1;
var counter = 0;
var counting = 0;
var inputArr = [];
var errorNumber = 0;
var numPressedKeys = 0;
var numWords = 0;
var secondNum = 0;
var idInterval;
var idInterval1;
var arrayOfText; 
for(i=0; i<10; i++){
  var divChild = document.createElement('div');
  var divArray = document.getElementById("divParent").appendChild(divChild);
  $(divArray).load('./TypingGameTexts/' + i + '.txt');
}
arrayOfText = $("#divParent").children();
$(document).on("load", function(){
	    document.getElementById('textForTest').innerHTML = arrayOfText.eq(0).text(); 
        }
)
window.addEventListener('load', function(){
	   setTimeout(function(){$("#restartLevel").trigger("click");}, 500);
},false);

window.addEventListener('load', function(){$("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[0].backgroundUrl+')');}, false);
window.addEventListener('load', creatingInterface, false);
$(window).ready(function(){
document.getElementById("level1").innerHTML = levelNumber;
});
$('.hoverButtons').on({
mousedown: function(){
   $(this).css({"transform": "scale(1, 1)", "cursor": "pointer"});
},
   mouseup:function(){
   $(this).css({"transform": "scale(1.15, 1.15)", "cursor": "pointer"});
},
   mouseover: function(){
   $(this).css({"transform": "scale(1.15, 1.15)", "cursor": "pointer"});
},
   mouseout: function(){
   $(this).css("transform", "scale(1, 1)");
}
});
//Class for object that responsible for levels
var Lev = function(url, level, backgroundUrl){
  this.url = url;
  this.level = level;
  this.backgroundUrl = backgroundUrl;
}
LevelsArray = [];
for(i=0; i<=9; i++){
  LevelsArray.push(new Lev('./typingGameTexts/' + i + '.txt', i+1, './typingGameImages/' + i + '.png'));	 
}
var clickedTimes = 0;


var numberOfWordsInText;
var textForTest;
var textForTestArr;
//Creating common conditions for changing levels and when loading//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function creatingInterface(){
  textForTest = document.getElementById('textForTest').innerText;
  textForTestArr = textForTest.split('');
  inputArr.length = 0;
  $('#needToBeTypedLetter').css("background-color", "transparent");
  numberOfWordsInText = textForTest.split(' ')
  document.getElementById('textForTest').innerHTML = '<p>' + '<span id="hightlight">' + textForTest.charAt(0) + '</span>'  + textForTest.substring(1,textForTest.length) + '</p>';
  document.getElementById('needToBeTypedLetter').innerHTML = textForTest.charAt(0);
  document.getElementById('inputText').value = '';
  counter = 0;
  numWords = 0;
  counting = 0;
  numPressedKeys = 0;
  errorNumber=0;
  clearInterval(idInterval);
  clearInterval(idInterval1);
  secondNum = 0;
  seconds = 0;
  hours = 0;
  minutes = 0;
  document.getElementById("arrowImage").style.opacity = 0;
 
}


function returnBeginning(){
  document.getElementById("inputText").value = '';
  document.getElementById("inputText").focus();
  document.getElementById("errorArea").innerHTML = "No key has pressed so far..."
  document.getElementById("errors").innerHTML = "0";
  document.getElementById("wordNumber").innerHTML = "0";
  document.getElementById("speedQuantity").innerHTML = "0";
  document.getElementById("time").innerHTML = "00:00:00";
}
//Change Level of the Game//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#arrowImage').click(function(){
   $("#inputText").focus();
   clickedTimes++;
   if(clickedTimes == 10) {
   clickedTimes = 0;
   }
  document.getElementById('textForTest').innerHTML = '';
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level;
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  creatingInterface();
  returnBeginning();
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')');
})
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#skipRight').click(function(){
  $("#inputText").focus();
  clickedTimes++;
  document.getElementById('textForTest').innerHTML = '';
  if(clickedTimes > 9) {
  clickedTimes = 0;
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')');  
  } else {
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')'); 
}
  creatingInterface();
  returnBeginning();
})
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#skipLeft').click(function(){
  $("#inputText").focus();
  clickedTimes--;
  document.getElementById('textForTest').innerHTML = '';
    if(clickedTimes < 0) {
  clickedTimes = 9;
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')'); 
} else {
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')'); 
}
  creatingInterface();
  returnBeginning();
})
$('#restartGame').click(function(){
  $("#inputText").focus();
  clickedTimes=0;
  document.getElementById('textForTest').innerHTML = '';
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')');  
  
  creatingInterface();
  returnBeginning();
})
//Begin from the start of level again
$('#restartLevel').click(function(){
  $("#inputText").focus();
  document.getElementById('textForTest').innerHTML = '';
  document.getElementById('textForTest').innerHTML = arrayOfText.eq(clickedTimes).text();
  document.getElementById('level1').innerHTML = LevelsArray[clickedTimes].level; 
  $("#mainPartOfTheGame").css("background-image", 'url(' + LevelsArray[clickedTimes].backgroundUrl+')');  
  creatingInterface();
  returnBeginning();
})


//Begining of Game/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
$("#inputText").keypress(function(evt) {
   if($("#inputText").is(':focus')){
    evt = evt || window.event;
	
    var charCode = typeof evt.which == "number" ? evt.which : evt.keyCode;

    if (charCode) {
        inputArr.push(String.fromCharCode(charCode));
    }
var cont;
  if (numPressedKeys < 1){
  numPressedKeys++;
  timer();
  timer1();
  }

  var speedOfWords;
if(inputArr[counter] == textForTestArr[counter]){
  document.getElementById('textForTest').innerHTML = '<p>' + textForTest.substring(0, counting+1) + '<span id="hightlight">' + textForTest.charAt(counting+1) + '</span>'  + textForTest.substring(counting+2,textForTest.length) + '</p>';
  document.getElementById('needToBeTypedLetter').innerHTML = '';
  document.getElementById('needToBeTypedLetter').innerHTML = textForTest.substring(counting+1, counting+2);
  $('#needToBeTypedLetter').css("background-color", 'rgba(164, 236, 0, 0.5)');
  counting++;
  cont = 'right';
//Scrolling/////////////////////////////////////////////////////////////////////////////
var positionOfSpan = $("#hightlight").offset().top - $("#textForTest").offset().top;;
var positionOfParentSpan = $("#textForTest").offset().top;
var fromTop = Math.abs(positionOfSpan);
var fromButtom = positionOfSpan - 26;
if(positionOfSpan < 0){
  document.getElementById("textForTest").scrollTop += fromButtom;
} else if(positionOfSpan > 45){
  document.getElementById("textForTest").scrollTop += fromTop;
} 

if(textForTestArr.length == inputArr.length){
   $("#arrowImage").css('opacity', '1');
   clearInterval(idInterval);
   clearInterval(idInterval1);
}
if(String.fromCharCode(charCode) == ' ' || textForTestArr.length == inputArr.length){
   numWords++;
  document.getElementById('wordNumber').innerHTML = numWords;
  if(numWords >= 1){
  if (secondNum < 0.3){
    speedOfWords = 120;
  }else{
    speedOfWords = Math.round(60/(secondNum/numWords));
	}
	document.getElementById('speedQuantity').innerHTML = speedOfWords;
  } 
}  
}else if((inputArr[counter] != textForTestArr[counter])){
  evt.preventDefault();
  counter--;
  $("#needToBeTypedLetter").css('background-color', 'rgba(255, 80, 89, 0.5)');
  cont = 'it is wrong';
  inputArr.pop();
  errorNumber++;
  document.getElementById('errors').innerHTML = errorNumber;
}
if(textForTestArr.length < inputArr.length){
  evt.preventDefault();
  numWords--;
  inputArr.pop();
}

  counter++;
document.getElementById('errorArea').innerHTML = cont;
}
} );




//Timer for the Game
 var timeOfclock = document.getElementById('time').innerHTML;
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
	return document.getElementById('time').innerHTML = numOfTime;
  }
  
  function justSeconds(){
     secondNum++;
  }
 function timer1(){
    idInterval1 = setInterval(justSeconds, 1000);
 }
 function timer(){
    idInterval = setInterval(numberOfSec, 1000);
  }

</script>
</div>