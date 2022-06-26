<!DOCTYPE html>
<html>
<body>
<p>First name: <input type="search" onkeyup="showHint(this.value)" id="myInput" onsearch="myFunction()"></p>

<p>Suggestions <span id="txtHint"></span></p> 

<p id="demo"></p>

<script>
function showHint(str) {
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "testPOS2.php?q="+str);
  xhttp.send();   
}

function myFunction() {
   var x = document.getElementById("myInput");
   var h2 = document.getElementById("demo");
   let html = x.value + "<br>";
   h2.insertAdjacentHTML("afterend", html);
}
</script>

</body>
</html>

