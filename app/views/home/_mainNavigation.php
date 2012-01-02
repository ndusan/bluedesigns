<ul class="mainNav">
    <li><a class="home <?=('home' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang']; ?>"><?=$_t['nav.home.link'];?></a></li>
    <li><a class="studio <?=('studio' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang'] . DS . 'studio'; ?>"><?=$_t['nav.studio.link'];?></a></li>
    <li><a class="work <?=('work' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang'] . DS . 'work'; ?>"><?=$_t['nav.work.link'];?></a></li>
    <li><a class="news <?=('news' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang'] . DS . 'news'; ?>"><?=$_t['nav.news.link'];?></a></li>
    <li><a class="download <?=('download' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang'] . DS . 'download'; ?>"><?=$_t['nav.download.link'];?></a></li>
    <li><a class="contact <?=('contact' == $this->_controller ? 'active':'');?>" href="<?= DS . $params['lang'] . DS . 'contact'; ?>"><?=$_t['nav.contact.link'];?></a></li>
</ul>    

<ul class="lang">
    <li class="first"><a <?= (isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"' : ''); ?> href="<?= DS . 'sr' . DS . implode('/', $params['breadcrumb']); ?>">Srpski</a></li>
    <li><a <?= (isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"' : ''); ?> href="<?= DS . 'en' . DS . implode('/', $params['breadcrumb']); ?>">English</a></li>
</ul>
