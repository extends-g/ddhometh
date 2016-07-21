$(document).ready(function() {
    console.log('aaa');

    //lazyload img in gallery
    $("img.img-lazy").lazyload({
        effect : "fadeIn"
    });

    //page loader
    paceOptions = {
        elements: true
    };

    //navbar mobile
    $(".menu-opener").click(function(){
        $(".menu-opener, .menu-opener-inner, .menu").toggleClass("active");
    });

    //gallery-show slider
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 4
    });

});
