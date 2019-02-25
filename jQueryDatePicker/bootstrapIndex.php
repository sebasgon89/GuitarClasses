<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $(document).ready(function() {
        $("#datepicker").datepicker({dateFormat: 'yymmdd'});
      });
      $(function() {
      
      $("#datepicker").datepicker({
        onSelect: function(dateText) {
          display("Selected date: " + dateText + ", Current Selected Value= " + this.value);
          $(this).change();
        }
      }).on("change", function() {
        display($(this).val());
      });
    
      function display(msg) {
        $("<p>").html(msg).appendTo(document.body);
      }

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
  </head>
  <body>
  <div class="container py-5">
    <div class="row">
        <div class="col-6">
          <p>Date: <div id="datepicker"></div></p>
        </div>
        <div class="col-6">
          <p>Available times: </p>
          <p><input type="button" value="Click me" name="boton" id="boton">
          <p><input type="button" value="Disable first one" name="toDisable" id="toDisable"> 
          <p id="emptyP">
        </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>