<?php
session_start();
include 'sample.php';
if(isset($_SESSION["a"])=="")
{
	   header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {		
	
	//Execute the slideShow
	slideShow();

});

function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}

</script>

<style>
h1{
text-align:left;
font-size:30pt;
color: #ffff99;
}
h3
{
	text-align:center;
	color:black;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	position:fixed;
	top=0;
	width:100%;
}

li {
    float:right;
	}

li a {
    display:block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #323e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: brown;
    padding: 12px 16px;
    text-decoration: None;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
.clear {
	clear:both
}

#gallery {
	float:right;
	position:relative;
	height:1050px;
	width:800px;
}
	#gallery a {
		float:center;
		width:500px;
		position:absolute;
	}
	
	#gallery a img {
		float:r;
		width:500px;
		border:none;
	}
</style>
</head>
<body>
<ul> 
  <li><a href="Logout.php">Logout</a></li>
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a class="active" href="home.php">Home</a></li>
  <h1><img src="images.jpg" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
  
  <div style="padding:110px;margin-top:-10px;height:500px;">

<h2 style="color:blue;text-align:left;">Category</h2>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">BRANCH</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="ECSEM.php">Electronics and Communications</a>
    <a href="CSSEM.php">Computer Science</a>
    <a href="ISSEM.php">Information Science</a>
	<a href="EEESEM.php">Electrical Science</a>
	<a href="CIVILSEM.php">Civil</a>
	<a href="MECHSEM.php">Mechanical</a>
	<a href="IPSEM.php">Industrial Production</a>
  </div>
</div>
<div id="gallery">

	<a href="#" class="show">
		<img src="images/CN.jpeg" alt="Flowing Rock" width="580" height="560" title="" alt="" rel=""/>
	</a>
	
	<a href="#">
		<img src="images/DSC.jpg" alt="Grass Blades" width="580" height="560" title="" alt="" rel=""/>
	</a>
	
	<a href="#">
		<img src="images/ATD.jpg" alt="Ladybug" width="580" height="560" title="" alt="" rel=""/>
	</a>

	<a href="#">
		<img src="images/SS.jpg" alt="Lightning" width="580" height="560" title="" alt="" rel=""/>
	</a>
	
	<!--<a href="#">
		<img src="images/lotus.jpg" alt="Lotus" width="580" height="560" title="" alt="" rel=""/>
	</a>
	
	<a href="#">
		<img src="images/mojave.jpg" alt="Mojave" width="580" height="360" title="" alt="" rel=""/>
	</a>
		
	<a href="#">
		<img src="images/pier.jpg" alt="Pier" width="580" height="360" title="" alt="" rel=""/>
	</a>
	
	<a href="#">
		<img src="images/sea-mist.jpg" alt="Sea Mist" width="580" height="360" title="" alt="" rel=""/>
	</a>
	
	<a href="#">
		<img src="images/stones.jpg" alt="Stone" width="580" height="360" title="" alt="" rel=""/>
	</a>

	<div class="caption"><div class="content"></div></div>-->
</div>
<div class="clear"></div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</div>
</body>
</html>
