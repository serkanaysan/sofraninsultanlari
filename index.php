<!doctype html>
<html>
    
<head>
    <?php include('controls/head.php'); ?>
</head>

<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1851494148395945',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();   
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="container-1" class="container-fluid maggi-container" style="display: block;">
        <div class="row" style="text-align: center; margin-top: 20px;">
            <div class="col-sm-12">
                <img src="assets/img/logo.png" />
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <h3>Elinizdeki malzemeler ile<br>yemek tariflerini gör,<br>iftar sofranı oluştur!</h3>
            </div>
            <div class="col-sm-12">
                <img src="assets/img/cek.png" />
            </div>
            <div class="col-sm-12" style="margin-top: 20px;">
                <img src="assets/img/paketler.png" />
            </div>
            <div class="col-sm-12" style="margin-top: 20px;">
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-primary">Facebook ile bağlan</fb:login-button>
                <div class="checkbox">
                    <small>
                        <input type="checkbox"> Katılım koşullarını okudum ve kabul ediyorum.
                    </small>
                </div>
            </div>
            <div class="col-xs-6" style="margin-top: 20px;">
                <a href="#" class="btn btn-maggi" data-toggle="modal" data-target="#nasilkatilirim">Nasıl Katılırım?</a>
            </div>
            <div class="col-xs-6" style="margin-top: 20px;">
                <a href="#" class="btn btn-maggi" data-toggle="modal" data-target="#katilimkosullari">Katılım Koşulları</a>
            </div>
        </div>
    </div>
    
    <div id="container-2" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; margin-top: 20px;">
            <div class="col-sm-12">
                <img src="assets/img/logo.png" />
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <h4>Merhaba</h4>
                <img data="fbphoto" class="img-circle" />
                <h2 data="adsoyad"></h2>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-default" href="#" role="button">Malzemelerin fotoğraflarını çek</a>
            </div>
            <div class="col-sm-12">
                <h5>ya da</h5>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-default" href="#" role="button" onclick="changeContainer('container-3');">Malzemeleri seçerek oluştur</a>
            </div>
        </div>
    </div>
    
    <div id="container-3" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; margin-top: 20px; margin-bottom: 10px;">
            <div class="col-sm-12">
                <img src="assets/img/logo.png" />
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" />
                <h2 data="adsoyad"></h2>
            </div>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="nasilkatilirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nasıl Katılırım?</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                    <p>
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="katilimkosullari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Kampanya Katılım Koşulları</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Nulla hendrerit quam nec sapien semper varius.</li>
                        <li>Cras pulvinar dolor sed odio porttitor, vel luctus mauris pellentesque.</li>
                        <li>Phasellus commodo ante ac gravida volutpat.</li>
                        <li>Donec vulputate velit a molestie imperdiet.</li>
                        <li>Mauris nec sapien sit amet felis consectetur feugiat.</li>
                        <li>Nulla aliquam turpis in nunc dignissim, vitae tincidunt sapien ullamcorper.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('controls/footer.php'); ?>
</body>

</html>
