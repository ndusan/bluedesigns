
<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="homeContent">
    <div class="homeText">
        <h1><?=@$homeCollection['title'];?></h1>
        <?=@$homeCollection['text'];?>
    </div>
    <? if(!empty($homeCollection['image_name'])):?>
    <img src="<?= PUBLIC_UPLOAD_PATH . 'static' . DS . $homeCollection['image_name']; ?>" />
    <? endif;?>
</div>
<div class="contentAll colHome">
    <? if(!empty($lattestProjectsCollection)):?>
    <h2><?=$_t['page.latest-projects.title'];?></h2>
    <ul class="latestProjects">
        <? foreach($lattestProjectsCollection as $lp):?>
        <li>
            <a href="<?='http://'.rtrim('http://', $lp['link']);?>">
                <? if(!empty($lp['image_name'])):?>
                <img src="<?= PUBLIC_UPLOAD_PATH .'work'.DS. $lp['image_name']; ?>" />
                <? endif;?>
                <span><?=$lp['name'];?></span>
            </a>
        </li>
        <? endforeach; ?>
    </ul>
    <? endif;?>
    <span>fecebook plugin</span>
</div>



