<?php



if($_POST){
    include('dbConfig.php');

    $data = json_decode($_POST['data']);
    
    $sql = "Select * From material Where";
    $index = 0;
    foreach($data as $d){
        if($index == 0){
            $sql = $sql . " title='".$d."'";
        }
        else{
            $sql = $sql . " Or title='".$d."'";
        }
        $index++;
    }
    
    $result = mysqli_query($conn, $sql);
    $indexid = 0;
    $query = "Select r.id, r.title, r.imageurl, r.typeid, t.title as type, r.description From recipematerial as rm Left Join recipe as r On rm.recipeid=r.id Left Join type as t On r.typeid = t.id Where r.typeid != 4 And";
    while($row = mysqli_fetch_assoc($result)){
        mysqli_query($conn, "Insert Into usermaterial (loginlogid, materialid) Values (".$_POST["loginlogid"].",".$row["id"].")");
    
        if($indexid == 0){
            $query = $query . " (materialid=".$row["id"]."";
        }
        else{
            $query = $query . " Or materialid=".$row["id"]."";
        }
        $indexid++;
    }
    $query = $query . ") Group By recipeid Order By r.typeid, r.title";
    
    //execute query
    $result = mysqli_query($conn, $query);

    //create an array
    $emparray = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    
    
    header("Content-Type: application/json; charset=utf-8;");
    echo json_encode($emparray, JSON_PRETTY_PRINT);
    
    //mysqli_close($conn);
}

?>