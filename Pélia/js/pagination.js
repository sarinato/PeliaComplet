$('.nxt').click(function () {
    alert("jghb");
    if ($('.blog_left_sidebar .pages').hasClass('activate')) {


        var $activate = $('div.activate');
        var $inactive = $('div.inactive');
        $activate.removeClass("fadeInRightBig activate").addClass('fadeOutLeftBig last').prev().removeClass('last');
        $inactive.removeClass("hide inactive fadeOutLeftBig").addClass("activate fadeInRightBig").next().addClass('inactive');

    }
    //End Else

});