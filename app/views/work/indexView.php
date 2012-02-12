<div class="contentAll colWork">
    <div class="workSidebar">
        <h2><?= $_t['page.clients.title']; ?></h2> 
        <? if (!empty($workCollection)): ?>
            <ul class="clientsList">
                <? foreach ($workCollection as $w): ?>
                    <li><a <?= ($w['id'] == $cWork['id'] ? 'class="active"' : ''); ?> href="<?= DS . $params['lang'] . DS . 'work?id=' . $w['id']; ?>"><?= $w['name']; ?></a></li>
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
        <span>
            <?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?>
            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </span>
    </div>
</div>