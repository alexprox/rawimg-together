<?php if($pages > 1): ?>
    <div class="row-fluid text-center">
        <div class="pagination">
            <ul>
                <?php for($i=1; $i<=$pages; $i++): ?>
                    <li <?php if($page == $i):?>class="active"<?php endif; ?>><a href="<?=$pages_url.$i?>"><?=$i?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>