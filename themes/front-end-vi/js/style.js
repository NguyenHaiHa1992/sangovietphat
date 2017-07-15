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
    
    setTimeout(function(){
        $('#accordion').find('a[data-parent="#accordion"]').each(function(t){
            $(this).hover(function(e){
                $(this).trigger('click');
            });
        });
    },300);
    
    $(window).on('load',function(){
        var text = $('#menu_box_title').text();
        if(text.trim() === ''){
            var li = $('#main-content').find('.breadcrumb').find('li');
            text = $(li[0]).find('a').text();
            $('#menu_box_title').text(text);
        }
    });
})