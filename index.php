<!doctype html>
<html>
    
<head>
    <?php include('controls/head.php'); ?>
</head>

<body>
    <div style=display:none;"><?php echo date('Y-m-d'); ?></div>
    <div id="loading" style=" display: none; position: fixed; z-index: 9; background-color: rgba(0,0,0,.5); width: 100%;  height: 100%; text-align: center;  padding-top: 100px; "><img src="https://s-media-cache-ak0.pinimg.com/originals/a4/f2/cb/a4f2cb80ff2ae2772e80bf30e9d78d4c.gif"></div>
    
     <!-- Google Analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-59795261-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
    
    <div id="container-user" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        

        <div class="row" style=" text-align: center;">
            <?php  
            
            
        
            if(isset($_GET["userpage"])) {
                include('backend/dbConfig.php');

                $sql = 'Select r.title, r.imageurl, ll.name From userrecipe as ur Left Join recipe as r On ur.recipe1id=r.id or ur.recipe2id=r.id or ur.recipe3id=r.id or ur.recipe4id=r.id Left Join loginlog as ll On ll.id=ur.loginlogid Where ur.id='.$_GET["userpage"].' Order By r.typeid';

                $result = mysqli_query($conn, $sql);

                $i = 0;
                while($row = mysqli_fetch_assoc($result)){
                    if($i==0){
                        echo '<div class="col-sm-12 " style="color: #fff; font-weight: bold; margin-top: 60px; font-size: 20px;">'.$row["name"].'\'ın iftar sofrası </div> ';
                        echo '<div class="col-xs-offset-1 col-xs-5 col-md-3 col-md-offset-3  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Çorba</h3> </div><div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('.$row["imageurl"].');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'.$row["title"].'</p> </div> </div>';
                    }
                    else if($i==1){
                        echo '<div class="col-xs-5 col-md-3  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Ara Sıcak</h3> </div> <div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('.$row["imageurl"].');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'.$row["title"].'</p> </div> </div>';
                    }
                    else if($i==2){
                        echo '<div class="col-xs-offset-1  col-xs-5 col-md-3 col-md-offset-3  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Ana Yemek</h3> </div> <div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('.$row["imageurl"].');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'.$row["title"].'</p> </div> </div>';
                    }
                    else if($i==3){
                        echo '<div class="col-xs-5 col-md-3  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Tatlı</h3> </div> <div style="border-radius: 0 0 6px 6px; background-repeat: no-repeat;background-size: cover;background: url('.$row["imageurl"].');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div><p class="helvetica-neue" style="opacity: 0.7;">'.$row["title"].'</p> </div> </div>';
                    }
                    $i++;
                }

                mysqli_close($conn);
            }



            ?>
            
        </div>
        
        <div class="row" style='text-align: center; '>
            <div class="col-sm-12" >
                <h4 style='font-size: 14px; margin: 0; margin-bottom: 10px;'>Elindeki malzemeler ile yemek tariflerini gör,<br>iftar sofranı oluştur!</h4>
            </div>
            <div class="col-sm-12" >
                <img src="assets/img/cek.png" style='width: 130px;' />
            </div>
            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                <a href="/" data-type="container-5-button" class="btn btn-green hidden-md hidden-lg hidden-sm" style="padding: 6px 30px 6px 30px; opacity: 1;">yarışmaya katıl</a>
            </div>
        </div>
    </div>
    
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1851494148395945',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();
            fbInit();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
         
         function fbInit(){
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    $('#fb-log-out').css('display', 'block');
                    FB.api('/me?fields=first_name,name,picture.type(normal),gender', function(user) {
                        $('#fb-log-in').html('<i class="fa fa-facebook-official" aria-hidden="true" style="margin-right: 5px;"></i> ' + user.first_name + ' olarak devam et <img src="' + user.picture.data.url + '" style="height: 40px; margin-left: 10px;" />').css('padding','0px 0px 0px 12px').css('border','none');
                    });
                }
                else{
                    $('#fb-log-in').html('<i class="fa fa-facebook-official" aria-hidden="true" style="margin-right: 5px;"></i>Facebook ile bağlan');
                }
                $('#fb-log-in').css('display','inline-block');
                $('#fb-log-in-div').css('margin-top','205px');
                $('.opacity0').animate({opacity: '1'}, 1000);
            });
        }
    </script>

    <div id="container-1" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px; display: none;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        <div class="row" style="text-align: center; margin-top: 20px; margin-bottom: 20px; ">
            <div class="col-sm-12">
                <h3 style="color: #fff;">Elindeki<br>malzemeler ile,<br>iftar menünü oluştur!</h3>
            </div>
            <div class="col-sm-12">
                <img src="assets/img/cek.png" />
            </div>
            
            <div id="fb-log-in-div" class="col-sm-12 opacity0 helvetica-neue" style="margin-top: 20px; opacity: 0;">
                <a id="fb-log-in" onclick="fbLogIn();" href="#" class="btn btn-primary" style="background-color: #4267b2; font-size: 16px; display: none;"></a>
            </div>
            
            <div class="col-sm-12 opacity0">
                <div class="checkbox" style="color: #fff; margin-left: 20px;">
                    <small class="helvetica-neue" >
                        <input id="katilimkosullarionay" type="checkbox"> Katılım koşullarını okudum ve kabul ediyorum.
                    </small>
                </div>
            </div>
            <div class="col-xs-6 opacity0" style="margin-top: 5px;">
                <a href="#" class="btn btn-maggi helvetica-neue" data-toggle="modal" data-target="#nasilkatilirim">Nasıl Katılırım?</a>
            </div>
            <div class="col-xs-6 opacity0" style="margin-top: 5px;">
                <a href="#" class="btn btn-maggi helvetica-neue" data-toggle="modal" data-target="#katilimkosullari">Katılım Koşulları</a>
            </div>
        </div>
    </div>
    
    <div id="container-2" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12" style="margin-top: 50px; color: #fff;">
                <h4 style="font-size: 22px">Merhaba</h4>
                <img data="fbphoto" class="img-circle" style="width: 68px;" />
                <h2 data="adsoyad" style="font-size: 35px; margin-top: 0;"></h2>
            </div>
            <div class="col-sm-12" style="margin-top: 100px;">
                <a class="btn btn-gray" href="#" role="button" onclick="ga('send', 'event', 'Maggi', 'SofraninSultanlari', 'Evindeki-malzemelerin-fotograflarini-cek');changeContainer('container-7');"><i class="fa fa-camera" aria-hidden="true"></i> Evindeki malzemelerin fotoğraflarını çek</a>
            </div>
            <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;">
                <h5 style="font-size: 30px;">ya da</h5>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-gray" href="#" role="button" onclick="ga('send', 'event', 'Maggi', 'SofraninSultanlari', 'Evindeki-malzemeleri-listeden-sec');changeContainer('container-3');"><i class="fa fa-list" aria-hidden="true"></i> Evindeki malzemeleri listeden seç</a>
            </div>
        </div>
    </div>
    
    <div id="container-3" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        
        <div class="col-sm-12" style="position: absolute; left: 0; top: 20px;">
            <a onclick="changeContainer('container-2')" href="#" class="btn btn-maggi-yellow helvetica-neue" style="padding: 1px 12px; line-height: 22px;"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
        </div>
        
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" style="height: 70px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12 helvetica-neue" style="color: #fff; margin-top: -10px; font-size: 17px; color: #000;">
                4 çeşitten oluşan tam bir menü için<br>en az 5 malzeme girmeniz gerekiyor.
            </div>
        </div>
        <div id="materials" class="row" style="text-align: center; margin-top: 20px;">
            <div class="col-sm-12" style="color: #545657;">
                1. Malzeme
            </div>
            <div class="col-sm-12">
                <input tabindex="1" id="material-1" data="material" type="text" name="material-1" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control">
            </div> 
            <div class="material col-sm-12">
                2. Malzeme
            </div>
            <div class="col-sm-12">
                <input tabindex="2" id="material-2" data="material" type="text" name="material-2" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control">
            </div>
            <div class="material col-sm-12">
                3. Malzeme
            </div>
            <div class="col-sm-12">
                <input tabindex="3" id="material-3" data="material" type="text" name="material-3" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control">
            </div>
            <div class="material col-sm-12">
                4. Malzeme
            </div>
            <div class="col-sm-12">
                <input tabindex="4" id="material-4" data="material" type="text" name="material-4" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control">
            </div>
            <div class="material col-sm-12">
                5. Malzeme
            </div>
            <div class="col-sm-12">
                <input tabindex="5" id="material-5" data="material" type="text" name="material-5" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control">
            </div>

        </div>
        <div class="row" style="text-align: center; margin-top: 30px;">
            <div class="col-xs-6"><a href="#" data-type="container-3-button" onclick="getRecipe();" class="btn btn-white cocon-bold" style="float: left;"><img src="assets/img/tarifgetir.svg" style="height: 18px;" /> Tarif Getir</a></div>
            <div class="col-xs-6"><a href="#" data-type="container-3-button" onclick="addMaterial();" class="btn btn-white cocon-bold" style="float: right; font-size: 11px; white-space: normal !important; word-wrap: break-word; line-height: 15px;"><span style="margin-left: -15px;">Daha fazla malzeme istersen tıkla</span> <i class="fa fa-plus pull-right fa-2x" style="margin-top: -10px;" aria-hidden="true"></i></a></div>
        </div>
    </div>
    
    <div id="container-4" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        
        <div class="col-sm-12" style="position: absolute; left: 0; top: 20px;">
            <a onclick="backContainer3();" href="#" class="btn btn-maggi-yellow helvetica-neue" style="padding: 1px 12px; line-height: 22px;"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
        </div>
        
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" style="height: 70px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12 helvetica-neue" style="font-weight: bold; color: #fff; margin-top: -10px; font-size: 15px;">
                Aşağıdaki yemekleri iftar menünüze ekleyebilirsiniz.
            </div>
        </div>
        <div id="recipes" style="text-align: center; overflow-y: scroll; overflow-x: hidden; height: 340px; margin-top: 15px;">
            <div class="row">
                
                
            </div>
            
        </div>
        <div class="row helvetica-neue recipe-panel" style="text-align: center; margin-top: 15px; color: #545657;">
            <div class="col-xs-12">
                Çorba <span id="corba" class="label label-danger">Seçilmedi</span>
                Ara Sıcak <span id="arasicak" class="label label-danger">Seçilmedi</span>
                Ana Yemek <span id="anayemek" class="label label-danger">Seçilmedi</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                <a href="#" onclick="showDesertList();" data-type="container-4-button" class="btn btn-white" style="padding: 6px 30px 6px 30px;">ilerle</a>
            </div>
        </div>
    </div>
    
    <div id="container-5" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        
        <div class="col-sm-12" style="position: absolute; left: 0; top: 20px;">
            <a onclick="backContainer4();" href="#" class="btn btn-maggi-yellow helvetica-neue" style="padding: 1px 12px; line-height: 22px;"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
        </div>
        
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" style="height: 70px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12 " style="color: #fff; font-weight: bold; margin-top: -10px; font-size: 20px;">
                Oluşturduğunuz iftar menüsü
            </div>
        </div>
        <div id="meallist" class="row" style="margin-top: 50px; text-align: center;">
            
            
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                <a href="#" onclick="completeToMeal();" data-type="container-5-button" class="btn btn-green" style="padding: 6px 30px 6px 30px; opacity: 1;">tamamla</a>
            </div>
        </div>
    </div>
    
    <div id="container-6" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12 " style="color: #fff; margin-top: 30px; font-size: 20px;">
                <h2 style="margin-top: 0px;">Tebrikler!</h2>
            </div>
            <div class="col-sm-12 " style="color: #fff; margin-top: -10px; font-size: 20px;">
                <h2 style="margin-top: 0px;">Yarışmaya katıldınız!</h2>
            </div>
        </div>
        <div id="snap" class="row" style="text-align: center;">
            <div id='snapimage' class="col-sm-12">

            </div>
            <div id='snaphtml' style="margin-right: auto; margin-left: auto; background: url(assets/img/600x600-v2.png); text-align: center; background-size: 100% auto; background-repeat: no-repeat; width: 300px; height: 300px;">
                <img data="fbphoto" class="img-circle" style="height: 52px; margin-top: 37px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
                <div id="meallistphoto" class="row" style="margin-top: 40px; text-align: center;">


            </div>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <!--div class="col-xs-12" style="margin-bottom: 10px;">
                <a id="imageDownload" href="#" class="btn btn-white" style="opacity: 1; font-weight: bold; margin-top: 10px; height: 40px;" ><i class="fa fa-download" aria-hidden="true"></i> Telefonuna İndir</a>
            </div-->
            <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 10px; font-size: 19px; font-weight: bold; color: #545657;">
                sosyal medyada paylaş
            </div>
            <div class="col-xs-2 col-xs-offset-4" style="padding: 0;">
                <img onclick="facebookShare();" src="assets/img/facebook.svg" style="width: 50px;" />
            </div>
            <div class="col-xs-2" style="padding: 0;">
                <a id="whatsapp" href=""><img src="assets/img/whatsapp.svg" style="width: 50px;" /></a>
                
            </div>
            
        </div>
    </div>
    
    <div id="container-7" class="container-fluid maggi-container">
        <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
                <img src="assets/img/maggi-logo.png" />
            </div>
        </div>
        <div id="fb-log-out" class="col-sm-12" style="position: absolute; right: 0; top: 20px;">
            <a onclick="fbLogOut();" href="#" class="btn btn-maggi-yellow helvetica-neue">Çıkış Yap</a>
        </div>
        
        <div class="col-sm-12" style="position: absolute; left: 0; top: 20px;">
            <a onclick="changeContainer('container-2')" href="#" class="btn btn-maggi-yellow helvetica-neue" style="padding: 1px 12px; line-height: 22px;"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
        </div>
        
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" style="height: 70px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12" style="margin-top: -10px; font-size: 17px; color: #FFF; font-weight: bold;">
                Elindeki malzemelerin fotoğraflarını çek
            </div>
        </div>
        <div class="row" style="text-align: center; margin-top: 20px;">
            
            <div id="materialsphoto" class="col-xs-10 col-xs-offset-1" style="padding: 0px;">
                <div class="col-xs-4 col-camera">
                    <h6 style="margin-bottom: 5px;">1. Malzeme</h6>
                    <label class="btn btn-multiline" for="material-photo-1">
                        <input id="material-photo-1" name="material-photo-1" data="material-photo" type="file" style="display:none;" onchange="fileSelected('material-photo-1');" accept="image/*" capture="camera">
                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla
                    </label>
                </div>

                <div class="col-xs-4 col-camera">
                    <h6 style="margin-bottom: 5px;">2. Malzeme</h6>
                    <label class="btn btn-multiline" for="material-photo-2">
                        <input id="material-photo-2" name="material-photo-2" data="material-photo" type="file" style="display:none;" onchange="fileSelected('material-photo-2');" accept="image/*" capture="camera">
                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla
                    </label>
                </div>
                
                <div class="col-xs-4 col-camera">
                    <h6 style="margin-bottom: 5px;">3. Malzeme</h6>
                    <label class="btn btn-multiline" for="material-photo-3">
                        <input id="material-photo-3" name="material-photo-3" data="material-photo" type="file" style="display:none;" onchange="fileSelected('material-photo-3');" accept="image/*" capture="camera">
                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla
                    </label>
                </div>
                
                <div class="col-xs-4 col-camera">
                    <h6 style="margin-bottom: 5px;">4. Malzeme</h6>
                    <label class="btn btn-multiline" for="material-photo-4">
                        <input id="material-photo-4" name="material-photo-4" data="material-photo" type="file" style="display:none;" onchange="fileSelected('material-photo-4');" accept="image/*" capture="camera">
                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla
                    </label>
                </div>
                
                <div class="col-xs-4 col-camera">
                    <h6 style="margin-bottom: 5px;">5. Malzeme</h6>
                    <label class="btn btn-multiline" for="material-photo-5">
                        <input id="material-photo-5" name="material-photo-5" data="material-photo" type="file" style="display:none;" onchange="fileSelected('material-photo-5');" accept="image/*" capture="camera">
                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla
                    </label>
                </div>
                
                <div id="addMaterialCameraContainer" class="col-xs-4 col-camera">
                    <a  id="btnYeniMalzeme" onclick="addMaterialCamera()" class="btn btn-multiline" style="opacity: 0.5; margin-top: 28px;width: 100%; font-size: 13px;">
                        <i class="fa fa-plus" aria-hidden="true" style="font-size: 24px;"></i><br>
                        Yeni<br>malzeme<br>çek 
                    </a>
                </div>
            </div>
            
            
            
            

        </div>
        <div class="row">
            <div class="col-sm-12" style="margin-top: 50px; text-align: center;">
                <a id="btnGetRecipeCamera" href="#" onclick="getRecipeCamera()" data-type="container-4-button" class="btn btn-white" style="padding: 6px 30px 6px 30px;">tarif getir</a>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade helvetica-neue" id="nasilkatilirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style='text-align: center;'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title helvetica-neue" style='color: #000000;' id="myModalLabel">Nasıl Katılırım?</h4>
                </div>
                <div class="modal-body ">
                    <ul style="list-style-type: decimal; margin-left: -20px;">
                        
                        <li>Facebook ile bağlandıktan sonra elinizde bulunan malzemelerin fotoğrafını çekerek ya da malzemelerinizi sayfada bulunan seçeneklerden seçebilirsiniz.</li>
                        <li>Malzemeleri kamera ile tarama yaparken fotoğrafı net çekmeye dikkat edin. Ürünleri çektin sonra ya da seçtikten sonra malzeme sayısına göre tarif önerileri listelenecektir.</li>
                        <li>Seçmiş olduğunuz malzeme sayısına göre bildirim alanından kaç farklı tarif oluşturabileceğinizi görebilir, yeterli öneri sayısına ulaştığında tarifleri görebilirsiniz.</li>
                        <li>Tarif önerilerini sizin seçmiş olduğunuz malzemelere göre verildiğini, elinizde yeterli malzeme yoksa malzeme ekleyerek yeni tarifleri görebilirsiniz.</li>
                        <li>Yemek gruplarından (çorba, ara sıcak, ana yemek) bir tane seçilebilir. Tatlı seçmiş olduğunuz yemekler doğrultusunda size öneri olacak sunulacaktır. Yemek gruplarından eksik bırakıldığı takdirde iftar menüsü oluşturulamaz ve yarışmaya katılım sağlanamaz.</li>
                        <li>Günün iftar menüsü olarak seçilen yemekler, olası aynı tarifleri aynı gün içerisinde farklı kişiler tarafından oluşturulduğunda, tarih/saat bazında ilk oluşturan kişi hak kazanacaktır.</li>
                        <li>Eksiksiz oluşturulan iftar menüleri jüri tarafından seçilecektir.</li>
                        <li>Günün kazananları 6 Haziran, 16 Haziran ve 26 Haziran tarihlerinde <a href="https://www.facebook.com/Maggi-Turk%C4%B1ye-117882015031774" target="_blank">Maggi Türkiye</a> facebook sayfasında ve <a href="sofraninsultanlari.themediamove.com/kazananlar.html" target="_blank">buradan</a> duyurulacaktır.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade helvetica-neue" id="katilimkosullari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style='text-align: center;'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title helvetica-neue" style='color: #000000;' id="myModalLabel">Katılım Koşulları</h4>
                </div>
                <div class="modal-body">
                    <ul style="list-style-type: decimal; margin-left: -20px;">
                        
                        <li>“Maggi ile Ramazan Tarifleri” yarışması 29.05.2017 (saat:15.30’dan itibaren)- 24.06.2016 (saat:23.59’a kadar) tarihleri arasında <a href="http://sofraninsultanlari.themediamove.com">sofraninsultanlari.themediamove.com</a> sayfasında gerçekleştirilecektir.</li>
                        <li>Yarışmaya katılabilmek için kadın ve erkek katılımcılara, belirtilen tarihler arasında mikro siteye girerek mutfağında bulunan malzemelerin fotoğrafını çekerek ya da veri tabanında bulunan malzemeleri seçerek yemek tarifleri önerilecektir. Malzeme sayısına göre tarif önerisi artacağı için önerilerin tarifi çeşitlendirerek farklı öneriler bulmak kullanıcıya bağlıdır. Yemek gruplarından (çorba, ara sıcak, ana yemek) bir tane seçilebilir. Tatlı, seçmiş olduğunuz yemekler doğrultusunda öneri olacak sunulacaktır. Yemek gruplarından herhangi biri eksik bırakıldığı takdirde iftar menüsü tamamlanamaz ve yarışmaya katılım sağlanamaz. 27 Mayıs ve 26 Haziran arasında 10 gün aralıklarda 10’ar kişi jüri tarafından oluşturduğu iftar menüsüne göre kazanacak olup, kampanya boyunca toplam 28 kişi 1’er adet hediye çeki kazanacaktır. Hediye çeki 250 TL değerinde Ticket Compliments Universal olarak verilecektir. Ticket Compliments Universal hediye çekini kullanabileceğiniz tüm kampanya ve indirimlerde geçerli Atelier Rebul, Bigg Shop, Bimeks, Mandarina Duck, Mudo City, Mudo Concept, Tefal, Tepe Home mağazalarında, tüm kampanya ve indirimlerde geçerli başka kurumlara sağlanan avantajlarla birleştirilemeyen Ariş mağazasında, online internet satış fiyatları üzerinden geçerli olan Enterprise mağazasında, özel kampanyalarda ve nakit, tek ödeme kampanyalarında geçerli olmayan TeknoSA mağazasında, indirim dönemlerindeki indirimlerde geçerli, özel kampanya ve promosyonlarda geçerli olmayan YKM mağazalarında 31 Aralık 2017 tarihine kadar kullanabilirsiniz.</li>
                        <li>Katılımcılar yarışmaya her gün 1 defa katılabilirler.</li>
                        <li>Yarışma kazananları, Nestlé ekibinden oluşan jüri tarafından iftar menüsünü eksiksiz oluşturmuş 28 gün boyunca 28 kişi seçilecektir. </li>
                        <li>Kazanan katılımcılar  6 Haziran, 16 Haziran ve 26 Haziran tarihlerinde Maggi Türkiye facebook sayfasında ve <a href="http://sofraninsultanlari.themediamove.com/kazananlar">sofraninsultanlari.themediamove.com/kazananlar</a> sayfasında duyurulacaktır.</li>
                        <li>Kazananlar açıklandıktan sonraki 3 iş günü içerisinde MAGGİ Türkiye Facebook sayfası aracılığıyla kazanan kişilerin facebook hesapları üzerinden mesaj yoluyla iletişime geçilecek isim-soyisim, adres, cep telefonu bilgilerini alarak hediye çeki gönderimleri yapılacaktır. Katılımcıların irtibat bilgilerinin doğru olmaması nedeniyle kendilerine ulaşılmaması durumundan Nestle Türkiye Gıda San. A.Ş. sorumlu değildir. Gönderimler başladıktan sonra adres bilgilerine göre teslim süresi değişiklik gösterebilir. Bilgilerini eksik ya da yanlış ilettiği tespit edilen kullanıcılar, ödül kazanamazlar. Kullanıcılar başkası adına ödül kazanamazlar ve profil bilgilerinin kendilerine ait olduğunu ve doğru bilgi içerdiğini kabul, beyan ve taahhüt ederler.</li>
                        <li>Katılımcılar yarışmaya katılarak bilgilerinin kampanya süresince Süper Mobil Medya ve Reklam Hizmetleri A.Ş tarafından toplanmasına ve saklanmasına rıza göstermiş sayılır. Kampanya bitiminde toplanan bilgiler silinecek veya anonim hale getirilecektir.</li>
                        <li>Yarışmaya katılım sağlayacakların Facebook profil fotoğrafları ve isim-soyisim bilgileri oluşturdukları menü ile birlikte sistem tarafından otomatik olarak kampanya ekranında yer alacak olup yarışmanın kazananları bildirilene kadar kaydedilecektir. Katılımcı dilerse kendi sosyal medya hesaplarında işbu ekranı paylaşmakta serbesttir. </li>
                        <li>Nestlé Türkiye Gıda San. A.Ş., katılımcının üyeliğini ya da site kullanımını ve Katılım Koşulları’na veya yasalara aykırı olarak kullandığını tespit ederse veya yetkili mercilerce bu konuda bir tespit veya inceleme talebi gelirse, katılımcı ile ilgili bilgileri yetkili makamlara bildirme hakkını gizli tutar. Yarışma ile ilgili Nestlé Türkiye Gıda San. A.Ş. ve Katılımcı arasında çıkacak her türlü ihtilafta İstanbul Merkez(Çağlayan) Mahkemeleri ve İcra Daireleri yetkili olacaktır.</li>
                        <li>Katılımcılar, ticari anlamda haksız rekabete yol açacak, ticari itibardan faydalanma anlamına gelebilecek davranışlardan kaçınacak, sitede yer alan mevcut içeriği hiçbir şekilde kopyalayamacaklardır.</li>
                        <li>Kampanya, Türkiye’de yaşayan 18 yaş üstü, Nestle Türkiye Gıda San. A.Ş. ve Mindshare Medya Hizmetleri A.Ş., Süper Mobil Medya ve Reklam Hizmetleri A.Ş. ve U2 Tanıtım ve Promosyon Hiz. Tic. Ltd. Şti. çalışanları hariç herkese açıktır.</li>
                        <li>Kazanılan ödül başkasına devredilmez ve/veya ödülün nakit karşılığı talep edilmez.</li>
                        <li>Süper Mobil Medya ve Reklam Hizmetleri A.Ş kampanya boyunca, kampanyayı olumsuz yönde etkileyecek şekilde bilgisayar teknolojilerini kullanarak hile yapıldığını ya da haksız yollardan kayıt oluşturulduğunu tespit etmesi durumunda ilgili yarışmacının o güne kadar ki tüm verilerini hiçbir uyarı yapmadan iptal etme hakkını saklı tutar.</li>
                        <li>Katılım koşullarında değişiklik yapmak, kuralları iptal etmek ve/veya yeni kurallar getirmek tamamen Süper Mobil Medya ve Reklam A.Ş’nin inisiyatifindedir. Herhangi bir değişiklikten sonra sitenin kullanımına devam edilmesi ve site kapsamında sunulan herhangi bir hizmete ilişkin olarak işlem yapılması, site kullanıcılarının söz konusu değişikliği kabul ettiği anlamına gelecektir.</li>
                        <li>Kayıp ya da geç kayıtlar için, sorunlu ya da kayıp teknik donanım veya yazılım arızaları, veya kullanılamaz ağ bağlantıları için, ya da başarısız, yanlış, hatalı, eksik, bozuk ve ya gönderenin neden olup olmadığı herhangi bir elektronik iletişim gecikmesinde, ekipman ve ya programlama ile ilgili ya da bu yarışmada kullanılan veya bu yarışmada kayıtların işlenmesinde oluşabilecek herhangi bir insan hatasından Nestlé Türkiye Gıda San. A.Ş. sorumlu değildir.</li>
                        <li>Bilgilerin gönderilmemesi, yanlış veya eksik olması durumunda katılımcı ödül kazanma hakkını kaybeder. Katılımcıların bildirdiği irtibat bilgilerinin doğru olmaması nedeniyle talihlilere ulaşılamaması durumundan Nestlé Türkiye Gıda San. A.Ş. sorumlu değildir. </li>
                        <li>Yarışmaya katılım ve sitedeki işlemler ücretsizdir, isteyen herkes katılabilir. Katılım için başka ticari bir koşul aranmamaktadır. </li>
                        <li>Katılımda sunulan kimlik ve adres bilgilerinin doğruluğu ve yeterliliğinin ispatı katılımcının sorumluluğundadır. </li>
                        <li>Kampanya ile ilgili soru, sorun ve talepler için Nestlé Tüketici Hizmetlerine telefon (0800 211 02 18) veya e-posta ile ulaşılabilir (tuketici.hizmetleri@tr.nestle.com). </li>
                        <li>Nestlé Türkiye Gıda Sanayi A.Ş, önceden haber vermeksizin yarışmayı durdurma, değiştirme ve yarışmada hediye verilecek ödülü düzenleme/değiştirme hakkını saklı tutar. </li>
                        <li>İşbu Yarışmaya katılmak katılım koşullarının kabul edildiği anlamına gelmektedir. </li>
                        <li>Hiçbir şekilde Facebook Inc. tarafından düzenlenmemekte ve sponsorluğunda yapılmamakta olup, Facebook Inc. ile herhangi bir ilişkisi bulunmamaktadır. Katılımcılar, işbu yarışmaya katılım amacıyla göndermiş oldukları kişisel bilgilerinin Nestlé tarafından kullanılmasına, arşivlenmesi Kişisel Verilerin Korunması Kanunu kapsamında açık rızaları olduğunu, bu konuda bilgilendirildiklerini beyan, kabul ve taahhüt ederler. Katılımcılar Nestlé’nin ve/veya bağlı ajanslarının kişisel verileri saklama hakkı herhangi bir coğrafi sınır ve süreye bağlı olmadığı kendi rızaları ile kabul etmişlerdir. Bununla birlikte, Nestlé tarafından kazananlara hediyelerin kargo ile iletilebilmesi için birlikte çalışılan Ekom Tanıtım Ajansı’na, katılımcıların kişisel bilgileri paylaşılacak olup kampanyanın tamamlanabilmesi ve sonrasında yapılacak tanıtım faaliyetlerinin gerektirdiği süre boyunca saklanacak ve işlenecektir. Katılımcılar, sahip oldukları haklar ve ilgili üçüncü kişilerle irtibata geçebilecekleri konusunda bilgilendirilmişlerdir. </li>
                        <li>Kullanıcı, bu kampanya vasıtasıyla vermiş olduğu dataların tüm Nestlé markaları tarafından iletişim ve reklam amaçlı kullanılmasını, Nestlé 3. partileriyle paylaşılmasını kabul etmiş sayılır. </li>
                        <li>Yarışmaya Türkiye Cumhuriyeti sınırları dışında, yurt dışından katılımda bulunanlar, ödül kazanamazlar. </li>
                        <li>Kazanılan ödül değiştirilemez, devredilemez, iade edilemez veya nakde dönüştürülemez. </li>
                        <li>İkramiyeye konu olan eşya ve-veya hizmetin bedeli içinde bulunan KDV+ÖTV hariç diğer yasal yükümlülükler talihliler tarafından ödenir. </li>
                        <li>Uygulamada çeşitli yöntemlerle haksız avantaj sağlamaya çalışan katılımcıların belirlenmesi durumunda bu katılımcı ödüle hak kazanamayacak olup, Nestlé Türkiye Gıda Sanayi A.Ş.’nin yasal işlem başlatma ve varsa bundan doğan tüm zararlarının da tazminini talep etme hakkı saklıdır. </li>
                        <li>Nestlé Türkiye Gıda Sanayi A.Ş Yarışmaya katılım esnasında, katılımcıların kişisel bilgisayarları ve internet erişimlerinden ve her türlü teknik aksaklıklardan (İnternet hızının düşük olması, bağlantının kopması, uygun programa sahip olunmaması vb...) oluşabilecek problemlerden ve söz konusu bilgisayarlara yetkisiz erişim vb. durumlardan kaynaklanabilecek problem ve zararlardan dolayı sorumluluk kabul etmez. </li>
                        <li>Yarışma neticesinde kazananlar, isimlerinin Maggi/Facebook sayfası aracılığıyla açıklanmasını kabul etmiş olurlar. </li>
                        <li>Yarışmaya katılım sırasında eksik veya yanlış verilen iletişim bilgileri veya herhangi bir sebepten dolayı ödülün ulaşmamasından Nestlé Türkiye Gıda Sanayi A.Ş.sorumlu değildir. </li>
                        <li>Yarışma kapsamında ortaya çıkan her türlü uyuşmazlıkta Nestlé Türkiye Gıda Sanayi A.Ş.’nin her türlü kayıtları esas alınacaktır. </li>
                        <li>Yarışmaya katılan herkes, Yarışma şartlarını okuyup anlayarak peşinen kabul etmiş sayılır. Katılımcıların Yarışma şartlarına uyup uymadıklarının denetim ve değerlendirilmesi, katılımcıların beyanına dayanan bilgiler çerçevesinde, münhasıran Nestlé Türkiye Gıda Sanayi A.Ş. tarafından yapılacaktır. Nestlé Türkiye Gıda Sanayi A.Ş. bu koşullar ve kuralları gerektiğinde katılımcılarına önceden haber vermeksizin değiştirebilir ve şartlar yayınlandığı anda katılımcılar açısından bağlayıcıdır. Koşullar ve kurallardaki değişiklikler tüm katılımcılar için bağlayıcı nitelik taşımaktadır.Bu nedenle katılımcılar, güncel koşullar ve kuralları öğrenmek için bu sayfayı düzenli olarak ziyaret etmeleri gerektiğini kabul ederler. Nestlé Türkiye Gıda Sanayi A.Ş. Yarışma Katılım Koşulları’na uygun davranıp davranılmadığını dilediği şekilde değerlendirme ve denetleme hakkını saklı tutmaktadır. </li>
                        <li>Koşullar ve Kurallar'ın herhangi bir maddesi hukuka aykırı, hükümsüz ya da uygulanamaz olarak addedilirse söz konusu madde ayrılabilir olarak sayılacak ve geriye kalan hükümlerin geçerliliğini ve uygulanabilirliğini etkilemeyecektir. </li>
                        <li>Sitenin kullanımı ile ilgili olan tüm riskler site kullanıcılarının sorumluluğundadır. Sitenin kullanımı halinde meydana gelecek hiçbir olay nedeni ile Nestlé Türkiye Gıda San. A.Ş. sorumlu değildir ve site kullanıcılarına tazminat ödemeyecektir. </li>
                        <li>Bu kampanya, Nestlé Türkiye Gıda Sanayi A.Ş. tarafından Mpi’nin 22.05.2017 tarihli ve 24951361-255.05.02/1301-3071 sayılı yazısına istinaden izin kapsamı dışında düzenlenmektedir. Hiçbir şekilde Facebook Inc. tarafından düzenlenmemekte ve sponsorluğunda yapılmamakta olup, Facebook Inc. ile herhangi bir ilişkisi bulunmamaktadır. Katılımcılar, işbu yarışmaya katılım amacıyla göndermiş oldukları kişisel bilgilerinin Nestlé tarafından kullanılmasına, arşivlenmesi Kişisel Verilerin Korunması Kanunu kapsamında açık rızaları olduğunu, bu konuda bilgilendirildiklerini beyan, kabul ve taahhüt ederler. Katılımcılar Nestlé’nin ve/veya bağlı ajanslarının kişisel verileri saklama hakkı herhangi bir coğrafi sınır ve süreye bağlı olmadığı kendi rızaları ile kabul etmişlerdir. Bununla birlikte, Nestlé tarafından kazananlara hediyelerin kargo ile iletilebilmesi için birlikte çalışılan  Ekom Tanıtım Ajans’ına katılımcıların kişisel bilgileri paylaşılacak olup  kampanyanın tamamlanabilmesi ve sonrasında yapılacak tanıtım faaliyetlerinin gerektirdiği süre boyunca saklanacak ve işlenecektir. Katılımcılar, sahip oldukları haklar ve ilgili üçüncü kişilerle irtibata geçebilecekleri konusunda bilgilendirilmişlerdir.</li>
                        <li>Bu yarışmaya katılmış olan katılımcılar Katılım Koşulları’nı peşinen kabul etmiş sayılırlar.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="tatlilistesi" tabindex="-1" role="dialog" aria-labelledby="tatlilistesi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 style="color: #000000; font-size: 27px" class="modal-title" id="myModalLabel">İftar menün hazır</h4>
                    <p style="font-size: 16px;">Aşağıdan iftar sofrana en lezletli tatlı önerilerimizden birini seçebilirsin.</p>
                </div>
                <div class="modal-body">
                    <div class="row" style="overflow-y: scroll; overflow-x: hidden; height: 300px;">
                        
                    </div>    
                    <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                        <a href="#" onclick="readToMeal();" data-type="container-desert-button" class="btn btn-green" style="padding: 6px 30px 6px 30px;">iftar soframı oluştur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="tarifgoster" tabindex="-1" role="dialog" aria-labelledby="tarifgoster">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="tarifbaslik" style="color: #000000; font-size: 27px" class="modal-title" id="myModalLabel">İftar menün hazır</h4>
                    <img id="tarifimg" src="" class="img-rounded" />
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <img id="tarifresim" style="margin-left: auto; margin-right: auto; width: 50%; margin-bottom: 10px;"  class="img-rounded img-responsive" />
                            <h4 style="color: #000;">Malzeme Listesi</h4>
                            
                            <ul id="tarifmalzeme">
                                
                            </ul>
                            <h4 style="color: #000;">Nasıl Yapılır</h4>
                            <p id="tarifaciklama"></p>
                            <p>*Yemek.com'dan alınmıştır.</p>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="malzemeonay" tabindex="-1" role="dialog" aria-labelledby="malzemeonay">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 style="color: #000000; font-size: 27px" class="modal-title" id="myModalLabel">Onay</h4>
                    
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <img id="tarifresim" style="margin-left: auto; margin-right: auto; width: 50%; margin-bottom: 10px;"  class="img-rounded img-responsive" />
                            
                            <h4 style="color: #000;">Malzemeniz bunlardan biri mi?</h4>
                            <div id="malzemeonaysecenek">
                                
                            </div>
                            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                                <a id="btnTakePhotoAgain" href="#" onclick="takePhotoAgain();" data-type="container-desert-button" class="btn btn-green" style="padding: 6px 10px 6px 10px;opacity: 1; background-color: #337ab7; border-color: #337ab7; margin-right: 10px;">yeniden çek</a>
                                <a id="btnConfirmMaterial" href="#" onclick="confirmMaterial();" data-type="container-desert-button" class="btn btn-green" style="padding: 6px 30px 6px 30px;opacity: 1;">onay</a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php include('controls/footer.php'); ?>

    <?php
        if(isset($_GET["userpage"])) {
            echo '<script>changeContainer("container-user")</script>';
        }
        else{
            echo '<script>changeContainer("container-1")</script>';
        }
    ?>
</body>

</html>
