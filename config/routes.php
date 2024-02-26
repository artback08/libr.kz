<?php

return array(
    // AUTH
    'login' => 'user/login',
    'admin' => 'auth/index',
    
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
    'museums' => 'site/museums',
    // Главная страница
    'index' => 'site/index', // actionIndex в SiteController
    '' => 'site', // actionIndex в SiteController
);
