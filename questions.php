<html>
<head>
<script>
function showAnswer(str) {
  if (str == "") {
    document.getElementById("answer").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("answer").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getAnswer.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showAnswer(this.value)">
  <option value="">Select a question:</option>
  <option value="1">Tuition fees for Foundation in Arts and Education</option>
  <option value="2">What is the duration of undergraduate program</option>
  <option value="3">How is the facilities in UNMC</option>
  </select>
</form>
<br>
<div id="answer"><b>Answer will show here</b></div>

<br>
<input type="text" placeholder="type your question ">

</body>
</html>