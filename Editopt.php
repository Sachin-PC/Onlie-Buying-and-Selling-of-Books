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

<h2>Click on the button to Edit your posts</h2>
<div class="dropdown">
<button onclick="myFunction1()" class="dropbtn">EDIT OPTION</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="Editselling1.php">EDIT SELL POSTS</a>
    <a href="Editrequest1.php">EDIT REQUEST POSTS</a>
  </div>
</div>
<br>
<br>
<h2>Click on the button to post your books</h2>
<div class="dropdown">
<button onclick="myFunction2()" class="dropbtn">POST OPTION</button>
  <div id="myDropdown1" class="dropdown-content">
    <a href="sellerinfo.php">SELL BOOKS</a>
    <a href="Buyerinfo.php">REQUEST BOOKS</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function myFunction2() {
    document.getElementById("myDropdown1").classList.toggle("show");
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
