<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
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