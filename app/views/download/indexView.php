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
        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </span>
</div>