<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    </head>
    <body>
        
        <form action="" method="post">
            url: <input type="text" name="url" required=""><br>
<input type="submit">
</form>
        
        <?php
        if($_POST){
        $homepage = file_get_contents($_POST["url"]);
        echo $homepage;
        
        echo "<script>
        
            var t=$('._24TExulPZfGpRqfeteo1wi').find('span').html() + '<br>';
            
            var resim = $('._3Hxabo-HneJzhXAamIymZP').find('img').attr('src'); 
            
            var malzeme = new Array();
            var malzemeAciklama = new Array();
            $('._1GGPkHIiaumnRMT-S1cU29').each(function( index ) {
                malzemeAciklama.push($( this ).find('span').eq(0).text());
                malzeme.push($( this ).find('span').eq(1).text());
            });
            
            var tarif='';

            $('._3Z2MUIzzMNhESoosDGuUqN').find('li').each(function( index ) {
                tarif = tarif + $(this).find('p').text();
            });
            
            //document.body.innerHTML = t;

            var yemek = {yemek:{baslik:$('._24TExulPZfGpRqfeteo1wi').find('span').html(),tarif:tarif,resim:resim, type:4}, malzeme, malzemeAciklama};
  
        console.log(yemek);
        
        var data = JSON.stringify(yemek);
        $.ajax({
            url: 'backend/insertData.php',
            type: 'post',
            data: {data:data},
            success: function(json){
                console.log(json);
            }
        });
        </script>";
        }
        ?>
        
        
        
    </body>
</html>
