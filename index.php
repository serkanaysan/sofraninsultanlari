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
            fbInit();
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
                <a class="btn btn-gray" href="#" role="button"><i class="fa fa-camera" aria-hidden="true"></i> Evindeki malzemelerin fotoğraflarını çek</a>
            </div>
            <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;">
                <h5 style="font-size: 30px;">ya da</h5>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-gray" href="#" role="button" onclick="changeContainer('container-3');"><i class="fa fa-list" aria-hidden="true"></i> Evindeki malzemeleri listeden seç</a>
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
            <div class="col-sm-12 helvetica-neue" style="color: #fff; margin-top: -10px; font-size: 15px;">
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
            <a onclick="backContainer3();" href="#" class="btn btn-maggi-yellow helvetica-neue" style="padding: 1px 12px; line-height: 22px;"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
        </div>
        
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-12">
                <img data="fbphoto" class="img-circle" style="height: 70px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-12 " style="color: #fff; margin-top: -10px; font-size: 20px;">
                Oluşturduğunuz iftar menüsü.
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
            <div class="col-sm-12 " style="color: #fff; margin-top: 50px; font-size: 20px;">
                <h2 style="margin-top: 0px;">Tebrikler!</h2>
            </div>
            <div class="col-sm-12 " style="color: #fff; margin-top: -10px; font-size: 20px;">
                <h2 style="margin-top: 0px;">Yarışmaya katıldınız!</h2>
            </div>
        </div>
        <div id="snap" class="row" style="margin-top: 50px; text-align: center;">
            <div id='snapimage' class="col-sm-12">

            </div>
            <div id='snaphtml' style="background: url(assets/img/600x600.png); text-align: center; background-size: 100% auto; background-repeat: no-repeat; width: 300px; height: 300px;">
                <img data="fbphoto" class="img-circle" style="height: 52px; margin-top: 37px;" />
                <h2 data="adsoyad" style="margin-top: 0px;"></h2>
                <div id="meallistphoto" class="row" style="margin-top: 40px; text-align: center;">


            </div>
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
    <div class="modal fade" id="tatlilistesi" tabindex="-1" role="dialog" aria-labelledby="tatlilistesi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 style="color: #000000; font-size: 27px" class="modal-title" id="myModalLabel">İftar menün hazır</h4>
                    <p style="font-size: 16px;">Aşağıdan iftar sofrana en lezletli tatlı önerilerimizden birini seçebilirsin.</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                    </div>    
                    <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                        <a href="#" onclick="readToMeal();" data-type="container-desert-button" class="btn btn-green" style="padding: 6px 30px 6px 30px;">iftar soframı oluştur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('controls/footer.php'); ?>

</body>

</html>
