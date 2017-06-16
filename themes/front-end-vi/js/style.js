$(document).ready(function(){
    $("textarea", $("#contact")).css({
        width: $("#contact").width() - 210
    })
    $(window).resize(function(){
        $("textarea", $("#contact")).css({
            width: $("#contact").width() - 210
        })
    })
})