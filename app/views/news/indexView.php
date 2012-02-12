<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colNews">
    <h2><?= $_t['page.news.title']; ?></h2> 
    <? if (!empty($resultCollection)): ?>
        <ul class="news">
            <? $i = 1; ?>
            <? foreach ($resultCollection as $r): ?>
                <li <?= ($i++ > 2 ? 'class="last"' : ''); ?>>
                    <? if($r['set'] == 'image' && !empty($r['image_name'])):?>
                        <div class="newsImg">
                            <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . $r['image_name']; ?>" />
                        </div>
                    <? elseif($r['set'] == 'link' && !empty($r['link'])):?>
                        <?=$r['link'];?>
                    <? endif; ?>
                    <div class="newsText">
                        <h4><?= $r['title']; ?></h4>
                        <?= $r['text']; ?>
                        <?
                        $array = explode(' ', $r['created']);
                        $array = explode('-', $array[0]);
                        ?>
                        <div class="newsDate">
                            <span><?= $array[2]; ?></span>
                            <?= date('M', mktime(0, 0, 0, $array[1] + 1, 0, 0)); ?>
                        </div>
                    </div>
                    <span><?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?></span>
                </li>
            <? endforeach; ?>
        </ul>

        <!-- pagination START -->
        <div class="pagin">
            <? if (!empty($pagination['current']) && $pagination['current'] > 1): ?>
                <!-- First -->
                <a class="first" href="<?= DS . $params['lang'] . DS . 'news?page=1'; ?>">First</a>
                <!-- Previous -->
                <a href="<?= DS . $params['lang'] . DS . 'news?page=' . ($pagination['current'] - 1); ?>"><</a>
            <? endif; ?>

            <? for ($x = ($pagination['current'] - $pagination['range']); $x < (($pagination['current'] + $pagination['range']) + 1); $x++): ?>
                <? if (($x > 0) && ($x <= $pagination['total'])): ?>
                    <? if ($x == $pagination['current']): ?>
                        <b><?= $x; ?></b>
                    <? else: ?>
                        <a href="<?= DS . $params['lang'] . DS . 'news?page=' . $x; ?>"><?= $x; ?></a>
                    <? endif; ?>
                <? endif; ?>
            <? endfor; ?>

            <? if (!empty($pagination['total']) && !empty($pagination['current']) && $pagination['current'] != $pagination['total']): ?>
                <!-- Next -->
                <a href="<?= DS . $params['lang'] . DS . 'news?page=' . ($pagination['current'] + 1); ?>">></a>
                <!-- Last -->
                <a class="last" href="<?= DS . $params['lang'] . DS . 'news?page=' . $pagination['total']; ?>">Last</a>
            <? endif; ?>

            <!-- pagination END -->
        <? endif; ?>
    </div>
</div>