<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root.'/admin/fnc.php');
start_session();

?>
<meta name="viewport" content="width=device-width">

<link href="https://tci.000webhostapp.com/CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="https://tci.000webhostapp.com/CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> 
<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet"/> 
<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet"/> 
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet"/>   
<link rel="shortcut icon" type="image/x-icon" href="https://tci.000webhostapp.com/assets/tci.ico"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://tci.000webhostapp.com/validate/dist/jquery.validate.js"></script>


</head>

<body>
<div id="Container">
<div id="Header">
<a href="https://tci.000webhostapp.com/index.php"><img id="logo" 
src="https://tci.000webhostapp.com/assets/logoTci.png" /></a>
<?php
if(!isset($_SESSION['valid_user']) &&  !isset($_SESSION['admin']))
{
?>
<div id="SignIn">
<span id="LogBage">LOG IN</span> | <span id="SignBage">SIGN UP</span>
</div>
<?php
}else{
?>
<div id="SignIn">
<span id="LogOutBage">LOG OUT</span>
</div>
<?php
}
?>
</div>
<div id="NavBar">
<nav>
<ul id="navBar">
<?php if(isset($_SESSION['admin'])){ ?>
 <li><a href="https://tci.000webhostapp.com/index.php">Home</a></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=articles">Articles</a></div></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=about">About</a></div></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=projects">Projects</a></div></li>
 <li id="adminPanel"><div class="forBorder"><a href="https://tci.000webhostapp.com/admin/index.php">Admin</a></div></li>
<?php }else{ ?>
 <li><a href="https://tci.000webhostapp.com/index.php">Home</a></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=articles">Articles</a></div></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=about">About</a></div></li>
 <li><div class="forBorder"><a href="https://tci.000webhostapp.com/index.php?page=projects">Projects</a></div></li>
 <?php } ?>
</ul>
</nav>
<div id="menuIcon">&#9776;</div>
</div>

<div id="dialogSignUp">
<div class="borderD">
  <h3>Sign Up</h3>
  <hr>
  <form id="signUpForm" action="" method="POST">
  <table>
  <tr>
  <td><input type="text" style="padding: 8px 4px;" id="username" placeholder="Username" name="username" /></td>
  </tr>
  <tr><td><span class="error"></span></td></tr>
  <tr>
  <td><input type="email" style="padding: 8px 4px;" id="email" placeholder="Email address" name="email" /></td>
  </tr>
  <tr><td><span class="error"></span></td></tr>
  <tr>
  <td><input type="password" style="padding: 8px 4px;" id="password" placeholder="Password" name="password" /></td>
  </tr>
  <tr><td><span class="error"></span></td></tr>
  <tr>
  <td><input type="password" style="padding: 8px 4px;" id="rpassword" placeholder="Retype Password" name="rpassword" /></td>
  </tr>
  <tr><td><span class="error"></span></td></tr>
  <tr>
  <td style="padding-bottom: 15px">
  <!--Captcha Captcha Captcha Captcha Captcha Captcha Captcha Captcha Captcha Captcha Captcha-->
  <img id="im" src="<?php echo $root."/admin/captcha.php"; ?>" />
  <input type="image" src="./assets/refresh24.png" id="refreshIm" onclick="load();"/>
  </td>
  </tr>
  <tr>
  <td><input type="text" size="20"  style="padding: 8px 4px;" id="captcha"  name="captcha" /></td>
  </tr>
  <tr><td><span class="error"></span></td></tr>
  <tr>
  <td><input type="submit" id="signBut" name="submit" value="Create Account" class="dialogButton" /> &nbsp; <span id="message"></span></td>
  </tr>
  </table>
  </form>
  </div>
  </div>
<div id="dialogLogIn">
<div class="borderD">
  <h3>Log In</h3>
  <hr/>
  <form id="LogInForm" action="" method="POST">
  <table>
  <tr>
  <td><input type="text" size="45" style="padding: 8px 4px;" id="logName" placeholder="Username" name="username" /></td>
  </tr>
  <tr><td><span class="logError"></span></td></tr>
  <tr>
  <td><input type="password" size="45" style="padding: 8px 4px;" id="logPass" placeholder="Password" name="password" /></td>
  </tr>
  <tr><td><span class="logError"></span></td></tr>
  <tr>
  <td><input type="submit" name="submit" id="logB" value="Log In" class="dialogButton" />&nbsp; <span id="messageLogIn"></span></td>
  </tr>
  </table>
  </form>
  </div>
</div>
<div id="dialogLogOut">
<div class="borderD">
  <h3>Do you really want to Log Out?</h3>
  <hr/>
  <table width="243">
  <tr>
  <td width="108"><button id="submitLogOut">Yes</button></td>
  <td width="123"><button id="declineLogOut">No</button></td>
  </tr>
  </table>
  </div>
</div>
<div id="overlayForDialog">
</div>
<script>


$("#menuIcon").on("click", function(){

if($("#NavBar").css("overflow")=='visible'){
$("#NavBar").css("overflow", "hidden");
}else{
$("#NavBar").css("overflow", "visible");
}

})


$(window).resize(function(){ 

 if(window.innerWidth < 768){
  $("#NavBar").css( "width", "100%");
 }
 
 $("#Footer").width($("#NavBar").width() - 50);
})


$(document).ready(function(){
 $("#Footer").width($("#NavBar").width() - 50);

 
})
function checkPosition(){
if(window.innerWidth > 480 && window.innerWidth < 768){
if( $(window).scrollTop() > 130){
   $("#NavBar").css({"position": "fixed", "top": "0", "box-shadow": "0px 15px 21px -12px rgba(0,0,0,0.48)", "max-width": "1050px", "width": "90%"});
}else{
   $("#NavBar").css({"position": "relative", "box-shadow": "none", "width": "100%"});
}
}else if(window.innerWidth < 480){
if( $(window).scrollTop() > 97){
   $("#NavBar").css({"position": "fixed", "top": "0", "box-shadow": "0px 15px 21px -12px rgba(0,0,0,0.48)", "width": "100%"});
}else{
   $("#NavBar").css({"position": "relative", "box-shadow": "none", "width": "100%"});
}
}else if(window.innerWidth >768){
if( $(window).scrollTop() > 130){
   $("#NavBar").css({"position": "fixed", "top": "0", "box-shadow": "0px 15px 21px -12px rgba(0,0,0,0.48)", "width": "80%"});
}else{
   $("#NavBar").css({"position": "relative", "box-shadow": "none", "width": "100%"});
}
}
}
$(window).scroll(function(){
 setTimeout(checkPosition, 100);
 $("#Footer").width($("#NavBar").width() - 50);

})

$(window).resize(function(){  
 checkPosition();
})




function load(){
$("#im").attr('src', "./admin/captcha.php?random="+(new Date).getTime());
}
$("#refreshIm").on({
		mousedown: function(){
		$(this).css("transform", "scale(.9, .9)");
	},
	mouseup: function(){
		$(this).css("transform", "scale(1, 1)");
	}
})
$(document).on("click", "#refreshIm",function(e){
     e.preventDefault();
})
var overlay = $("#overlayForDialog");
function customBox(){
   this.render = function(element){
       var element = $(element);
	   element.fadeIn(500);
	   element.css('display','inline-block');
           overlay.css('display', 'block');
   }
   this.ok = function(){
	   element.style.visibility = 'hidden';
   }
}

$(document).mouseup(function(e){
	var box = $("#dialogLogIn");
	if(!box.is(e.target) && box.has(e.target).length === 0 && box.is(':visible')){
	  $("#logName").val('');
	  $("#logPass").val('');
	  $("#messageLogIn").html('');
         box.fadeOut(500);
         overlay.css('display', 'none');
	}
})
//////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
  $("#declineLogOut").click(function(){
     var box = $("#dialogLogOut");
     box.fadeOut(500);
     overlay.css('display', 'none');
  })
})
$(document).on("click", "#LogOutBage", function(e){
	 dialog.render("#dialogLogOut");
})
$(document).on("click", "#SignBage", function(e){
     load();
     dialog.render("#dialogSignUp");
})
var dialog = new customBox;
$(document).on("click", "#LogBage",function(){
     dialog.render("#dialogLogIn");
})




$(document).mouseup(function(e){
	var box = $("#dialogLogOut");
	if(!box.is(e.target) && box.has(e.target).length === 0 && box.is(':visible')){
        box.fadeOut(500);
        overlay.css('display', 'none');
	}
})



$(document).mouseup(function(e){
	var box = $("#dialogSignUp");
	if(!box.is(e.target) && box.has(e.target).length === 0 && box.is(':visible')){
	  $("#username").val('');
	  $("#email").val('');
	  $("#password").val('');
	  $("#rpassword").val('');
          $("#captcha").val('');
	  $(".error").html('');
	  box.fadeOut(500);
          overlay.css('display', 'none');
	}
})






//vaildation form signUpForm
$(document).ready(
function(){
$("#signUpForm").validate({
  rules:
  {
   username:{
     required: true,
	 minlength: 3
   },
   password:{
     required: true,
	 minlength: 5,
	 maxlength: 15
   },
   rpassword:{
     required: true,
	 equalTo: "#password"
   },
   email:{
     required: true,
	 email: true
   },
   captcha:{
     required: true,
     minlength: 5,
	 maxlength: 5
   }
  },
  errorPlacement: function(error, element){
   $(element).closest('tr').next().find(".error").html(error);
  },
  messages:
  {
    username:{
	required: 'Enter a Valid Username',
	minlegth: 'Type at leaset 3 character for the user name'
	 },
	password:{ 
	required: 'Provide a Password',
	minlength: 'Password Needs to Be at least 5 character long',
	maxlength: 'Type no more than 15 character'
	},
	email: 'Enter a Vaild Email',
	rpassword:{
	required: 'Retype Your Password',
	equalTo: 'Password Mismatch!'
    },
    captcha:{
	required: 'Enter a captcha',
	minlength: 'Captcha has to be 5 character long',
	maxlength: 'Captcha has to be 5 character long'
	}
  },
  submitHandler: function (){
   var data = $("#signUpForm").serialize();
  $.ajax({
     
	   method: 'POST',
	   url: "https://tci.000webhostapp.com/admin/registerUser.php",
	   data: data,
	   beforeSend: function(){
	    
	     $("#message").text("sending..");
	   },
	   success: function(data){
	      if(data==1){
		  $("#message").text("Sorry, this email is already taken!");
		  
		  }
		  if(data==2){
		     $("#message").text("Registered!");
			
		     $("#dialogSignUp").fadeOut(1500, function(){$("#message").html('');
			                                             $("#SignIn").html('<span id="LogOutBage">LOG OUT</span>');});
		   overlay.css('display', 'none');
		  }
		   if(data==3){
		     $("#message").text("Try again later");
		  }
		   if(data==4){
		     $("#message").text("Wrong captcha");
		  }
		     if(data==5){
		     $("#message").text("Wrong email");
		  }
	   }
  
  });
 } 
  
});
});

//Ajax for LogOut
$(document).ready(function(){
  $("#submitLogOut").click(function(){
   $.ajax({
     url: "unset.php",
	 success: function(){
	
$("#dialogLogOut").fadeOut(1000, function(){
         $("#SignIn").html('<span id="LogBage">LOG IN</span> | <span id="SignBage">SIGN UP</span>');
											                         $("#adminPanel").fadeOut(1000); 
                         overlay.css('display','none');											$("#adminPanel").remove(); 
});
	 
	 }
   });
  });

});
//Validate LogIn Form and Send Data to the Server


$(document).ready(
function(){
$("#LogInForm").validate({
  debug: true,
  rules:
  {
   username:{
     required: true,
	 minlength: 3
   },
   password:{
     required: true,
	 minlength: 5,
	 maxlength: 15
   }
  },
  errorPlacement: function(err, el){
   $(el).closest('tr').next().find(".logError").html(err);
  },
  messages:
  {
    username:{
	required: 'Enter a Valid Username',
	minlegth: 'Username can be at least 3 character long'
	 },
	password:{ 
	required: 'Provide a Password',
	minlength: 'Password has to be at least 5 character long',
	maxlength: 'Password cannot be more than 15 character long'
	}
  },
  
submitHandler: function(){$.ajax({
     
	   method: 'POST',
	   url: "./admin/logIn.php",
	   data: $("#LogInForm").serialize(),
	   beforeSend: function(){
	    
	     $("#messageLogIn").text("processing..");
	   },
	   success: function(data){
	   
	     
	      if(data==0){
		  $("#messageLogIn").text("wrong username");
		  }
		 
		  if(data==1){
		     $("#messageLogIn").text("logged in!");
			
		     $("#dialogLogIn").fadeOut(1500, function(){$("#messageLogIn").html('');
			                                             $("#SignIn").html('<span id="LogOutBage">LOG OUT</span>');});
		      overlay.css('display', 'none');
		  }
		    if(data==2){
		  $("#messageLogIn").text("wrong password");
		  
		  }
		   if(data==3){
		     $("#messageLogIn").text("try again later");
		  }
		  if(data==4){
		      $("#messageLogIn").text("logged in as admin");
		      $("#dialogLogIn").fadeOut(1500, function(){$("#messageLogIn").html('');
			                                             $("#SignIn").html('<span id="LogOutBage">LOG OUT</span>');
														 
		$('<li id="adminPanel"><div class="forBorder"><a href="https://tci.000webhostapp.com/admin/index.php">Admin</a></div></li>').hide().appendTo("#navBar").fadeIn(1000);
														 });
			 overlay.css('display', 'none');
		  }
	   }
  
  });
}
  
});
});


$(document).ready(function(){
   $(".articleContent").hide().fadeIn(500);
   $(".pageContent").hide().fadeIn(500);
   $(".adminArea").hide().fadeIn(500);
})

</script>
<div id="Content">