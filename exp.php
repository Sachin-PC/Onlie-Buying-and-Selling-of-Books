<!DOCTYPE html>
<html>
<head>
<style>
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
</style>
</head>
<body>

<h2>Click on the button to Select the books SEM wise</h2>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Semester</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="EC.php">ALL</a>
    <a href="EC1.php">FIRST</a>
    <a href="EC2.php">SECOND</a>
    <a href="EC3.php">THIRD</a>
	<a href="EC4.php">FOURTH</a>
	<a href="EC5.php">FIFTH</a>
	<a href="EC6.php">SIXTH</a>
	<a href="EC7.php">SEVENTH</a>
	<a href="EC8.php">EIGHTH</a>
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
