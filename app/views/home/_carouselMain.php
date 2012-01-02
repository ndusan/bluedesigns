<div id="slides">
    <div class="slides_container">
        <? foreach ($carouselCollection as $cc): ?>
            <div class="slide">
                <? if (!empty($cc['link'])): ?>
                <a href="http://<?= rtrim($cc['link'], 'http://'); ?>" target="_blank">
                    <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                </a>
                <? else:?>
                    <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                <? endif; ?>
                <div class="desc">
                    <?= $cc['text']; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>