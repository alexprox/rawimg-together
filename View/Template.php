<!DOCTYPE html>
<html>
    <head>
        <title>.RAWIMG Together</title>
        <meta charset="utf8">
        <?php if(!isset($drawer)): ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php endif; ?>
        <?php if($full_bootstrap): ?>
            <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <?php endif; ?>
        <link href="/bootstrap-buttons-icons/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/css.css" rel="stylesheet">
    </head>
    <body <?php if($navbar): ?>class="have-navbar"<?php endif;?>>
        <?php if($navbar):
            include 'Navigation.php'; ?>
        <?php endif ?>
        
        <?php include $subview.'.php'; ?>
        
        <?php if($footer): ?>
            <div class="container">
                <div class="row-fluid text-center">
                    <hr>
                    .RAWIMG Together &copy; <?php echo (new DateTime())->format('Y');  ?>
                </div>
            </div>
        <?php endif; ?>
	<script src="/js/jquery.min.js"></script>
        <?php if($full_bootstrap): ?>
            <script src="/bootstrap/js/bootstrap.min.js"></script>
        <?php endif; ?>
        <script>
            <?= $core->locale->js_function(); ?>
        </script>
        <script src="/js/js.js"></script>
    </body>
</html>