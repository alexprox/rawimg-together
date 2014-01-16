<div class="modal in show" aria-hidden="false" >
    <div class="modal-over">
        <div class="modal-center animated flipInX" style="width:300px;margin:-30px 0 0 -150px;">
            <div class="clear">
                <p class="text-white"><?= $core->_('please sign in'); ?></p>
                <form action="" method="POST">
                    <input id="login" name="login" type="text" class="form-control text-sm" placeholder="<?= $core->_('login'); ?>">
                    <br>
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="form-control text-sm"  placeholder="<?= $core->_('password'); ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit" data-dismiss="modal">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </span>
                    </div>
                    <?php if ($error): ?>
                        <br>
                        <div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm">
                            <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a>
                            <?= $core->_($error); ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
