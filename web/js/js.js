var Drawer = function(options) {
    var is_touch_device = !!('ontouchstart' in window);
    var canvas = document.getElementById(options.id);
    var sketch = document.querySelector('#sketch');
    var sketch_style = getComputedStyle(sketch);
    canvas.width = parseInt(sketch_style.getPropertyValue('width'));
    canvas.height = parseInt(sketch_style.getPropertyValue('height'));
    var ctxt = canvas.getContext("2d");
    
    var isDrawing = false;
    
    ctxt.strokeStyle = 'black';
    ctxt.lineWidth = options.size || Math.ceil(Math.random() * 35);
    ctxt.lineCap = 'round';
    ctxt.lineJoin = 'round';

    var self = {
        offset : $(canvas).offset(),
        init: function()
        {
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
            return t-self.offset.left;
        },
        getY: function(event){
            if(is_touch_device)
                var t = event.targetTouches[0].pageY;
            else
                var t = event.pageY;
            return t-self.offset.top;
        }
    };
    this.clear = function()
    {
        ctxt.clearRect(0, 0, canvas.width, canvas.height);
    };
    this.setSize = function(size)
    {
        ctxt.lineWidth = size;
    };
    this.get = function()
    {
        //ctxt.putImageData( imdata, 0,0);
        return ctxt.getImageData(0,0,canvas.width,canvas.height);
    };
    this.setColor = function(clr)
    {
        ctxt.strokeStyle = clr;
    };
    this.save = function()
    {
        window.open(canvas.toDataURL('image/png'));
    };
    return self.init();
};
$(function(){
    var size = 1;
    var sizeStep = 5;
    var colors = ['white', 'pink', 'red', 'orange', 'yellow', 'green', 'blue', 'darkviolet',  'black'];
    for(k in colors)
        $('.colors').html($('.colors').html()+'<button class="color" value="'+colors[k]+'" style="background-color:'+colors[k]+';">&nbsp;</button>')
    var drawr = new Drawer({ id: "draw", size: size });
    $('#clear').on('click', function(){
        drawr.clear();
    });
    $('#save').on('click', function(){
        drawr.save();
    });
    $('.size').on('click', function(){
        if($(this).val() > 0)
        {
            size+=sizeStep;
        }
        else
        {
            size-=sizeStep;
            if(size <= 0)
                size = 1;
        }
        drawr.setSize(size);
    });
    $('.color').on('click', function(){
        drawr.setColor($(this).val());
    });
});