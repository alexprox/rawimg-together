<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">
                .RAWI<span class="red">M</span>G
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li <?php if($url == '/')echo 'class="active"'; ?>>
                        <a href="/"><?= $core->_('home page'); ?></a>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="active">
                        <a href="/logout"><?= $core->_('logout'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>