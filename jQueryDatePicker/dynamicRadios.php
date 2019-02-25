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
         $opt1 = "<br><label id='l1400'><input name='hour' id='h1400' type='radio'value='1400' class='boton'>14:00</input></label>";
         $opt2 = "<br><label id='l1500'><input name='hour' id='h1500' type='radio'value='1500' class='boton'>15:00</input></label>";
         $("#emptyP").after($opt1,$opt2);
     });
     $('#toDisable').click(function(e){
        $("#h1400").prop('disabled', true);
        $("#l1400").css('color', 'red');
     });
  });


  </script>

  <style>
    label {
      font-weight: bold;
    }
  </style>
</head>
<body>
 
<p>Available times: </p>
<p><input type="button" value="Click me" name="boton" id="boton">
<p><input type="button" value="Disable first one" name="toDisable" id="toDisable"> 
<p id="emptyP">


</body>
</html>