<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=userstest', 'root', '');
 $query = "
 DELETE from eventsWeblesson WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
