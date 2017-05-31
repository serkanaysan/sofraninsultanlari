<?php


$data = json_decode($_POST['data']);

foreach($data->malzemeAciklama as $d){
    //echo $d;
}



include('dbConfig.php');

$sql = "Insert Into recipe (title, description, imageurl, typeid) Values ('".$data->yemek->baslik."', '".$data->yemek->tarif."', '".$data->yemek->resim."', ".$data->yemek->type.")";

if(mysqli_query($conn, $sql)){
    echo 'Yemek Kaydı Başarılı';
}
else{
    echo mysqli_error($conn);
}

$yemekid = mysqli_insert_id($conn);

$malzeme = array();

foreach($data->malzeme as $d){
    $numRow = 0;
    $sql = "Select * From material Where title='".$d."'";

    $result = mysqli_query($conn, $sql);
    $numRow = mysqli_num_rows($result);
    
    if($numRow == 0){
        $sql = "Insert Into material (title, imageurl, colorcode) Values ('".$d."', 'test.png', '#ffffff')";

        if(mysqli_query($conn, $sql)){
            echo 'Malzeme Kaydı Başarılı';
            array_push($malzeme, mysqli_insert_id($conn));
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        while($row = mysqli_fetch_assoc($result)){
            array_push($malzeme, $row["id"]);
        }
    }
    
    
}
$i = 0;
foreach ($data->malzemeAciklama as $d) {
    $sql = "Insert Into recipematerial (materialid, recipeid, description) Values (".$malzeme[$i].", ".$yemekid.", '".$d."')";

    if(mysqli_query($conn, $sql)){
        echo 'Malzeme Kaydı Başarılı';
        array_push($malzeme, mysqli_insert_id($conn));
    }
    else{
        echo mysqli_error($conn);
    }
    $i++;
    
}




mysqli_close($conn);

?>