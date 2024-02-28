<?php
require_once ROOT.'/models/User.php';

class SiteController
{

    public function action()
    {
        require_once(ROOT . '/views/index.php');
        return true;
    }

}
