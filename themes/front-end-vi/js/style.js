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
                e.preventDefault();
                hideShowToggle(this);
            },false);
            $(this).click(function(e){
                e.preventDefault();
                hideShowToggle(this);
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
        
        setTimeout(function(){
            //set share zalo for float button
            var $menuZa = $('#main-menu').find('.zalo-share').html();
            $('#top .zalo-share').html($menuZa);
        },500);
    });
    
    // <![CDATA[
    $(function() {
        var pageTop = $('#top');
        pageTop.hide();
        var mainMenu = $('#main-menu').offset().top + $('#main-menu').height();
        $(window).scroll(function () {
            if ($(this).scrollTop() > mainMenu) {
              pageTop.fadeIn();
            } else {
              pageTop.fadeOut();
            }
        });
    });
});

function hideShowToggle(that){
    $('#accordion a[data-parent="#accordion"]').addClass('collapsed').removeClass('collapse');
    $('#accordion .collapse').removeClass('in').css('style','height:0px');
    $(that).removeClass('collapsed');
    var id = $(that).attr('href');
    $(id).addClass('in').css('style','height:auto');
}