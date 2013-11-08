<div class="navbar navbar-fixed-top nav-bar">
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
                    <li class="divider-vertical"></li>
                    <li <?php if($url == '/')echo 'class="active"'; ?>>
                        <a href="/"><?= $core->_('home page'); ?></a>
                    </li>
                    <li <?php if($url == '/new')echo 'class="active"'; ?>>
                        <a href="/new"><?= $core->_('new sketch'); ?></a>
                    </li>
                    <li <?php if($url == '/my')echo 'class="active"'; ?>>
                        <a href="/my"><?= $core->_('my sketches'); ?></a>
                    </li>
                    <li class="divider-vertical"></li>
                    <li <?php if($url == '/game')echo 'class="active"'; ?>>
                        <a href="/game"><?= $core->_('game'); ?></a>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li>
                        <a href="/logout"><?= $core->_('logout'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>