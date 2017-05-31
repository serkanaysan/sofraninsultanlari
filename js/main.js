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
                $('#tatlilistesi .modal-body .row').append('<div id="desert-'+json[i].id+'" data-id="'+json[i].id+'" data-type="desert" class="col-xs-4 col-md-4 desert"> <div class="thumbnail"> <img class="img-rounded" src="'+json[i].imageurl+'" alt="'+json[i].title+'"> <div class="caption" style="padding: 6px 6px 0px 6px; "> <p class="helvetica-neue" style="font-size: 12px;">'+json[i].title+'</p> </div> </div> </div>');
            }
            $('div[data-type=desert]').on('click', function(){
                $('div[data-type=desert]').find('.thumbnail').removeClass('active').addClass('passive');
                $(this).find('.thumbnail').removeClass('passive').addClass('active');
                $('a[data-type=container-desert-button]').css('opacity','1');
                menu.tatli.status = 1;
                menu.tatli.image = $(this).find('img').attr('src');
                menu.tatli.id = $(this).attr('data-id');
                menu.tatli.title = $(this).find('p').html();
            });
            
            
        },
    });
});





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
            
            
            
            
            
            var data = {"fbid":response.id, "name":response.name, "imgurl":response.picture.data.url, "gender": response.gender, "email": response.email };
            console.log(1);
            $.ajax({
                type: 'post',
                url: 'backend/loginlog.php',
                dataType: 'json',
                data: data,
                success: function(json){
                    console.log(2);
                    console.log(json);
                    if(json.code == '220'){
                        location.href = '?userpage='+json.value;
                    }
                    else{
                        $('.maggi-container').css('display','none');
                        $('#container-2').fadeIn('slow');
                        $('img[data="fbphoto"]').attr('src', response.picture.data.url);
                        if(response.gender == "female"){
                            $('h2[data="adsoyad"]').html(response.first_name + " Sultan");
                        }
                        else{
                            $('h2[data="adsoyad"]').html(response.name);
                        }
                        loginLogId = json.loginlogid;
                        $('#whatsapp').attr('href','whatsapp://send?text=%C4%B0ftar+men%C3%BCm%C3%BC+g%C3%B6rmek+i%C3%A7in+t%C4%B1kla%20http%3A%2F%2Fsofraninsultanlari.themediamove.com%2F%3Fuserpage%3D'+loginLogId);
                    }
                    
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

var cameraMaterialNo = 6;
var arrCameraMaterial= new Array();
function addMaterialCamera(){
    
    if($('#btnYeniMalzeme').css('opacity') != '1'){
        $('.col-camera').each(function(){
            if($(this).find('label').css('background-image') == 'none' ){
                $(this).find('label').css('border','1px solid red');
            }

        });
    }
    
    if($('#btnYeniMalzeme').css('opacity') == '1'){
        $('#addMaterialCameraContainer').before('<div class="col-xs-4 col-camera"> <h6 style="margin-bottom: 5px;">'+cameraMaterialNo+'. Malzeme</h6> <label class="btn btn-multiline" for="material-photo-'+cameraMaterialNo+'"> <input id="material-photo-'+cameraMaterialNo+'" name="material-photo-'+cameraMaterialNo+'" data="material-photo" type="file" style="display:none;" onchange="fileSelected(\'material-photo-'+cameraMaterialNo+'\');" accept="image/*" capture="camera"> <i class="fa fa-camera" aria-hidden="true" style="font-size: 24px;"></i> Malzemenin fotoğrafını çekmek için tıkla </label> </div>');
        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        cameraMaterialNo++;
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
        console.log(jsonMaterial);
        $.ajax({
            type: 'post',
            url: 'backend/usermaterial.php',
            dataType: 'json',
            data: {data : jsonMaterial, loginlogid : loginLogId}, 
            success: function(json){
                for(var i=0; i<json.length; i++){
                    $('#recipes .row').append('<div class="col-sm-12" style="margin: 0 25px 0px 25px;"> <h4>'+ (json[i].title.length > 22 ? (json[i].title.substring(0,22)+'...') : json[i].title)+'<small class="pull-right helvetica-neue" >'+json[i].type+'</small></h4> </div> <div id="recipe-'+i+'" data-type="'+json[i].typeid+'" class="col-sm-12 img-recipe" style="background-repeat: no-repeat;background-size: cover; background-image: url('+json[i].imageurl+');"> <span class="label label-recipe helvetica-neue" style="float: left; background: rgba(248,148,6, .8);" onclick="showRecipe('+json[i].id+',\''+json[i].title+'\',\''+json[i].description+'\',\''+json[i].imageurl+'\');">tarif göster</span> <span id="menuye-ekle-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(61,132,51, .8);" onclick="addMenu('+json[i].typeid+', '+i+', '+json[i].id+', \''+json[i].title+'\', \''+json[i].imageurl+'\')">menüye ekle</span> <span id="menuden-cikar-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(229,34,34, .8); display: none;" onclick="removeMenu('+json[i].typeid+', '+i+')">menüden çıkar</span> </div>');
                }
                
                changeContainer('container-4');
            },
        });
    }   
}

function getRecipeCamera(){
    if($('#btnGetRecipeCamera').css('opacity') != '1'){
        $('.col-camera').each(function(){
            if($(this).find('label').css('background-image') == 'none' ){
                $(this).find('label').css('border','1px solid red');
            }

        });
    }
    
    if($('#btnGetRecipeCamera').css('opacity') == '1'){

            var jsonCameraMaterial = JSON.stringify(arrCameraMaterial);
            console.log(jsonCameraMaterial);
            $.ajax({
                type: 'post',
                url: 'backend/usermaterial.php',
                dataType: 'json',
                data: {data : jsonCameraMaterial, loginlogid : loginLogId}, 
                success: function(json){
                    console.log(json);
                    for(var i=0; i<json.length; i++){
                        $('#recipes .row').append('<div class="col-sm-12" style="margin: 0 25px 0px 25px;"> <h4>'+ (json[i].title.length > 22 ? (json[i].title.substring(0,22)+'...') : json[i].title)+'<small class="pull-right helvetica-neue" >'+json[i].type+'</small></h4> </div> <div id="recipe-'+i+'" data-type="'+json[i].typeid+'" class="col-sm-12 img-recipe" style="background-repeat: no-repeat;background-size: cover; background-image: url('+json[i].imageurl+');"> <span class="label label-recipe helvetica-neue" style="float: left; background: rgba(248,148,6, .8);" onclick="showRecipe('+json[i].id+',\''+json[i].title+'\',\''+json[i].description+'\',\''+json[i].imageurl+'\');">tarif göster</span> <span id="menuye-ekle-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(61,132,51, .8);" onclick="addMenu('+json[i].typeid+', '+i+', '+json[i].id+', \''+json[i].title+'\', \''+json[i].imageurl+'\')">menüye ekle</span> <span id="menuden-cikar-'+i+'" class="label label-info label-recipe helvetica-neue" style="float: right; background: rgba(229,34,34, .8); display: none;" onclick="removeMenu('+json[i].typeid+', '+i+')">menüden çıkar</span> </div>');
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
            menu.corba.image = imageurl;
        }else if(typeid == 2){
            $('#arasicak').attr('class','label label-success').html('Seçildi');
            menu.arasicak.status = 1;
            menu.arasicak.id = rid;
            menu.arasicak.title = title;
            menu.arasicak.image = imageurl;
        }else if(typeid == 3){
            $('#anayemek').attr('class','label label-success').html('Seçildi');
            menu.anayemek.status = 1;
            menu.anayemek.id = rid;
            menu.anayemek.title = title;
            menu.anayemek.image = imageurl;
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
    
    if($(this).val() == ""){
        $('a[data-type=container-3-button]').css('opacity','0.5');
        $('a[data-type=container-3-button]').css('background-color','transparent').css('border','1px solid #FFF');
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

function backContainer4() {
    changeContainer('container-4'); 
    $('#meallist').html('');
    $('#meallistphoto').html('');
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
    
    
    $.ajax({
        url: 'backend/userrecipe.php',
        type: 'post',
        dataType: 'json',
        data: {corba:menu.corba.id,arasicak:menu.arasicak.id,anayemek:menu.anayemek.id,tatli:menu.tatli.id, loginlogid:loginLogId},
        success: function(response){
            changeContainer('container-6');
            html2canvas($("#snap"), {
                onrendered: function(canvas) {
                  $.post('backend/canvasimageupload.php',
                    {
                        id : loginLogId,
                        img : canvas.toDataURL("image/png")
                    }, function(data) {
                        console.log(data);
                    });
                }
            });
            console.log(response);
        },
    });
    
}

  

function showRecipe(id, title, description, image){
    $('#tarifmalzeme').html('');
    $('#tarifbaslik').html(title);
    $('#tarifresim').attr('src',image);
    $('#tarifaciklama').html(description);
    var data = {query:id};
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'api/recipematerial.php',
        data: data,
        success: function(json){
            for(var i=0; i<json.length; i++){
                $('#tarifmalzeme').append('<li>'+ json[i].description + ' ' + json[i].title+'</li>');
            }
        }
    });
    
    $('#tarifgoster').modal('show');
    
    
}

function confirmMaterial(filename){

    $('#malzemeonay').modal('hide');
    $(selectedUploadFile).css('background-image','url(upload/'+filename+')').css('background-repeat','no-repeat').css('background-size','cover').css('height','94px');
    $(selectedUploadFile).text('');
    
    $('#malzemeonaysecenek input[type=radio]').each(function(){
        if($(this)[0].checked){
            arrCameraMaterial.push($(this).attr('data-id'));
        }
    });
    
    var iPhotoSelected = 0;
    $('.col-camera').each(function(){
        if($(this).find('label').css('background-image') != 'none' && $(this).find('label').css('background-image') != undefined ){
            iPhotoSelected++;
        }
        
        if($(this).find('label').css('background-image') != 'none' ){
            $(this).find('label').css('border','1px solid #fff');
        }
        else{
            
        }
        
    });
    
    if(iPhotoSelected >= 5){
        $('#btnYeniMalzeme').css('opacity','1').css('background-color','rgb(127, 204, 50)');
        $('#btnGetRecipeCamera').css('opacity','1').css('background-color','rgb(127, 204, 50)').css('border-color','rgb(127, 204, 50)');
    }
}

function takePhotoAgain(buttonId){
    $('#malzemeonay').modal('hide');
    $('label[for="'+buttonId+'"]').click();
    
}

$("#imageDownload").click(function() {
    
    html2canvas($("#snap"), {
        onrendered: function(canvas) {
          saveAs(canvas.toDataURL(), 'maggi.png');
        }
    });
    
  });
  
  
  
  function saveAs(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = uri;
      link.download = filename;

      //Firefox requires the link to be in the body
      document.body.appendChild(link);

      //simulate click
      link.click();

      //remove the link when done
      document.body.removeChild(link);
    } else {
      window.open(uri);
    }
  }
  
function facebookShare(){
    FB.ui({
        method: 'share',
        display: 'popup',
        hashtag: '#sofraninsultanlari',
        href: 'http://sofraninsultanlari.themediamove.com/?userpage='+loginLogId,
    }, function(response){});
    ga('send', 'event', 'Maggi', 'SofraninSultanlari', 'Facebook');
}

var selectedUploadFile = '';

function fileSelected(fileuploadid) {
    selectedUploadFile = 'label[for="'+fileuploadid+'"]';
    
        var count = document.getElementById(fileuploadid).files.length;
 
              
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById(fileuploadid).files[index];
 
                     var fileSize = 0;
 
                     if (file.size > 1024 * 1024)
 
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
 
                     else
 
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
 
                     
 
              }
              uploadFile(fileuploadid)
 
      }
      
      function uploadFile(fileuploadid) {
          $('#loading').fadeIn('slow');
 
        var fd = new FormData();
 
              var count = document.getElementById(fileuploadid).files.length;
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById(fileuploadid).files[index];
 
                     fd.append('myFile', file);
 
              }
 
        var xhr = new XMLHttpRequest();
 
        xhr.upload.addEventListener("progress", uploadProgress, false);
 
        xhr.addEventListener("load", uploadComplete, false);
 
        xhr.addEventListener("error", uploadFailed, false);
 
        xhr.addEventListener("abort", uploadCanceled, false);
 
        xhr.open("POST", "savetofile.php?fuId="+fileuploadid+'&loginlogid='+loginLogId);
 
        xhr.send(fd);
 
      }
      
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          console.log(percentComplete.toString() + '%');
 
        }
 
        else {
 
          console.log('unable to compute');
 
        }
 
      }
 
      function uploadComplete(evt) {
          
          var json = JSON.parse(evt.target.response);
        $('#loading').fadeOut('slow');
          
          var n_match  = ntc.name(json.colorcode);
            n_rgb = n_match[0]; // This is the RGB value of the closest matching color
            n_name = n_match[1]; // This is the text string for the name of the match
            n_shade_rgb = n_match[2]; // This is the RGB value for the name of colors shade
            n_shade_name = n_match[3]; // This is the text string for the name of colors shade
            n_exactmatch = n_match[4]; // True if exact color match, False if close-match

            $.ajax({
                url: 'api/material.php',
                type: 'post',
                dataType: 'json',
                data: 'colorcode='+n_shade_rgb,
                success: function(json){
                    $('#malzemeonaysecenek').html('');
                    for(var i=0; i<json.length; i++){
                       
                       $('#malzemeonaysecenek').append('<div class="radio"> <label> <input type="radio" data-id="'+json[i].title+'" name="optionsRadios" id="optionsRadios1'+i+'" value="option'+i+'" checked>'+json[i].title+'</label> </div>'); 
                    }
                    $('#malzemeonay').modal('show');
                    
                }
            });
            
            $('#btnTakePhotoAgain').attr('onclick','takePhotoAgain("'+json.fuId+'")');
            
            $('#btnConfirmMaterial').attr('onclick','confirmMaterial("'+json.filename+'")')
        //
 
 
      }
 
      function uploadFailed(evt) {
 
        //alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        //alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }
