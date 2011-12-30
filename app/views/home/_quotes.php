<div class="quotes">
    <? if(!empty($quotes)):?>
    <div class="quoteText">
        <?=$quotes[0]['text'];?>
        <h2><?=$quotes[0]['client'];?></h2>
        <h4><?=$quotes[0]['company'];?></h4>
    </div>
    <div class="quoteIcons">
        <h2><?=$_t['page.quotes.title'];?></h2>
        <ul class="clientsLogos">
            <? $first = true; ?>
            <? foreach($quotes as $q):?>
            <li><a <? if($first){ $first=false; echo 'class="active"'; };?> href="#"><img src="<?= PUBLIC_UPLOAD_PATH . 'quotes' . DS . $q['image_name'];?>" /></a></li>
            <? endforeach;?>
        </ul>
    </div>
    <? endif; ?>
</div>