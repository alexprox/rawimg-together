<!DOCTYPE html>
<html>
    <head>
        <title>Something</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bootstrap/css/font-awesome.min.css">
        <link href="/css/css.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="js/ie/respond.min.js" cache="false"></script>
            <script src="js/ie/html5.js" cache="false"></script>
            <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
    </head>
    <body>
        <section class="hbox stretch">
            <?php if(!$_hide_navbar)include 'Elements\Navigation.php'; ?>
            <section id="content">
                <section class="vbox">
                    <?php include $subview.'.php'; ?>
                    <?php $core->debug->render_vars(); ?>
                </section>
                <?php if(!$_hide_footer)include 'Elements\Footer.php'?>
            </section>
        </section>
	<script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script>
            <?= $core->locale->js_function(); ?>
        </script>
        <script src="/js/js.js"></script>
    </body>
</html>