<?php
$routes = array(
    //Home page
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/?$/', 
            'controller' => 'home', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //Contact page
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/contact\/?$/', 
            'controller' => 'contact', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/download\/?$/', 
            'controller' => 'download', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/news\/?$/', 
            'controller' => 'news', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/work\/?$/', 
            'controller' => 'work', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/studio\/?$/', 
            'controller' => 'studio', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //404
    array(  'url'        => '/^404\/?$/', 
            'controller' => 'home', 
            'action'     => 'noPageFound', 
            'layout'     => '404'
    ),
    //Login page
    array(  'url'        => '/^login\/?$/', 
            'controller' => 'login', 
            'action'     => 'index', 
            'layout'     => 'login'
    ),
    //Logout page
    array(  'url'        => '/^logout\/?$/', 
            'controller' => 'login', 
            'action'     => 'logout', 
            'layout'     => 'empty'
    ),
    
    //CMS page
    array(  'url'        => '/^cms\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/settings\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'settings', 
            'layout'     => 'cms'
    ),
    
    //CMS dictionary page
    array(  'url'        => '/^cms\/dictionary\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/add\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS user page
    array(  'url'        => '/^cms\/users\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/add\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS work page
    array(  'url'        => '/^cms\/work\/?$/', 
            'controller' => 'cmsWork', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/work\/add\/?$/', 
            'controller' => 'cmsWork', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/work\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsWork', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/work\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsWork', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS wallpaper page
    array(  'url'        => '/^cms\/wallpaper\/?$/', 
            'controller' => 'cmsWallpaper', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/wallpaper\/add\/?$/', 
            'controller' => 'cmsWallpaper', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/wallpaper\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsWallpaper', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS news page
    array(  'url'        => '/^cms\/news\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/add\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/news\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
);