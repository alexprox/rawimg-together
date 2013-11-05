<!DOCTYPE html>
<html>
    <head>
        <title>PANcell</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="utf8">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/css.css" rel="stylesheet">
    </head>
    <body>
        <?php if(App\Core::url() != '/login') include 'Navigation.php'; ?>
        <?php echo $url; ?>
        <div class="container">
            <div class="row-fluid">
                <?php include $subview.'.php'; ?>
            </div>
            <div class="row-fluid text-center">
                <hr>
                PANcell &copy; <?php echo (new DateTime())->format('Y');  ?>
            </div>
        </div>
        
        <script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>