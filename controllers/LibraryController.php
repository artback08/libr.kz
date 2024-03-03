<?php
require_once ROOT.'/models/User.php';
require_once ROOT.'/models/Library.php';

class libraryController
{
    // INDEX ALL
    public function actionIndex()
    {
        $libraries = Library::getAll();  
        require_once(ROOT . '/views/libraries/libraries.php');
        return true;
    }
    // READ ONE 
    public function actionView($id)
    {
        $library = Library::getById($id);   
        require_once(ROOT . '/views/libraries/library.php');
        return true;
    }
    // FORM FOR ADD library
    public function actionAdd()
    {   
        User::confirmLoggedIn();

        require_once(ROOT . '/views/libraries/library_add.php');
        return true;
    }
    // STORE library
    public function actionStore()
    {
        User::confirmLoggedIn();

        Library::store(Upload::upload('libraries'));
        $_SESSION['message'] = 'Библиотека добавлена';
        redirect("libraries");
        
    }
    // EDIT library
    public function actionEdit($id)
    { 
        User::confirmLoggedIn();

        $library = Library::getById($id);
        require_once(ROOT . '/views/libraries/library_edit.php');
        return true;
    }

    public function actionUpdate($id)
    {
        User::confirmLoggedIn();

        $library = Library::getById($id);
        
        // $photo = $library['photo'];
        

        if(Library::update($id)){
            redirect("libraries");
            $_SESSION['message'] = 'Информация обновлена';  
        }
        else{
            $_SESSION['message'] = 'Информация не обновлена';
            redirect("libraries/edit/{$id}");
        }
    }

    public function actionDestroy($id)
    {
        User::confirmLoggedIn();

        $library = Library::getById($id);
        Library::deleteByid($id);
        unlink(ROOT . '/public/uploads/img/libraries/'.$library['photo']);

        $_SESSION['message'] = 'Запись удалена';
        redirect("libraries");
    }

}
