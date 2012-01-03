<div class="contentAll colWork">
    <div class="workSidebar">
        <h2><?= $_t['page.clients.title']; ?></h2> 
        <? if (!empty($workCollection)): ?>
            <ul class="clientsList">
                <? foreach ($workCollection as $w): ?>
                    <li><a <?= ($w['id'] == $cWork['id'] ? 'class="active"' : ''); ?> href="<?= DS . $params['lang'] . DS . 'work?id=' . $w['id']; ?>"><?= $w['name']; ?></a></li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
    <div class="workContent">
        <div class="workBanner">
            <div id="slides">
                <div class="slides_container">
                    <? foreach ($cWork['other'] as $cc): ?>
                        <div class="slide">
                            <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'work' . DS . $cc['image_name']; ?>" />
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
        <h3><?= $cWork['name']; ?></h3>
        <p><?= $cWork['description']; ?></p>
        <a href="<?= $cWork['link']; ?>" table="_blank"><?= $cWork['link']; ?></a>
    </div>
</div>