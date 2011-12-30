<div class="contentAll colNews">
    <h2><?=$_t['page.news.title'];?></h2> 
    <? if(!empty($resultCollection)):?>
    <ul class="news">
        <? foreach($resultCollection as $r):?>
        <li>
            <? if($r['image_name']):?>
            <div class="newsImg">
                <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . $r['image_name']; ?>" />
            </div>
            <? endif;?>
            <div class="newsText">
                <h4><?=$r['title'];?></h4>
                <?=$r['text'];?>
                <div class="newsDate">
                    <span>06</span>
                    AUG
                </div>
            </div>
        </li>
        <? endforeach; ?>
    </ul>
    
    <!-- pagination START -->
    
    <? if(!empty($pagination['current']) && $pagination['current'] > 1):?>
    <!-- First -->
    <a href="<?=DS.$params['lang'].DS.'news?page=1';?>"><<</a>
    <!-- Previous -->
    <a href="<?=DS.$params['lang'].DS.'news?page='.($pagination['current']-1);?>"><</a>
    <? endif;?>
    
    <? for($x = ($pagination['current'] - $pagination['range']); $x < (($pagination['current'] + $pagination['range']) + 1); $x++):?>
        <? if (($x > 0) && ($x <= $pagination['total'])): ?>
            <? if ($x == $pagination['current']): ?>
                 <b><?=$x;?></b>
            <? else:?>
                 <a href="<?=DS.$params['lang'].DS.'news?page='.$pagination['current'];?>"><?=$x;?></a>
            <? endif; ?>
        <? endif; ?>
    <? endfor; ?>
    
    <? if(!empty($pagination['total']) && !empty($pagination['current']) && $pagination['current']!=$pagination['total']):?>
    <!-- Next -->
    <a href="<?=DS.$params['lang'].DS.'news?page='.($pagination['current']+1);?>">></a>
    <!-- Last -->
    <a href="<?=DS.$params['lang'].DS.'news?page='.$pagination['total'];?>">>></a>
    <? endif; ?>
    
    <!-- pagination END -->
    <? endif; ?>
</div>