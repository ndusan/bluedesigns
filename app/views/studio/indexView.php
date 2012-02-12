<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colStudio">


    <h2><?= $studio['title']; ?></h2>

    <?= $studio['text']; ?>
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
                        <?= $s['text']; ?>
                    </span>
                </div>
            <? endforeach; ?>
        </div>
    <? endif; ?>
    <span>
        <?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?>
        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </span>
</div>