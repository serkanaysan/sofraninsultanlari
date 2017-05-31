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
        <meta property="og:title" content="Content titile" />
        <meta property="og:image" content="image ulr path" />
        <meta property="og:url" content="url of page" />
        <meta property="og:description" content="your content"  />
    </head>
    <body>
        <?php
        $title=urlencode('Content title');
        $url= urlencode('url of page');
        $summary=urlencode("Content you can dynamically display like: (E.g.: Time:".(($usertime < 3600)?($usertime.' Seconds'): (round($usertime/60, 2))." Minutes, Points".$userscore.") ") );
        $image=urlencode('image url path to display image');
        ?>
        
        <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=550,height=300');" href="javascript: void(0)"></a>
    </body>
</html>
