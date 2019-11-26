
$(document).ready(function(){

    // Hide/reveal the text of the latests posts bloc in the HP
    $("#latestsPosts .row .post-item").hover(function(){
        $( this ).find( ".details").fadeToggle( "show hide", "linear" );
    });

    // Zoom effect on image and shadow effect on block for new on hover & touch
    $(".news-item a, .news-item img, .more-content-item a, .more-content-item img").hover(function(){
        $( this ).parent().parent().find( ".img-cover").toggleClass("hover" );
    });
    // Special effect for box-shadow on list page
    $(".news-item .news-content, .news-item .thumbnail-content").hover(function(){
        $( this ).parent().toggleClass("hover" );
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

    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(500);
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(400);
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

    // Management of shadow effect on menu (disabled if no header-cover)
    if ( !$('.zones .header-cover').length && !$('.zones #carouselHome').length ) {
        $('.fixed-top').addClass('no-shadow');
    }

    // Management of transparent header on mobile //
    if( $('.fixed-top').offset().top < 150 ) {
        $('.fixed-top').addClass('bg-sm-transparent');
        $('.fixed-top .wetrail-logo').addClass('d-none').removeClass('d-block');
        $('.fixed-top .wetrail-logo-white').removeClass('d-none').addClass('d-block');

    }
    else {
        $('.fixed-top').removeClass('bg-sm-transparent');
        $('.fixed-top .wetrail-logo').addClass('d-block').removeClass('d-none');
        $('.fixed-top .wetrail-logo-white').removeClass('d-block').addClass('d-none');
        if ( !$('.zones .header-cover').length && !$('.zones #carouselHome').length ) {
            $('.fixed-top').removeClass('no-shadow');
        }
    }
    $(window).scroll(function(){
        $('.fixed-top').removeClass('no-shadow');
        if($(window).scrollTop() < 150) {
            $('.fixed-top').addClass('bg-sm-transparent');
            $('.fixed-top .wetrail-logo').addClass('d-none').removeClass('d-block');
            $('.fixed-top .wetrail-logo-white').removeClass('d-none').addClass('d-block');
            if ( !$('.zones .header-cover').length && !$('.zones #carouselHome').length ) {
                $('.fixed-top').addClass('no-shadow');
            }
        } else{
            $('.fixed-top').removeClass('bg-sm-transparent');
            $('.fixed-top .wetrail-logo').addClass('d-block').removeClass('d-none');
            $('.fixed-top .wetrail-logo-white').removeClass('d-block').addClass('d-none');
        }
        // ProgressBar Management
        fillProgressBar();

        // Animation management
        $('.animated').each(function() {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('slideInUp slow');
            }
        });
    });

    // Smooth scroll when clicking on anchors
    $( "a.scroll-anchor" ).click(function( event ) {
        event.preventDefault();
        var anchorPosition = $($(this).attr("href")).offset().top - ($('.fixed-top').height() + 20 );
        $("html, body").animate({ scrollTop: anchorPosition }, 1000);
    });

    // ProgressBar Management
    fillProgressBar();

});


// Management of progressBar animation
function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return (docViewBottom >= elemTop && docViewTop <= elemBottom);
}

function fillProgressBar() {
    $('.progress .progress-bar').each(function () {
        if (isScrolledIntoView($(this))) {
            $(this).css("width", function () {
                return $(this).attr("aria-valuenow") + "%";
            });
        }
    });
}