$(document).ready(function() {
    $('.showmenu').on('click', function() {
        $('.dropdown-menu').toggle();
    });
    $('.menu_exit').on('click', function() {
        $('.dropdown-menu').hide();
    });

});

function faqExpand(self) {
    if ($(self).find('img:nth-child(2)').css('display') == 'none') {
        $(self).find('img:nth-child(1)').hide();
        $(self).find('img:nth-child(2)').show();
        $(self).parent().parent().parent().find(".answer_div").slideDown();
        $(self).parent().parent().parent().find(".answer_div").css('display', 'flex');
    } else {
        $(self).find('img:nth-child(1)').show();
        $(self).find('img:nth-child(2)').hide();
        $(self).parent().parent().parent().find(".answer_div").slideUp();
    }

}