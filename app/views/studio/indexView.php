<script>
    $(function() {
        $( "#studio" ).accordion();
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
    <h2>About Blue Designs</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>
    <p>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
    </p>    
    <h2><?= $_t['page.studio.subtitle']; ?></h2>
    <div id="studio">
        <h3><span class="off"><?= $_t['page.view-more.link']; ?></span><span class="on"><?= $_t['page.view-less.link']; ?></span>Visual Identity</h3>
        <div>
            <span class="img">
                <img src="<?= IMAGE_PATH . 'dummy5.jpg'; ?>" />
            </span>
            <span class="txt">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <p>
                    <a href="#">view our work</a>
                </p>
            </span>
        </div>
        <h3><span class="off"><?= $_t['page.view-more.link']; ?></span><span class="on"><?= $_t['page.view-less.link']; ?></span>Visual Identity</h3>
        <div>
            <span class="img">
                <img src="<?= IMAGE_PATH . 'dummy5.jpg'; ?>" />
            </span>
            <span class="txt">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <p>
                    <a href="#">view our work</a>
                </p>
            </span>
        </div>
        <h3><span class="off"><?= $_t['page.view-more.link']; ?></span><span class="on"><?= $_t['page.view-less.link']; ?></span>Visual Identity</h3>
        <<div>
            <span class="img">
                <img src="<?= IMAGE_PATH . 'dummy5.jpg'; ?>" />
            </span>
            <span class="txt">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <p>
                    <a href="#">view our work</a>
                </p>
            </span>
        </div>
        <h3><span class="off"><?= $_t['page.view-more.link']; ?></span><span class="on"><?= $_t['page.view-less.link']; ?></span>Visual Identity</h3>
        <div>
            <span class="img">
                <img src="<?= IMAGE_PATH . 'dummy5.jpg'; ?>" />
            </span>
            <span class="txt">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <p>
                    <a href="#">view our work</a>
                </p>
            </span>
        </div>
    </div>
    <span>fecebook plugin</span>
</div>