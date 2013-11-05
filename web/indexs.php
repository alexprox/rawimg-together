<?php
	session_start();
	//session_destroy();unset($_SESSION);die('');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Альфа</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta charset="utf8">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			body
			{
				margin:0;
				padding:0;
			}
			#draw
			{
				border: black solid 1px;
			}
			.navbar
			{
				position:fixed;
				top:0;
				left:0;
				width: 100%;
				
			}
			.color
			{
				height: 29px;
				width: 29px;
			}
			.navbar div
			{
				display: inline-block;
			}
			.modal
			{
				position: absolute;
				height: 100%;
				width: 100%;
				background-color: white;
			}
			.users
			{
				z-index: 2;
			}
			.games
			{
				z-index: 1;
			}
		</style>
	</head>
	<body>
		<div class="modal users" style="display:none">
			<div class="list"></div>
			<button class="btn btn-large btn-block btn-danger close">Назад</button>
		</div>
		<div class="modal games">
			<button class="btn btn-large btn-block btn-success" id="new_game">Новая игра</button>
			<div class="list"></div>
		</div>
		<div class="navbar">
			<button class="btn size" value="1"><i class="icon-plus-sign"></i></button>
			<button class="btn size" value="-1"><i class="icon-minus-sign"></i></button>
			<div class="colors"></div>
			<div class="right">
				<button class="btn" id="clear" ><i class="icon-trash"></i></button>
				<button class="btn" id="save" ><i class="icon-download-alt"></i></button>
				<button class="btn" id="send" ><i class="icon-envelope"></i></button>
			</div>
		</div>
		<canvas id="draw" height="450" width="922"></canvas>
		<script src="/js/jquery.min.js"></script>
		<script>
		<?php if(!isset($_SESSION['nickname'])): ?>
			var user = '';
			while(user.length == 0)
			{
				user = prompt('Ты кто? (a-z, 0-9, _)');
				if(!user)
					user = '';
			}
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: {
					action: 'login',
					nickname: user
				},
				dataType: 'json'
			}).success(function( msg ){
				console.log(msg);
			}).done(function( msg ){
				console.log(msg);
			});
		<?php endif; ?>
		</script>
		<script src="/js/js.js"></script>
	</body>
</html>