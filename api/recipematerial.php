<?php



if(isset($_POST["query"])){
    include("../backend/dbConfig.php");
    
    $query = "Select m.*, rm.description From recipe as r left join recipematerial as rm on rm.recipeid=r.id  left join material as m on rm.materialid=m.id where rm.recipeid=".$_POST["query"]."";

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
}


?>