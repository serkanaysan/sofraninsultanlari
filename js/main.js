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
        FB.api('/me?fields=first_name,name,picture.type(normal),gender', function(response) {
            
            $('.maggi-container').css('display','none');
            $('#container-2').fadeIn('slow');
            
            
            
            var data = {"fbid":response.id, "name":response.name, "imgurl":response.picture.data.url, "gender": response.gender };
            
            $.ajax({
                type: 'post',
                url: 'backend/loginlog.php',
                dataType: 'json',
                data: data,
                success: function(json){
                    console.log(json.message);
                    $('img[data="fbphoto"]').attr('src', response.picture.data.url);
                    if(response.gender == "female"){
                        $('h2[data="adsoyad"]').html(response.first_name + " Sultan");
                    }
                    else{
                        $('h2[data="adsoyad"]').html(response.name);
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

