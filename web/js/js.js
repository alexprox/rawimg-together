var Drawer = function(options){
    var is_touch_device = !!('ontouchstart' in window);
    var canvas = document.getElementById(options.id);
    var ctxt;
    var colors;
    
    var isDrawing = false;
    var lineStep = 5;
    
    var self = {
        offset : $(canvas).offset(),
        init: function()
        {
            $('body').addClass('full');
            canvas.width= $('body').width();
            canvas.height= $('body').height();
            ctxt = canvas.getContext("2d");
            colors = ['black', 'gray', 'white', 'pink', 'red', 'orange', 'yellow', 'green', 'blue', 'darkviolet'];
            ctxt.strokeStyle = 'black';
            ctxt.lineWidth = options.size || Math.ceil(Math.random() * 35);
            ctxt.lineCap = 'round';
            ctxt.lineJoin = 'round';
            
            for(k in colors)
            {
                $('.colors').html($('.colors').html()+'<button class="btn btn-large color" value="'+colors[k]+'" style="background-color:'+colors[k]+';">&nbsp;</button>');
                //if(k == 4)$('.colors').html($('.colors').html()+'<br>');
            }
            canvas.addEventListener("touchstart",self.start,false);
            canvas.addEventListener("touchmove",self.draw,false);
            canvas.addEventListener("touchend",self.stop,false);
            canvas.addEventListener("mousedown",self.start,false);
            canvas.addEventListener("mousemove",self.draw,false);
            canvas.addEventListener("mouseup",self.stop,false);
            canvas.addEventListener("mouseout",self.stop,false);
        },
        start: function(e)
        {
            isDrawing = true;
            //tap
            ctxt.beginPath();
            ctxt.moveTo(self.getX(e), self.getY(e));
            ctxt.lineTo(self.getX(e)+1, self.getY(e)+1);
            ctxt.stroke();
            //draw
            ctxt.beginPath();
            ctxt.moveTo(self.getX(e), self.getY(e));
            e.preventDefault();
        },
        draw: function(e)
        {
            if(isDrawing)
            {
                ctxt.lineTo(self.getX(e), self.getY(e));
                ctxt.stroke();
            }
            e.preventDefault();
        },
        stop: function(e)
        {
            if(isDrawing)
            {
                ctxt.stroke();
                ctxt.closePath();
                isDrawing = false;
            }
            e.preventDefault();
        },
        getX: function(event){
            if(is_touch_device)
                var t = event.targetTouches[0].pageX;
            else
                var t = event.pageX;
            return t;//-self.offset.left;
        },
        getY: function(event){
            if(is_touch_device)
                var t = event.targetTouches[0].pageY;
            else
                var t = event.pageY;
            return t;//-self.offset.top;
        }
    };
    this.clear = function()
    {
        ctxt.clearRect(0, 0, canvas.width, canvas.height);
    };
    this.setSize = function(size)
    {
        var tmp = ctxt.lineWidth;
        size = size==1?1:-1;
        tmp = tmp+size*lineStep;
        if(tmp < 1)
            tmp = options.size;
        ctxt.lineWidth = tmp;
    };
    this.get = function()
    {
        //ctxt.putImageData( imdata, 0,0);
        return ctxt.getImageData(0,0,canvas.width,canvas.height);
    };
    this.setColor = function(clr)
    {
        if(colors.indexOf(clr) !== -1)
            ctxt.strokeStyle = clr;
    };
    this.save = function()
    {
        window.open(canvas.toDataURL('image/png'));
    };
    self.init();
    return this;
};
$(function(){
    $('.nav-toggler').live('click', function(){
        var bar = $('.'+$(this).attr('for'));
        if(bar.length > 0)
        {
            $('.navbar').slideUp('fast');
            if(bar.is(':visible'))
            {
                bar.slideUp('fast');
            }
            else
            {
                bar.slideDown('fast');
            }
        }
    });
    if($('#draw').length)
    {
        var drawr = new Drawer({
            id: "draw",
            size: 3 
        });
    }
    $('.draw-editor-toggler').on('click', function(){
        var panel = $('.draw-editor');
        if(panel.is(':visible'))
            panel.slideUp('fast');
        else
            panel.slideDown('fast');
    });
    $('.clear').on('click', function(){
        drawr.clear();
    });
    $('.save-drawing').on('click', function(){
        drawr.save();
    });
    $('.size').on('click', function(){
        drawr.setSize($(this).val());
    });
    $('.color').on('click', function(){
        $('.color').removeClass('active');
        $(this).addClass('active');
        drawr.setColor($(this).val());
    });
    $('.cancel').on('click', function(){
       var a = confirm(txt('cancel-warning')); 
       if(a)
           drawr.clear();
    });
});