<!--<div class="navbar navbar-fixed-top">
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
                    
                </ul>
                
            </div>
        </div>
    </div>
</div>-->
<aside class="bg-primary aside-sm" id="nav">
    <section class="vbox">
        <header class="dker nav-bar nav-bar-fixed-top">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"><i class="fa fa-bars"></i></a>
            <a href="#" class="nav-brand" data-toggle="fullscreen">(^_^)</a>
            <?php if ($user->is_granted('ADMIN')): ?>
                <a class="btn btn-link visible-xs" href="/logout">
                    <i class="fa fa-power-off"></i>
                </a>
            <?php endif; ?>
        </header>
        <section class="w-f">
            <nav class="nav-primary hidden-xs">
                <ul class="nav">
                    <li <?php if ($url == '/') echo 'class="active"'; ?>>
                        <a href="/"><i class="fa fa-eye"></i><?= $core->_('home page'); ?></a>
                    </li>
                 </ul>
            </nav>
            <?php if ($user->is_granted('ADMIN')): ?>
                <nav class="nav-primary bg-warning hidden-xs">
                    <ul class="nav">
                        <li <?php if ($url == '/') echo 'class="active"'; ?>>
                            <a href="/"><i class="fa fa-eye"></i>&nbsp;<?= $core->_('admin. panel'); ?></a>
                        </li>
                        <!--
                        <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flask"></i><span>UI kit</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html"><b class="badge pull-right">302</b>Icons</a></li>
                                <li><a href="tasks.html"><i class="fa fa-tasks"></i><span>Tasks</span></a></li>
                            </ul>
                        </li>
                        -->
                     </ul>
                </nav>
            <?php endif; ?>
            <div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm">
                <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a>
                Hi, welcome to todo, you can start here.
            </div>
        </section>
        <?php if ($user->is_granted('ADMIN')): ?>
            <footer class="footer bg-gradient hidden-xs">
                <a href="/logout" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="fa fa-power-off"></i> </a>
                <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="fa fa-bars"></i> </a>
            </footer>
        <?php endif; ?>
    </section>
</aside>