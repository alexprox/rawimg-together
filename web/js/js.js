var CanvasDrawr = function(options) {
	var canvas = document.getElementById(options.id),
	ctxt = canvas.getContext("2d");

	canvas.style.width = '100%'
	canvas.width = canvas.offsetWidth;
	canvas.style.width = '';
	canvas.style.height = '100%'
	canvas.height = canvas.offsetHeight;
	canvas.style.height = '';

	ctxt.lineWidth = options.size || Math.ceil(Math.random() * 35);
	ctxt.lineCap = options.lineCap || "round";
	ctxt.pX = undefined;
	ctxt.pY = undefined;

	var lines = [,,];
	var color = 'black'
	var offset = $(canvas).offset();

	var eventCount = 0;

	var self = {
		// Bind click events
		init: function() {
			// Set pX and pY from first click
			canvas.addEventListener('touchstart', self.preDraw, false);
			canvas.addEventListener('touchmove', self.draw, false);
		},

		preDraw: function(event) {
			$.each(event.touches, function(i, touch) {
				var id = touch.identifier;
				lines[id] = {
					x	: this.pageX - offset.left,
					y   : this.pageY - offset.top,
					color : color
				};
			});
			event.preventDefault();
		},

		draw: function(event) {
			var e = event, hmm = {};
			eventCount += 1;
			$.each(event.touches, function(i, touch) {
				var id = touch.identifier,
				moveX = this.pageX - offset.left - lines[id].x,
				moveY = this.pageY - offset.top - lines[id].y;

				var ret = self.move(id, moveX, moveY);
				lines[id].x = ret.x;
				lines[id].y = ret.y;
			});
			event.preventDefault();
		},
		move: function(i, changeX, changeY) {
			ctxt.strokeStyle = lines[i].color;
			ctxt.beginPath();
			ctxt.moveTo(lines[i].x, lines[i].y);

			ctxt.lineTo(lines[i].x + changeX, lines[i].y + changeY);
			ctxt.stroke();
			ctxt.closePath();

			return { x: lines[i].x + changeX, y: lines[i].y + changeY };
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
	{//ctxt.putImageData( imdata, 0,0);
		return ctxt.getImageData(0,0,canvas.width,canvas.height);
	};
	this.setColor = function(clr)
	{
		color = clr;
	};
	this.save = function()
	{
		window.open(canvas.toDataURL('image/png'));
	}
	return self.init();
};
$(function(){
	var size = 1;
	var sizeStep = 5;
	var colors = ['white', 'pink', 'red', 'orange', 'yellow', 'green', 'blue', 'darkviolet',  'black'];
	for(k in colors)
		$('.colors').html($('.colors').html()+'<button class="color" value="'+colors[k]+'" style="background-color:'+colors[k]+';">&nbsp;</button>')
	var drawr = new CanvasDrawr({ id: "draw", size: size });
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
	$('.game').on('click', function(){
		console.log('game_selected');
	});
});