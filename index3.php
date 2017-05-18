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


    <div id="maggi-carousel" class="carousel slide" data-ride="carousel">


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item">
                <div class="container-fluid">
                    <div class="row" style="text-align: center; margin-top: 20px;">
                        <div class="col-sm-12">
                            <img src="assets/img/logo2_133x66.png" />
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col-sm-12">
                            <h3>Elinizdeki malzemeler ile en güzel yemek tariflerini gör,</h3>
                        </div>
                        <div class="col-sm-12">
                            <form>
                                <fb:login-button  scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-primary">Facebook ile bağlan </fb:login-button>
                                <div class="checkbox">
                                    <small>
                                        <input type="checkbox"> Kampanya katılım koşullarını okudum ve kabul ediyorum.
                                    </small>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12">
                            <h3>İftar sofranı oluşturmaya başla!</h3>
                        </div>
                        <div class="col-sm-12">
                            <a href="#" data-toggle="modal" data-target="#nasilkatilirim">Nasıl Katılırım?</a>
                        </div>
                        <div class="col-sm-12">
                            <a href="#" data-toggle="modal" data-target="#katilimkosullari">Kampanya Katılım Koşulları</a>
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
            </div>
            <div class="item">
                <img id="myImg" class="img-circle" src="https://unsplash.it/2000/1250?image=689" data-color="firebrick" alt="Second Image">
                <div class="carousel-caption">
                    <h3 id="adsoyad">Second Image</h3>
                </div>
            </div>
            <div class="item">
                <img src="https://unsplash.it/2000/1250?image=675" data-color="violet" alt="Third Image">
                <div class="carousel-caption">
                    <h3>Third Image</h3>
                </div>
            </div>
            <div class="item">
                <img src="https://unsplash.it/2000/1250?image=658" data-color="lightgreen" alt="Fourth Image">
                <div class="carousel-caption">
                    <h3>Fourth Image</h3>
                </div>
            </div>
            <div class="item">
                <img src="https://unsplash.it/2000/1250?image=638" data-color="tomato" alt="Fifth Image">
                <div class="carousel-caption">
                    <h3>Fifth Image</h3>
                </div>
            </div>
        </div>
    </div>

    
    <?php include('controls/footer.php'); ?>
    
</body>

</html>
