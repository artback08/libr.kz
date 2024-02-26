<?php

require_once ROOT.'/models/Auth.php';

class AuthController
{
    // INDEX ALL
    public function actionIndex()
    {
        
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
   

}
