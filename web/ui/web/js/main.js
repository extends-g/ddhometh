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

});
