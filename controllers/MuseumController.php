<?php
require_once ROOT.'/models/User.php';
require_once ROOT.'/models/Museum.php';

class museumController
{
    // INDEX ALL
    public function actionIndex()
    {
        $museums = Museum::getAll();  
        require_once(ROOT . '/views/museums/museums.php');
        return true;
    }
    // READ ONE 
    public function actionView($id)
    {
        $museum = Museum::getById($id);   
        require_once(ROOT . '/views/museums/museum.php');
        return true;
    }
    // FORM FOR ADD museum
    public function actionAdd()
    {   
        User::confirmLoggedIn();

        require_once(ROOT . '/views/museums/museum_add.php');
        return true;
    }
    // STORE museum
    public function actionStore()
    {
        User::confirmLoggedIn();

        Museum::store(Upload::upload('museums'));
        $_SESSION['message'] = 'Информация добавлена';
        redirect("museums");
        
    }
    // EDIT museum
    public function actionEdit($id)
    { 
        User::confirmLoggedIn();

        $museum = Museum::getById($id);
        require_once(ROOT . '/views/museums/museum_edit.php');
        return true;
    }

    public function actionUpdate($id)
    {
        User::confirmLoggedIn();

        $museum = Museum::getById($id);
        
        // $photo = $museum['photo'];
        

        if(Museum::update($id)){
            redirect("museums");
            $_SESSION['message'] = 'Информация обновлена';  
        }
        else{
            $_SESSION['message'] = 'Информация не обновлена';
            redirect("museums/edit/{$id}");
        }
    }

    public function actionDestroy($id)
    {
        User::confirmLoggedIn();

        $museum = Museum::getById($id);
        Museum::deleteByid($id);
        unlink(ROOT . '/public/uploads/img/museums/'.$museum['photo']);

        $_SESSION['message'] = 'Запись удалена';
        redirect("museums");
    }

}
