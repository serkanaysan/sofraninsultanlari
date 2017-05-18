var $item = $('.carousel .item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');


$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: false,
  pause: "true"
});

function checkLoginState() {
    FB.logout(function(response) {
        // user is now logged out
    });
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