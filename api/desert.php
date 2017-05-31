<?php

include("../backend/dbConfig.php");

if(isset($_GET["query"])){
    $query = "SELECT id , title  FROM recipe WHERE id=".$_POST["query"]." typeid=4 Order By title";
}
else{
    $query = "SELECT id , title, imageurl  FROM recipe WHERE typeid=4 Order By title";
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