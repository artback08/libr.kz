<?php

return array(
    // AUTH
    'login' => 'user/login',
    // WRITERS
    'writers/add' => 'writer/add',
    'writers/store' => 'writer/store',
    'writers/([0-9]+)' => 'writer/view/$1',
    'writers' => 'writer/index',
    // MUSEUMS
    'museums' => 'site/museums',
    // Главная страница
    'index' => 'site/index', // actionIndex в SiteController
    '' => 'site', // actionIndex в SiteController
);
