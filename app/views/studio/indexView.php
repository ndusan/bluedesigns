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
    <h2><?=$_t['page.studio.subtitle'];?></h2>
    <div id="studio">
        <h3><span class="off"><?=$_t['page.view-more.link'];?></span><span class="on"><?=$_t['page.view-less.link'];?></span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #1.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off"><?=$_t['page.view-more.link'];?></span><span class="on"><?=$_t['page.view-less.link'];?></span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off"><?=$_t['page.view-more.link'];?></span><span class="on"><?=$_t['page.view-less.link'];?></span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
          <h3><span class="off"><?=$_t['page.view-more.link'];?></span><span class="on"><?=$_t['page.view-less.link'];?></span>Visual Identity</h3>
        <div>
            <p>This is the answer to question #2.  Pellentesque habitant morbi....</p>
        </div>
    </div>
    <span>fecebook plugin</span>
</div>