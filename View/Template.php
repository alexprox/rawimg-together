<!DOCTYPE html>
<html>
    <head>
        <title>.RAWIMG Together</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="utf8">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/css.css" rel="stylesheet">
    </head>
    <body>
        <?php if($url != '/login') include 'Navigation.php'; ?>
        <div class="container">
            <div class="row-fluid">
                <?php include $subview.'.php'; ?>
            </div>
            <div class="row-fluid text-center">
                <hr>
                .RAWIMG Together &copy; <?php echo (new DateTime())->format('Y');  ?>
            </div>
        </div>
        
        <script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script>
            <?= $core->locale->js_function(); ?>
        </script>
    </body>
</html>