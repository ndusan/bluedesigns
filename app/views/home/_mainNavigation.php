<ul class="mainNav">
    <li><a class="home" href="<?= DS . $params['lang']; ?>">Home</a></li>
    <li><a class="studio" href="<?= DS . $params['lang'] . DS . 'studio'; ?>">Studio</a></li>
    <li><a class="work" ref="<?= DS . $params['lang'] . DS . 'work'; ?>">Our Work</a></li>
    <li><a class="news" href="<?= DS . $params['lang'] . DS . 'news'; ?>">News</a></li>
    <li><a class="download" href="<?= DS . $params['lang'] . DS . 'download'; ?>">Download</a></li>
    <li><a class="contact" href="<?= DS . $params['lang'] . DS . 'contact'; ?>">Contact</a></li>
</ul>    

<ul class="lang">
    <li class="first"><a <?= (isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"' : ''); ?> href="<?= DS . 'sr' . DS . implode('/', $params['breadcrumb']); ?>">Srpski</a></li>
    <li><a <?= (isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"' : ''); ?> href="<?= DS . 'en' . DS . implode('/', $params['breadcrumb']); ?>">English</a></li>
</ul>
