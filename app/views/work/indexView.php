<div class="contentAll colWork">
    <div class="workSidebar">
        <h2><?= $_t['page.clients.title']; ?></h2> 
        <? if (!empty($workCollection)): ?>
            <ul class="clientsList">
                <? foreach ($workCollection as $w): ?>
                    <li><a <?= ($w['id'] == $cWork['id'] ? 'class="active"' : ''); ?> href="<?= DS . $params['lang'] . DS . 'work'.DS . $w['id']; ?>"><?= $w['name']; ?></a></li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
    <div class="workContent">
        <div class="workBanner">
            <div id="slides">
                <div class="slides_container">
                    <? foreach ($cWork['other'] as $cc): ?>
                        <div class="slide">
                            <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'work' . DS . $cc['image_name']; ?>" />
                            <div class="desc">
                                <p><?= $cc['text']; ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>

        <h3>
            <? if (!empty($cWork['link'])): ?>
                <span class="fr">
                    <a href="<?= 'http://' . rtrim($cWork['link'], 'http://'); ?>" target="_blank">Visit web site</a>
                </span>
            <? endif; ?>
            <?= $cWork['name']; ?>
        </h3>

        <p><?= $cWork['description']; ?></p>
        <span >
            <?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?>
            <?= $html->twitter(array('url'=>$_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], 'text'=>'Blue Designs'));?>
        </span>
    </div>
</div>