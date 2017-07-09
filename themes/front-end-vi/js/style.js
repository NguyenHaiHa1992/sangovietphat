$(document).ready(function(){
    
    $("textarea", $("#contact")).css({
        width: $("#contact").width() - 210
    })
    $(window).resize(function(){
        $("textarea", $("#contact")).css({
            width: $("#contact").width() - 210
        })
    });
    
    $('#page-top').on('click' ,function(e){
        e.preventDefault();
        var $target = $('#container-header');

        if ($target.length) {

            var targetOffset = $target.offset().top - 0;

            $('html,body').animate({scrollTop: targetOffset}, 800);

            return false;

        }

    });
    
    $('.caret').on('click', function(e){
        e.preventDefault();
    });
})