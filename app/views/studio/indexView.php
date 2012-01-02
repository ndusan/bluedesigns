<<<<<<< HEAD
<script>
    $(function() {
        $( "#studio" ).accordion();
    });
</script>
=======
>>>>>>> d65e9af3e87db7c92b934470e5ba96f98c2ffdc2
<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colStudio">
<<<<<<< HEAD
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
=======
    <h2><?=$_t['page.studio.subtitle'];?></h2>
    <? if(!empty($studioCollection)):?>
    <div id="studio">
        <? foreach($studioCollection as $s):?>
        <h3>
            <span class="off">
                <?=$_t['page.view-more.link'];?>
            </span>
            <span class="on"><?=$_t['page.view-less.link'];?>
            </span><?=$s['title'];?>
        </h3>
        <? if(!empty($s['image_name'])):?>
        <img src="<?=PUBLIC_UPLOAD_PATH . 'studio' . DS . $s['image_name']; ?>" />
        <? endif; ?>
        <div>
            <?=$s['text'];?>
>>>>>>> d65e9af3e87db7c92b934470e5ba96f98c2ffdc2
        </div>
        <? endforeach;?>
    </div>
    <? endif;?>
    <span>fecebook plugin</span>
</div>