
$(function(){

    // loader page hide
    setTimeout( function(){ 
        if( $('#loader-wrapper').is(':visible') ){
            
            $('#loader-wrapper').hide(
                "clip",
                1000,
                function(){
                  $(this).css("z-index",-10);
                }
            );
        }
    }  , 5000 );
    // loader page hide


     // initiate the wow plugin
    new WOW().init();


    var scrollLink=$('.scroll');

    // adding a smooth scrooling
    scrollLink.click(function(e){
        e.preventDefault();
        $('body, html').animate({
            scrollTop:$(this.hash).offset().top-76
        },1000);
    });
    // adding a smooth scrooling


    // active menu link
    $(window).scroll(function(){
        var scroolBarLocation=$(this).scrollTop();

        $('.menu li a.scroll').each(function(){
            var sectionOffset=$(this.hash).offset().top-76;

            if(sectionOffset <= scroolBarLocation) {
                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');
            }
        });
    });


    // show language 
    $('.lang-head').click(function(e){
        e.preventDefault();
        if($('.lang-content').hasClass('lang-show')){
            $('.lang-content').removeClass("lang-show");
            $('.lang-head').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');            
        } else {
            $('.lang-content').addClass("lang-show");
            $('.lang-head').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });

   

});
