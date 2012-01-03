<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colStudio">
    
    
    <h2><?=$studio['title'];?></h2>
    
    <?=$studio['text'];?>
    <h2><?= $_t['page.studio.subtitle']; ?></h2>
    
    <? if (!empty($studioCollection)): ?>
        <div id="studio">
            <? foreach ($studioCollection as $s): ?>
                <h3>
                    <span class="off">
                        <?= $_t['page.view-more.link']; ?>
                    </span>
                    <span class="on"><?= $_t['page.view-less.link']; ?>
                    </span><?= $s['title']; ?>
                </h3>
                <div>
                    <? if (!empty($s['image_name'])): ?>
                        <span class="img"><img src="<?= PUBLIC_UPLOAD_PATH . 'studio' . DS . $s['image_name']; ?>" /></span>   
                    <? endif; ?>
                    <span class="txt">
                        <p><?= $s['text']; ?></p>
                    </span>
                </div>
            <? endforeach; ?>
        </div>
    <? endif; ?>
    <span><?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?></span>
</div>