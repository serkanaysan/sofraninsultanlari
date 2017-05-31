<?php
if (isset($_FILES['myFile'])) {
    $strtotime = strtotime("now");
    $name = preg_replace("/ /", "-", $_FILES['file']['name']);
    $filename = $_GET["loginlogid"].'_'.$strtotime.'_'.$name.'.png';
    
    move_uploaded_file($_FILES['myFile']['tmp_name'], "upload/" . $filename);
    
    $delta = 255;
    $reduce_brightness = false;
    $reduce_gradients = false;
    $num_results = 1;

    include_once("lib/colors.inc.php");
    $ex=new GetMostCommonColors();
    $colors=$ex->Get_Color("upload/".$filename, $num_results, $reduce_brightness, $reduce_gradients, $delta);

    
$colorcode = '';    
foreach ( $colors as $hex => $count )
{
	if ( $count > 0 )
	{
		$colorcode = $hex;
	}
}

    
    echo json_encode(array('filename' => $filename, 'colorcode' => $colorcode, 'fuId' => $_GET["fuId"]));
}
?>