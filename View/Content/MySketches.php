<div class="container">
    <div class="well">
        <div class="row-fluid">
            <h1 class="pull-left"><?= $core->_('my sketches'); ?></h1>
            <a href="/new" class="btn btn-large btn-success pull-right"><?=$core->_('new sketch');?></a>
        </div>
        <div class="row-fluid">
            <?php if(count($images)): ?>
                <ul class="thumbnails">
                    <?php foreach ($images as $k => $image): ?>
                        <?php if($k%4==0): ?>
                                </ul>
                            </div>
                            <div class="row-fluid">
                                <ul class="thumbnails">
                        <?php endif; ?>
                        <?php include '/../Each/Sketch.php'; ?>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                :(
            <?php endif; ?>
        </div>
        <?php include '/../Pagination.php'; ?>
    </div>
</div>