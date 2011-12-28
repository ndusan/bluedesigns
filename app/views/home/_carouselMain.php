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