
$(document).ready(function(){

    // Hide/reveal the text of the latests posts bloc in the HP
    $("#latestsPosts .row .post-item").hover(function(){
        $( this ).find( ".details").fadeToggle( "show hide", "linear" );
    });

    // Zoom effect on image and shadow effect on  bloc for new on hover & touch
    $(".news-list .news-item a, .news-list .news-item .thumbnail-content").hover(function(){
        $( this ).parent().parent().find( ".img-cover").toggleClass("hover" );
        $( this ).parent().parent().toggleClass("hover" );
    });

    // Navigation menu classes
    $('.navbar #navbarCollapse').on('show.bs.collapse', function () {
        $("body").addClass("fixed-position");
        $(".fixed-top.navbar").removeClass("bg-sm-transparent");
        $('.fixed-top .wetrail-logo').addClass('d-block').removeClass('d-none');
        $('.fixed-top .wetrail-logo-white').removeClass('d-block').addClass('d-none');
        // Set menu height calculation on mobile
        $('.fixed-top.navbar .menu .navbar-right .navbar-nav').height( $(window).height() - 70 );
    });
    $('.navbar #navbarCollapse').on('hide.bs.collapse', function () {
        $("body").removeClass("fixed-position");
    });
    $('.nav-item').on('show.bs.dropdown', function () {
        $(".overlay").addClass("visible");
        $( this ).parent().parent().parent().addClass("menu-deployed");
    });
    $('.nav-item').on('hide.bs.dropdown', function () {
        $(".overlay").removeClass("visible");
        $( this ).parent().parent().parent().removeClass("menu-deployed");
    });

    // Set the height of author image of the "about us" page
    $("#aboutUs .author .author-image img").height( $("#aboutUs .author .author-item").height() );


    // Redirection when clicking/touching an image of a more item block or a list-item block
    $(".more-content-item .thumbnail-content, .news-item .thumbnail-content").click(function(){
        window.location.href = $( this ).parent().find( ".content a, .news-content a").attr("href");

    });
    $(".more-content-item .thumbnail-content").bind('touchstart touchend', function() {
        window.location.href = $( this ).parent().find( ".content a").attr("href");
    });

    // Management of transparent header on mobile //
    if( $('.fixed-top').offset().top < 200 ) {
        $('.fixed-top').addClass('bg-sm-transparent');
        $('.fixed-top .wetrail-logo').addClass('d-none').removeClass('d-block');
        $('.fixed-top .wetrail-logo-white').removeClass('d-none').addClass('d-block');
    }
    else {
        $('.fixed-top').removeClass('bg-sm-transparent');
        $('.fixed-top .wetrail-logo').addClass('d-block').removeClass('d-none');
        $('.fixed-top .wetrail-logo-white').removeClass('d-block').addClass('d-none');
    }
    $(window).scroll(function(){
        if($(window).scrollTop() < 200) {
            $('.fixed-top').addClass('bg-sm-transparent');
            $('.fixed-top .wetrail-logo').addClass('d-none').removeClass('d-block');
            $('.fixed-top .wetrail-logo-white').removeClass('d-none').addClass('d-block');
        } else{
            $('.fixed-top').removeClass('bg-sm-transparent');
            $('.fixed-top .wetrail-logo').addClass('d-block').removeClass('d-none');
            $('.fixed-top .wetrail-logo-white').removeClass('d-block').addClass('d-none');
        }
    });

    // Smooth scroll when clicking on anchors
    $( "a.scroll-anchor" ).click(function( event ) {
        event.preventDefault();
        var anchorPosition = $($(this).attr("href")).offset().top - ($('.fixed-top').height() + 20 );
        $("html, body").animate({ scrollTop: anchorPosition }, 2000);
    });

});