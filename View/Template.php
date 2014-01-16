<!DOCTYPE html>
<html>
    <head>
        <title>Something</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/css.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'Navigation.php'; ?>
        <div class="container">
            <?php include $subview.'.php'; ?>
            <?php $core->debug->render_vars(); ?>
        </div>
        <div class="container">
            <div class="row-fluid text-center">
                <hr>
                Something &copy; <?php echo (new DateTime())->format('Y');  ?>
            </div>
        </div>
	<script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script>
            <?= $core->locale->js_function(); ?>
        </script>
        <script src="/js/js.js"></script>
    </body>
</html>