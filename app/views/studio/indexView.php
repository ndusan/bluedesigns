<script>
    $(document).ready(function() {
        $('#studio h3').each(function() {
            var tis = $(this), state = false, answer = tis.next('div').slideUp();
            tis.click(function() {
                state = !state;
                answer.slideToggle(state);
                tis.toggleClass('active',state);
            });
        });
    });
</script>
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
<div class="contentAll colStudio">
    <h2>What can we do for you?</h2>
    <div id="studio">
        <h3><span class="off">click to view more</span><span class="on">click to view less</span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #1.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off">click to view more</span><span class="on">click to view less</span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off">click to view more</span><span class="on">click to view less</span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off">click to view more</span><span class="on">click to view less</span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
    </div>
    <span>fecebook plugin</span>
</div>