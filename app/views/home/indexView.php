
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
    <? if($homeCollection['set'] == 'image' && !empty($homeCollection['image_name'])):?>
    <img src="<?= PUBLIC_UPLOAD_PATH . 'static' . DS . $homeCollection['image_name']; ?>" />
    <? elseif($homeCollection['set'] == 'link' && !empty($homeCollection['link'])):?>
    <?=$homeCollection['link'];?>
    <? endif;?>
</div>
<div class="contentAll colHome">
    <? if(!empty($lattestProjectsCollection)):?>
    <h2><?=$_t['page.latest-projects.title'];?></h2>
    <ul class="latestProjects">
        <? $i=1;?>
        <? foreach($lattestProjectsCollection as $lp):?>
        <li <?=($i++>3?'class="last"':'');?>>
            <a href="<?=$params['lang'].DS.'work'.DS.$lp['id'];?>">
                <? if(!empty($lp['image_name'])):?>
                <img src="<?= PUBLIC_UPLOAD_PATH .'work'.DS. 'thumb-'.$lp['image_name']; ?>" />
                <? endif;?>
                <span><?=$lp['name'];?></span>
            </a>
        </li>
        <? endforeach; ?>
    </ul>
    <? endif;?>
    <span>
    <?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?>
    <?= $html->twitter(array('url'=>$_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], 'text'=>'Blue Designs'));?>
    </span>
</div>



