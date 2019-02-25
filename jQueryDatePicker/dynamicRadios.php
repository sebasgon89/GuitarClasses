<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(document).ready(function() {
    $('#boton').click(function(e){
         //e.preventDefaul<t();
         //$("#boton").after("<br><input type='radio'value='Appended item' class='boton'></input>");
         $opt1 = "<br><input name='hour' type='radio'value='1400' class='boton'>14:00</input>";
         $opt2 = "<br><input name='hour' type='radio'value='1500' class='boton'>15:00</input>";
         $("#boton").after($opt1,$opt2);
     });
  });


  </script>
</head>
<body>
 
<p>Available times: </p>
<p><input type="button" value="Click me" name="boton" id="boton"> 
 
</body>
</html>