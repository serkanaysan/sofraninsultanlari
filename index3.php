<html>
    
    
</html>

<?php
$homepage = file_get_contents('http://yemek.com/tarif/domates-corbasi/');
echo $homepage;
?>

<script>
var jquery = document.createElement('script');
jquery.src="https://code.jquery.com/jquery-3.2.1.js";
document.head.appendChild(jquery);

setTimeout(function(){
	var t=$('._24TExulPZfGpRqfeteo1wi').find('span').html() + '\n';

    $('._1GGPkHIiaumnRMT-S1cU29').each(function( index ) {
        t = t + $( this ).find('span').text() + '\n';
    });

    $('._3Z2MUIzzMNhESoosDGuUqN').find('li').each(function( index ) {
        t = t + $(this).find('p').text();
    });

	console.log(t);
},1000);
</script>