function set_time_line()
{
    $('.now-line').remove();
    var dt = new Date();
    if(dt.getMinutes()>=30)
        var sel = '.hour-half';
    else
        var sel = '.hour-full';
    sel+=dt.getHours();
    $('<div>').css({
        'width': $('.calendar-cell:first').css('width'),
        'height': '1px',
        'background-color':'red',
        'position':'absolute'
    }).attr('class','now-line').appendTo('.day1 '+sel);
}

$(document).ready(function(){
    $('.toolbarreset').on('mouseenter',".toolbar-block", function(){ 
        $(this).find('.toolbar-info').show();
    }).on('mouseleave',".toolbar-block", function () {
        $(this).find('.toolbar-info').hide();
    });
    set_time_line();
    //setInterval('set_time_line()',30000);
    
    
    $(document).on('click', '.calendar-cell', function(){
        var width = $(this).css('width');
        var height = $(this).css('height');
        var div = $('<div>').css({
            'position'  :'fixed',
            'width'     :width,
            'background-color':'blue',
            'opacity'   :'0.5',
            'min-height':'5px'
        });
        $(this).append(div);
    });
    
    $.ajax({
        type: "POST",
        url: url("login"),
        data: {},
        dataTyoe: "json"
    }).done(function(data)
    {
        console.log(data);
    });
});