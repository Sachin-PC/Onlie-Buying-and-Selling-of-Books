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
<form action="exp2.php" method="post">
<h2>Click on the button to Select the books branch wise</h2>
<div class="dropdown">
<tr>
<td><select name="BRANCH">
<option value="Electronics and Communications">Electronics and Communications</option>
<option value="Computer Science">Computer Science</option>
<option value="Information Science">Information Science</option>
<option value="Electrical Science">Electrical Science</option>
<option value="Civil">Civil</option>
<option value="Mechanica">Mechanical</option>
<option value="Industrial Production">Industrial Production</option>
</select>
</td>
</tr>
  </div>
</div>
</form>
<a href="exp2.php">Electronics and Communications</a>

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
