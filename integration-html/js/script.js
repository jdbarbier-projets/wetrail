
$(document).ready(function(){

    $("#latestsPosts .row .post-item").hover(function(){
        $( this ).find( ".details").fadeToggle( "show hide", "linear" );
    });


    // Zoom effect on image and shadow effect on  bloc for new on hover & touch
    $(".news-list .news-item a").hover(function(){
        $( this ).parent().parent().find( ".img-cover").toggleClass("hover" );
        $( this ).parent().parent().toggleClass("hover" );
    });
    $('.news-list .news-item a').bind('touchstart touchend', function(e) {
        $( this ).parent().parent().find( ".img-cover").toggleClass("hover" );
        $( this ).parent().parent().toggleClass("hover" );
    });

    $('.nav-item').on('show.bs.dropdown', function () {
        $(".overlay").addClass("visible");
        $( this ).parent().parent().parent().addClass("menu-deployed");
    });

    $('.nav-item').on('hide.bs.dropdown', function () {
        $(".overlay").removeClass("visible");
        $( this ).parent().parent().parent().removeClass("menu-deployed");
    });
});