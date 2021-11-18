<html>
<head>
<style>
dropbtn {
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
	margin-top=0px;
	float:left;
    position:fixed;
    display: inline-block;
	width:50%;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width:120px;
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
</style>
</head>
<body>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">SEMESTER</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="CS1.php">FIRST</a>
    <a href="CS2.php">SECOND</a>
    <a href="CS3.php">THIRD</a>
	<a href="CS4.php">FOURTH</a>
	<a href="CS5.php">FIFTH</a>
	<a href="CS6.php">SIXTH</a>
	<a href="CS7.php">SEVENTH</a>
	<a href="CS8.php">EIGHTH</a>
  </div>
</div>
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

</body>
</html>