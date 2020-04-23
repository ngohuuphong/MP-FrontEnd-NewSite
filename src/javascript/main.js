import $ from 'jquery'; 
import 'select2';                       // globally assign select2 fn to $ element
import 'select2/dist/css/select2.css';


import Calendar from '../javascript/calendar.js';
import '../scss/style.scss';

console.log(Calendar);

$(document).ready(function(){
    $('.showmenu').on('click', function() {
        $('.dropdown-menu').toggle();
    });
    $('.menu_exit').on('click', function() {
        $('.dropdown-menu').hide();
    });

    $(".js-render-select2-multi").select2({
        placeholder: "Select a State"
    });

    var selector = document.getElementById('draw-calendar')
    if (selector) {

        var insatnceCalendar = new Calendar();
        var eventDefault = {
            '2020' : {
                '01' : {
                    '07' : [
                        { 'start' : '09:00', 'end' : '14:00', 'type' : 'ahihi', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                    ]
                },
                '04' : {
                    '14' : [
                        { 'start' : '06:00', 'end' : '17:00', 'type' : '面接', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                    ]
                }
            }
        };
        insatnceCalendar.setLabelDays(["日", "月", "火", "水", "木", "金", "土"]);
        insatnceCalendar.setLabelYear('年');
        insatnceCalendar.setLabelMonth('月');
        insatnceCalendar.setLabelModalHeader("スケジュール");
        insatnceCalendar.setEventDefault(eventDefault);
        insatnceCalendar.setElementDraw(selector);

        insatnceCalendar.draw();
    }

});

window.faqExpand = function (self) {
    if ($(self).parent().find('img:nth-child(2)').css('display') == 'none') {
        $(self).parent().find('img:nth-child(1)').hide();
        $(self).parent().find('img:nth-child(2)').show();
        $(self).parent().parent().find(".answer_div").slideDown();
        $(self).parent().parent().find(".answer_div").css('display', 'flex');
    } else {
        $(self).parent().find('img:nth-child(1)').show();
        $(self).parent().find('img:nth-child(2)').hide();
        $(self).parent().parent().find(".answer_div").slideUp();
    }
}

window.faqExpand2 = function (self) {
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

