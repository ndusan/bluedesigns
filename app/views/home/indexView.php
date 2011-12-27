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
<div class="homeContent">
    <div class="homeText">
        <h1>
            Welcome<br/>
            to the fresh<br/>
            way of thinking
        </h1>
        <p>
            Stand out from the crowd. Be unique! We are devoted to designing eye-catching, innovative presentations, because...it’s all about presentation!
        </p>
        <p>
            Blue Designs specializes in providing unique web and graphic solutions that will set your company apart from the competition.
        </p>
        <p>
            We’ve got the vision, we’ve got the talent. Let us prove it to you!
        </p>
    </div>
    <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
</div>
<div class="contentAll colHome">
    <h2>Latest Projects</h2>
    <ul class="latestProjects">
        <li>
            <a href="#"><img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                <span>Naziv klijenta</span>
            </a>
        </li>
        <li>
            <a href="#"><img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                <span>Naziv klijenta</span>
            </a>
        </li>
        <li>
            <a href="#"><img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                <span>Naziv klijenta</span>
            </a>
        </li>
        <li class="last">
            <a href="#"><img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                <span>Naziv klijenta</span>
            </a>
        </li>
    </ul>
    <span>fecebook plugin</span>
</div>


