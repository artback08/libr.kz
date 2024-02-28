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
        require_once(ROOT . '/views/libraries/library_add.php');
        return true;
    }
    // STORE library
    public function actionStore()
    {
        if(Library::store(Upload::upload('libraries'))){
            redirect("libraries");
        }
        else{
            redirect("libraries/add");
        }
    }
    // EDIT library
    public function actionEdit($id)
    { 
        $library = Library::getById($id);
        require_once(ROOT . '/views/libraries/library_edit.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $library = Library::getById($id);
        $photo = $library['photo'];
        
        if(Library::update($id)){
            redirect("libraries");            
        }
        else{
            redirect("libraries/edit/{$id}");
        }
    }

    public function actionDestroy($id)
    {
        $library = Library::getById($id);
        Library::deleteByid($id);
        unlink(ROOT . '/public/uploads/img/libraries/'.$library['photo']);
        redirect("libraries");
    }

}
