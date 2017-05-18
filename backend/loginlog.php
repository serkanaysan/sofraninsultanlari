<?php

if($_POST){
    include('dbConfig.php');

    $sql = "INSERT INTO loginlog (fbid, name, fbphoto, gender) VALUES (".$_POST["fbid"].",'".$_POST["name"]."','".$_POST["imgurl"]."', '".$_POST["gender"]."')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('code' => '200', 'status' => 'success','message'=> 'Login log inserted'));
    } else {
        echo json_encode(array('code' => '300', 'status' => 'error','message'=> mysqli_error($conn)));
    }

    mysqli_close($conn);
}

?>