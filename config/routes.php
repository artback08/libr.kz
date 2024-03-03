<?php

return array(
    // AUTH
    'login' => 'user/login',
    'logout' => 'user/logout',
    
    // WRITERS
    'writers/add' => 'writer/add',
    'writers/store' => 'writer/store',
    'writers/edit/([0-9]+)' => 'writer/edit/$1',
    'writers/update/([0-9]+)' => 'writer/update/$1',
    'writers/destroy/([0-9]+)' => 'writer/destroy/$1',
    'writers/([0-9]+)' => 'writer/view/$1',
    'writers' => 'writer/index',

    // libraries
    'libraries/add' => 'library/add',
    'libraries/store' => 'library/store',
    'libraries/edit/([0-9]+)' => 'library/edit/$1',
    'libraries/update/([0-9]+)' => 'library/update/$1',
    'libraries/destroy/([0-9]+)' => 'library/destroy/$1',
    'libraries/([0-9]+)' => 'library/view/$1',
    'libraries' => 'library/index',

    // MUSEUMS
    'museums/add' => 'museum/add',
    'museums/store' => 'museum/store',
    'museums/edit/([0-9]+)' => 'museum/edit/$1',
    'museums/update/([0-9]+)' => 'museum/update/$1',
    'museums/destroy/([0-9]+)' => 'museum/destroy/$1',
    'museums/([0-9]+)' => 'museum/view/$1',
    'museums' => 'museum/index',

    // GOOGLE TESTS
    'tests' => 'site/test',
    
    // Главная страница
    'index' => 'site/index', // actionIndex в SiteController
    '' => 'site', // actionIndex в SiteController
);
