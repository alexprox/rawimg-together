<div class="row-fluid"></div>
<div class="row-fluid text-center">
    <img src="/img/logo.png">
</div>
<div class="row-fluid">
    <div class="span4"></div>
    <div class="span4 well">
        <form action="" method="POST">
            <h2><?= $core->_('please sign in'); ?></h2>
            <input id="login" name="login" type="text" class="input-block-level" placeholder="<?= $core->_('login'); ?>">
            <input id="password" name="password" type="password" class="input-block-level" placeholder="<?= $core->_('password'); ?>">
            <?php if($error): ?>
                <div class="alert alert-error"><?= $core->_($error);?></div>
            <?php endif; ?>
            <button class="btn btn-large btn-block btn-primary" type="submit"><?= $core->_('sign in'); ?></button>
        </form>
    </div>
    <div class="span4"></div>
</div>