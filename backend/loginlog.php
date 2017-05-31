<?php

if($_POST){
    include('dbConfig.php');
    
    $sql = "Select * From userrecipe as ur left join loginlog as ll on ur.loginlogid=ll.id Where ll.fbid=".$_POST["fbid"]." and DATE(ur.createdate)='".date('Y-m-d')."' limit 1";
    
    $result = mysqli_query($conn, $sql);
    $numRow = mysqli_num_rows($result);
    
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    
   
    if($numRow>0){
        echo json_encode(array('code' => '220', 'status' => 'datefilter', 'message' => 'User join system today', 'value' => $row[0]));
        
    }
    else{
        $sql = "INSERT INTO loginlog (fbid, name, email, fbphoto, gender) VALUES (".$_POST["fbid"].",'".$_POST["name"]."','".$_POST["email"]."','".$_POST["imgurl"]."', '".$_POST["gender"]."')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('code' => '200', 'status' => 'success','message'=> 'Login log inserted', 'loginlogid'=> mysqli_insert_id($conn)));
        } else {
            echo json_encode(array('code' => '300', 'status' => 'error','message'=> mysqli_error($conn)));
        }
    }

    
    

    mysqli_close($conn);
}

?>