
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
    <ul class="downloads">
        <li>
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
        <li class="last">
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
        <li>
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
        <li class="last">
            <img src="<?= IMAGE_PATH . 'dummy3.jpg'; ?>" />
            <span><a href="#">800x600</a> | <a href="#">800x600</a> | <a href="#">800x600</a></span>
        </li>
    </ul>
    <span>fecebook plugin</span>
</div>