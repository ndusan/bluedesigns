
<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="homeContent">
    <div class="homeText">
        <h1><?=@$homeCollection['tite'];?></h1>
        <?=@$homeCollection['text'];?>
    </div>
    <? if(!empty($homeCollection['image_name'])):?>
    <img src="<?= PUBLIC_UPLOAD_PATH . 'static' . DS . $homeCollection['image_name']; ?>" />
    <? endif;?>
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



