<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colDownloads">
    <h2><?= $_t['page.download.title']; ?></h2>
    <? if (!empty($wallpaperCollection)): ?>
        <ul class="downloads">
            <? $countWallpaper = 0; ?>
            <? foreach ($wallpaperCollection as $w): ?>
                <li <? if ($countWallpaper++ >= 2): $countWallpaper = 0;
            echo 'class="last"';
        endif; ?>>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'wallpaper' . DS . $w['image_name']; ?>" />
                        <? if (!empty($w['other'])): ?>
                        <span>
                            <? $i = 0; ?>
                            <? foreach ($w['other'] as $o): ?>
                                <a href="<?= PUBLIC_UPLOAD_PATH . 'wallpaper' . DS . $o['image_name']; ?>" target="_blank"><?= $o['group']; ?></a>
                            <?= (count($w['other']) > ++$i ? '|' : ''); ?>
                        <? endforeach; ?>
                        </span>
                <? endif; ?>
                </li>
        <? endforeach; ?>
        </ul>
        <? endif; ?>
    <span>
<?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?>
        <?= $html->twitter(array('url'=>$_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], 'text'=>'Blue Designs'));?>
    </span>
</div>