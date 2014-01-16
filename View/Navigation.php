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
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Admin
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/news"><?= $core->_('news'); ?></a></li>
                                <li><a href="/logout"><?= $core->_('logout'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>