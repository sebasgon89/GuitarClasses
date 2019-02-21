<?php

// Incluimos config file
include 'config.php'; 

// Query to get all classes from DB
$sql="SELECT * FROM classes"; 

// Checking if not empty
if ($conn->query($sql)->num_rows)
{ 
    // building an array
    $data = array(); 
    //all results from the query stored in a multidimensional array
    $i=0; 

    // Executing the query
    $e = $conn->query($sql); 

    while($row=$e->fetch_array()) // using a while loop to read through all DB records
    {
        // adding classes to the array
        $data[$i] = $row; 
        $i++;
    }

    // DB data to JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $data
                )
            );

    }
    else
    {
        // If no classes found then the following message is shown.
        echo "No data"; 
    }


?>
