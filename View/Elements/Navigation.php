<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">
                (^_^)
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li <?php if($url == '/')echo 'class="active"'; ?>>
                        <a href="/"><?= $core->_('home page'); ?></a>
                    </li>
                </ul>
                <?php if ($user->is_granted('ADMIN')): ?>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><?= $core->_('admin. panel'); ?>&nbsp;<span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout"><?= $core->_('logout'); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>