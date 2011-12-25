<?=$_t['main.magazine.link'];?>


<ul>
    <li><a href="<?=DS.$params['lang'];?>">Home</a></li>
    <li><a href="<?=DS.$params['lang'].DS.'work';?>">Work</a></li>
    <li><a href="<?=DS.$params['lang'].DS.'studio';?>">Studio</a></li>
    <li><a href="<?=DS.$params['lang'].DS.'contact';?>">Contact</a></li>
    <li><a href="<?=DS.$params['lang'].DS.'news';?>">News</a></li>
    <li><a href="<?=DS.$params['lang'].DS.'download';?>">Download</a></li>
    
    <ul class="lang">
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"':'');?> href="<?=DS.'sr'.DS.implode('/', $params['breadcrumb']);?>">SR</a></li>
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"':'');?> href="<?=DS.'en'.DS.implode('/', $params['breadcrumb']);?>">EN</a></li>
    </ul>
</ul>