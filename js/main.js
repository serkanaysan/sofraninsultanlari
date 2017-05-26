var loginLogId;

$(document).ready(function(){
    
    $('#material-1').bootcomplete({
        url:'api/material.php',
        minLength : 1,
    });
    $('#material-2').bootcomplete({
        url:'api/material.php',
        minLength : 1,
    });
    $('#material-3').bootcomplete({
        url:'api/material.php',
        minLength : 1,
    });
    $('#material-4').bootcomplete({
        url:'api/material.php',
        minLength : 1,
    });
    $('#material-5').bootcomplete({
        url:'api/material.php',
        minLength : 1,
    });
    
    $.ajax({
        url: 'api/desert.php',
        type: 'post',
        dataType: 'json',
        success: function(json){
            for(var i=0; i<json.length; i++){
                $('#tatlilistesi .modal-body .row').append('<div id="desert-'+json[i].id+'" data-id="'+json[i].id+'" data-type="desert" class="col-xs-4 col-md-4 desert"> <div class="thumbnail"> <img class="img-rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsMw7o5WzcerqkBiTzR_QmJEIt_GtUSNlNjg5ZNWzDfrhYbMlyRw" alt="'+json[i].title+'"> <div class="caption" style="padding: 6px 6px 0px 6px; "> <p class="helvetica-neue" style="font-size: 12px;">'+json[i].title+'</p> </div> </div> </div>');
            }
            $('div[data-type=desert]').on('click', function(){
                $('div[data-type=desert]').find('.thumbnail').removeClass('active').addClass('passive');
                $(this).find('.thumbnail').removeClass('passive').addClass('active');
                $('a[data-type=container-desert-button]').css('opacity','1');
                menu.tatli.status = 1;
                menu.tatli.image = $(this).find('img').attr('src');
                menu.tatli.id = $(this).replaceAll('desert-','');
                menu.tatli.title = $(this).find('p').html();
            });
            
            
        },
    });
});



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
        $('#fb-log-in-div').css('margin-top',(((screen.availWidth * 528) / 375) - ($('#fb-log-in').offset().top - 25)) + 'px');
        $('.opacity0').animate({opacity: '1'}, 1000);
    });
}

function fbLogOut(){
    FB.logout(function(response) {
        location.reload();
     });
}

function fbLogIn(){
    if($('#katilimkosullarionay')[0].checked){
        FB.login(function(response) {
            checkLoginState();
        }, {scope: 'public_profile,email'});
    }
    else{
        console.log(1);
        $('.checkbox').css('color','red');
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

function statusChangeCallback(response) {
    if(response.status == "connected"){
        $("#maggi-carousel").carousel("next");
        FB.api('/me?fields=first_name,name,picture.type(normal),gender,email', function(response) {
            
            $('.maggi-container').css('display','none');
            $('#container-2').fadeIn('slow');
            
            
            
            var data = {"fbid":response.id, "name":response.name, "imgurl":response.picture.data.url, "gender": response.gender, "email": response.email };
            
            $.ajax({
                type: 'post',
                url: 'backend/loginlog.php',
                dataType: 'json',
                data: data,
                success: function(json){
                    $('img[data="fbphoto"]').attr('src', response.picture.data.url);
                    if(response.gender == "female"){
                        $('h2[data="adsoyad"]').html(response.first_name + " Sultan");
                    }
                    else{
                        $('h2[data="adsoyad"]').html(response.name);
                    }
                    loginLogId = json.loginlogid;
                }
            });
        });
    }
}

function changeContainer(id){
    $('.maggi-container').css('display','none');
    $('#'+id).fadeIn('slow');
}

var materialNo = 6
function addMaterial(){
    var i = 0;
    
    //malzeme listesi dataya eklenir
    var arrMaterial= new Array();
    $('input[type=text]').each(function(){
        if($(this).val() != ""){
            arrMaterial.push($(this).val().trim());
        }
        else if(i<5){
            $(this).css('border','1px solid red');
        }
        i++;
    });  
    
    if(arrMaterial.length >= 5){
        $('#materials').append('<div class="material col-sm-12"> '+materialNo+'. Malzeme </div> <div class="col-sm-12"> <input tabindex="'+materialNo+'" id="material-'+materialNo+'" data="material" type="text" name="material-'+materialNo+'" placeholder="Malzemeni Buraya Yazabilirsin" class="form-control"> </div>');
        $('#material-' + materialNo).bootcomplete({
            url:'api/material.php',
            minLength : 1,
        });
        materialNo++;
        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    }
}

function getRecipe(){
    
    var i = 0;
    
    //malzeme listesi dataya eklenir
    var arrMaterial= new Array();
    $('input[type=text]').each(function(){
        if($(this).val() != ""){
            arrMaterial.push($(this).val().trim());
        }
        else if(i<5){
            $(this).css('border','1px solid red');
        }
        i++;
    });  
    
    if(arrMaterial.length >= 5){
        jsonMaterial = JSON.stringify(arrMaterial);
    
        $.ajax({
            type: 'post',
            url: 'backend/usermaterial.php',
            dataType: 'json',
            data: {data : jsonMaterial, loginlogid : loginLogId}, 
            success: function(json){
                for(var i=0; i<json.length; i++){
                    $('#recipes .row').append('<div class="col-sm-12" style="margin: 0 25px 0px 25px;"> <h4>'+json[i].title+'<small class="pull-right helvetica-neue" >'+json[i].type+'</small></h4> </div> <div id="recipe-'+i+'" data-type="'+json[i].typeid+'" class="col-sm-12 img-recipe" style="background-repeat: no-repeat;background-size: cover; background-image: url(assets/img/yemekler/'+json[i].imageurl+');"> <span class="label label-recipe helvetica-neue" style="float: left; background: rgba(248,148,6, .8);" onclick="showRecipe();">tarif göster</span> <span id="menuye-ekle-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(61,132,51, .8);" onclick="addMenu('+json[i].typeid+', '+i+', '+json[i].id+', \''+json[i].title+'\', \''+json[i].imageurl+'\')">menüye ekle</span> <span id="menuden-cikar-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(229,34,34, .8); display: none;" onclick="removeMenu('+json[i].typeid+', '+i+')">menüden çıkar</span> </div>');
                }
                
                changeContainer('container-4');
            },
        });
    }   
}

var menu = {corba:{status: 0, id: '', title: '', image:''}, arasicak: {status: 0, id: '', title: '', image:''}, anayemek: {status: 0, id: '', title: '', image:''}, tatli: {status: 0, id: '', title: '', image:''}};

function addMenu(typeid, id, rid, title, imageurl){
    if($('#recipe-'+id).css('opacity') != "0.5"){
        $('div[data-type='+typeid+']').animate({opacity:'0.5', filter:'grayscale(100%)'}, 200, function(){
            $('#recipe-'+id).animate({opacity:'1', filter:'grayscale(0%)'}, 180);
        }); 
        $('#menuden-cikar-'+id).css('display','block');
        $('#menuye-ekle-'+id).css('display','none');

        if(typeid == 1){
            $('#corba').attr('class','label label-success').html('Seçildi');
            menu.corba.status = 1;
            menu.corba.id = rid;
            menu.corba.title = title;
            menu.corba.image = "assets/img/yemekler/" + imageurl;
        }else if(typeid == 2){
            $('#arasicak').attr('class','label label-success').html('Seçildi');
            menu.arasicak.status = 1;
            menu.arasicak.id = rid;
            menu.arasicak.title = title;
            menu.arasicak.image = "assets/img/yemekler/" + imageurl;
        }else if(typeid == 3){
            $('#anayemek').attr('class','label label-success').html('Seçildi');
            menu.anayemek.status = 1;
            menu.anayemek.id = rid;
            menu.anayemek.title = title;
            menu.anayemek.image = "assets/img/yemekler/" + imageurl;
        }
        
        if(menu.corba.status == 1 && menu.arasicak.status == 1 && menu.anayemek.status == 1){
            $('a[data-type=container-4-button]').css('opacity','1');
            $('a[data-type=container-4-button]').css('background-color','#7FCC32').css('border','1px solid #7FCC32');
        }
    }
}

function removeMenu(typeid,id){
    $('div[data-type='+typeid+']').animate({opacity:'1', filter:'grayscale(0%)'}, 200); 
    
    if(typeid == 1){
        $('#corba').attr('class','label label-danger').html('Seçilmedi');
        menu.corba.status = 0;
    }else if(typeid == 2){
        $('#arasicak').attr('class','label label-danger').html('Seçilmedi');
        menu.arasicak.status = 0;
    }else if(typeid == 3){
        $('#anayemek').attr('class','label label-danger').html('Seçilmedi');
        menu.anayemek.status = 0;
    }
    
    $('#menuden-cikar-'+id).css('display','none');
    $('#menuye-ekle-'+id).css('display','block');
    
    
    $('a[data-type=container-4-button]').css('opacity','0.5');
    $('a[data-type=container-4-button]').css('background-color','transparent').css('border','1px solid #fff');
}


$('input[data=material]').focusout(function(){
    if($(this).val() != ""){
        $(this).css('border','none');
    }
    
    var buttonStatus = true;
    $('input[data=material]').each(function(){
        if($(this).val() == ""){
            buttonStatus = false;
            return
        }
    });
    
    if(buttonStatus == true){
        $('a[data-type=container-3-button]').css('opacity','1');
        $('a[data-type=container-3-button]').css('background-color','#7FCC32').css('border','1px solid #7FCC32');
    }
    
});

function showDesertList(){
    if($('a[data-type=container-4-button]').css('opacity') == "1"){
        $('#tatlilistesi').modal('show');
    }
    
}

function backContainer3() {
    changeContainer('container-3'); 
    $('#recipes .row').html(''); 
    menu.corba.status = 0; 
    menu.arasicak.status = 0; 
    menu.anayemek.status = 0;
    $('#corba').attr('class','label label-danger').html('Seçilmedi');
    $('#arasicak').attr('class','label label-danger').html('Seçilmedi');
    $('#anayemek').attr('class','label label-danger').html('Seçilmedi');
}

function readToMeal(){
    if($('a[data-type=container-desert-button]').css('opacity') == "1"){
        $('#tatlilistesi').modal('hide');
        changeContainer('container-5');
        
        $('#meallist').append('<div class="col-xs-offset-1 col-xs-5  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Çorba</h3> </div><div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('+menu.corba.image+');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'+menu.corba.title+'</p> </div> </div>');
        $('#meallist').append('<div class="col-xs-5  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Ara Sıcak</h3> </div> <div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('+menu.arasicak.image+');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'+menu.arasicak.title+'</p> </div> </div>');
        $('#meallist').append('<div class="col-xs-offset-1 col-xs-5  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Ana Yemek</h3> </div> <div style="background-repeat: no-repeat;background-size: cover;border-radius: 0 0 6px 6px;background: url('+menu.anayemek.image+');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div> <p class="helvetica-neue" style="opacity: 0.7;">'+menu.anayemek.title+'</p> </div> </div>');
        $('#meallist').append('<div class="col-xs-5  img-user-choose " > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div class="caption" style="padding: 0;"> <h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, .1); border-radius: 6px 6px 0 0; font-size: 16px; text-align: center; padding-left: 6px;">Tatlı</h3> </div> <div style="border-radius: 0 0 6px 6px; background-repeat: no-repeat;background-size: cover;background: url('+menu.tatli.image+');    height: 80px; background-size: cover; background-repeat: no-repeat;" ></div><p class="helvetica-neue" style="opacity: 0.7;">'+menu.tatli.title+'</p> </div> </div>');
        
        $('#meallistphoto').append('<div class="col-xs-offset-1 col-xs-5  img-user-choose " style="height: 40px;" > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div style="background: url('+menu.corba.image+'); border-radius: 6px;   height: 57px; background-size: cover; background-repeat: no-repeat;" ><h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, 0.3);padding-top: 46px; border-radius: 6px; font-size: 8px; text-align: center; padding-left: 6px;">'+menu.corba.title+'</h3></div> </div> </div>');
        $('#meallistphoto').append('<div class="col-xs-5  img-user-choose " style="height: 40px;"> <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div style="background: url('+menu.arasicak.image+'); border-radius: 6px;   height: 57px; background-size: cover; background-repeat: no-repeat;" ><h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, 0.3);padding-top: 46px; border-radius: 6px; font-size: 8px; text-align: center; padding-left: 6px;">'+menu.arasicak.title+'</h3></div> </div> </div>');
        $('#meallistphoto').append('<div class="col-xs-offset-1 col-xs-5  img-user-choose " style="height: 40px;" > <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div style="background: url('+menu.anayemek.image+'); border-radius: 6px;   height: 57px; background-size: cover; background-repeat: no-repeat;" ><h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, 0.3);padding-top: 46px; border-radius: 6px; font-size: 8px; text-align: center; padding-left: 6px;">'+menu.anayemek.title+'</h3></div> </div> </div>');
        $('#meallistphoto').append('<div class="col-xs-5  img-user-choose " style="height: 40px;"> <div class="thumbnail" style="padding: 0; background-color: transparent;"> <div style="background: url('+menu.tatli.image+'); border-radius: 6px;   height: 57px; background-size: cover; background-repeat: no-repeat;" ><h3 style="margin: 0px; padding-top: 3px; padding-bottom: 3px; background: rgba(0, 0, 0, 0.3);padding-top: 46px; border-radius: 6px; font-size: 8px; text-align: center; padding-left: 6px;">'+menu.tatli.title+'</h3></div> </div> </div>');
        
        
    }
}

function completeToMeal(){
    changeContainer('container-6');
    var options = {width: 300, height: 300 };
    html2canvas(document.getElementById('snap'), options).then(function(canvas) {
        document.getElementById('snapimage').appendChild(canvas);
        document.getElementById('snaphtml').remove();
        //document.getElementById('snap').style.zoom = 1;
    });
    
}

