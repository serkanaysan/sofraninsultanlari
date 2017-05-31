<?php



if($_POST){
    include('dbConfig.php');

    $query = "Insert Into userrecipe (recipe1id, recipe2id, recipe3id, recipe4id, loginlogid) Values (".$_POST["corba"].",".$_POST["arasicak"].",".$_POST["anayemek"].",".$_POST["tatli"].",".$_POST["loginlogid"].")";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(array('code' => '200', 'status' => 'success','message'=> 'Recipe inserted'));
    } else {
        echo json_encode(array('code' => '300', 'status' => 'error','message'=> mysqli_error($conn)));
    }
    
    //mysqli_close($conn);
}

?>