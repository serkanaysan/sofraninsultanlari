<?php

include("../backend/dbConfig.php");

if(isset($_GET["query"])){
    $query = "SELECT id as value, title as label  FROM material WHERE title like '".$_GET["query"]."%' Order By title";
}
else{
    $query = "SELECT * FROM material";
}

//execute query
$result = mysqli_query($conn, $query);

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

header("Content-Type: application/json; charset=utf-8;");
echo json_encode($emparray, JSON_PRETTY_PRINT);

//close the db connection
mysqli_close($conn);

?>