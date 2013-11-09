<div class="container">
    <div class="well">
        <div class="row-fluid">
            <h1><?= $core->_('my sketches'); ?></h1>
        </div>
        <div class="row-fluid">
            <?php if(count($images)): ?>
                <ul class="thumbnails">
                    <?php foreach ($images as $image): ?>
                        <li class="span3">
                            <div class="thumbnail">
                                <img style="width: 300px; height: 200px;" src="/get/<?=$image['ID']?>">
                                <div class="caption">
                                    <p><?=$image['Created']?></p>
                                    <div class="row-fluid">
                                        <a target="_blank" href="/get/<?=$image['ID']?>" class="span6 btn btn-info"><i class="icon-zoom-in"></i></a>
                                        <a href="/edit/" class="span6 btn disabled" disabled><i class="icon-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                :(
            <?php endif; ?>
        </div>
        <div class="row-fluid">
            <a href="/new" class="btn btn-large btn-success"><?=$core->_('new sketch');?></a>
            <a href="/my" class="btn btn-large"><?=$core->_('all my sketches');?></a>
        </div>
    </div>
    <hr>
    <div class="well">
        <div class="row-fluid">
            <h1>Ваши игры</h1>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn" href="#">View details »</a></p>
            </div><div class="span4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn" href="#">View details »</a></p>
            </div>
            <div class="span4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn" href="#">View details »</a></p>
            </div>
        </div>
    </div>
</div>