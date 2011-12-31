<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <div id="slides">
            <div class="slides_container">
                <? foreach ($carouselCollection as $cc): ?>
                    <div class="slide">
                        <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                        <div class="desc">
                            <? if (!empty($cc['link'])): ?>
                                <!-- Link -->
                                <a href="http://<?= rtrim($cc['link'], 'http://'); ?>" target="_blank">link</a>
                            <? endif; ?>
                            <p><?= $cc['text']; ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    <? endif; ?>
</div>
<div class="contentAll colDownloads">
    <h2><?=$_t['page.download.title'];?></h2>
    <? if(!empty($wallpaperCollection)):?>
    <ul class="downloads">
        <? foreach($wallpaperCollection as $w):?>
        <li>
            <img src="<?= PUBLIC_UPLOAD_PATH . 'wallpaper' .DS. $w['image_name']; ?>" />
            <? if(!empty($w['other'])):?>
            <span>
                <? $i = 0;?>
                <? foreach($w['other'] as $o):?>
                <a href="<?= PUBLIC_UPLOAD_PATH . 'wallpaper' .DS. $o['image_name']; ?>" target="_blank"><?=$o['group'];?></a>
                <?=(count($w['other'])>++$i ? '|' : '');?>
                <? endforeach;?>
            </span>
            <? endif; ?>
        </li>
        <? endforeach;?>
    </ul>
    <? endif; ?>
    <span>fecebook plugin</span>
</div>