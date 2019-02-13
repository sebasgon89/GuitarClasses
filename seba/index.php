<?php

// Timezone
date_default_timezone_set("America/Argentina/Buenos_Aires");

// functions file
include 'functions.php';

// config file
include 'config.php';

// Verifying from field
if (isset($_POST['from'])) 
{

    // ... if so, we verify that it is not empty
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        // start and and are received from the form

        $beggining = _giveFormat($_POST['from']);

        $final  = _giveFormat($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $beggining_normal = $_POST['from'];

        // and "formatted" with the function
        $final_normal  = $_POST['to'];

        // other fields from the form with the evaluate function to remove not allowed chars
        $title = evaluate($_POST['title']);
        $body   = evaluate($_POST['event']);
        $clase  = evaluate($_POST['class']);

        // class started
        //$query="INSERT INTO classes VALUES(null,'$title','$body','','$clase','$beggining','$final','$beggining_normal','$final_normal')";
        $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        // run sql query
        $conn->query($query); 

        // id of the last inserted element
        $im=$conn->query("SELECT MAX(id) AS id FROM classes");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // to generate the link and update it into the DB
        $link = "$base_url"."class_description.php?id=$id";
        $query="UPDATE classes SET url = '$link' WHERE id = $id";

        // sql run
        $conn->query($query); 

        // back to index
        header("Location:$base_url"); 
    }
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
       <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>
    </head>

</head>
<body style="background: white;">

        <div class="container">

                <div class="row">
                        <div class="page-header"><h2></h2></div>
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                    <div class="pull-right form-inline"><br>
                                        <button class="btn btn-info" data-toggle='modal' data-target='#add_class'>Añadir Evento</button>
                                    </div>

                </div><hr>

                <div class="row">
                        <div id="calendar"></div> <!-- calendar -->
                        <br><br>
                </div>

                <!--modal window-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //today creation
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.geinzztMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //Calendar values
                var options = {

                    // set up modal use for windoe
                        modal: '#events-modal', 

                        // inside of an iframe
                        modal_type:'iframe',    

                        //classes from db
                        events_source: '<?=$base_url?>get_classes.php', 

                        // calendar set as month by default
                        view: 'month',             

                        // and today
                        day: yyyy+"-"+mm+"-"+dd,   


                        // default language
                        language: 'es-ES', 

                        //calendar temmplate
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


                        // Time start
                        time_start: '08:00', 

                        // Time end
                        time_end: '22:00',   

                        // Time split
                        time_split: '30',    

                        // calendar width
                        width: '100%', 

                        onAfterEventsLoad: function(classes)
                        {
                                if(!classes)
                                {
                                        return;
                                }
                                var list = $('#classlist');
                                list.html('');

                                $.each(classes, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id where the calendar will be shown
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

<div class="modal fade" id="add_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="from">Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="tipo">Tipo de evento</label>
                    <select class="form-control" name="class" id="tipo">
                        <option value="class-info">Informacion</option>
                        <option value="class-success">Exito</option>
                        <option value="class-important">Importantante</option>
                        <option value="class-warning">Advertencia</option>
                        <option value="class-special">Especial</option>
                    </select>

                    <br>


                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>


                    <label for="body">Evento</label>
                    <textarea id="body" name="class" required class="form-control" rows="3"></textarea>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
