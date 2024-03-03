<?php

require_once ROOT.'/models/User.php';
require_once ROOT.'/models/Writer.php';

class WriterController
{
    // INDEX ALL
    public function actionIndex()
    {
        $writers = Writer::getAll();  
        require_once(ROOT . '/views/writers/writers.php');
        return true;
    }
    // ONE 
    public function actionView($id)
    {
        $writer = Writer::getById($id);   
        require_once(ROOT . '/views/writers/writer.php');
        return true;
    }
    // FORM FOR ADD WRITER
    public function actionAdd()
    {  
        User::confirmLoggedIn();

        require_once(ROOT . '/views/writers/writer_add.php');
        return true;
    }
    // STORE WRITER
    public function actionStore()
    {
        User::confirmLoggedIn();

        if(Writer::store(Upload::upload('writers'))){
            
            $_SESSION['message'] = 'Автор добавлен';
            redirect("writers");

        }
        else{
            
            $_SESSION['message'] = 'Автор не добавлен';
            redirect("writers/add");
        }
    }
    // EDIT WRITER
    public function actionEdit($id)
    { 
        User::confirmLoggedIn();

        $writer = Writer::getById($id);
        require_once(ROOT . '/views/writers/writer_edit.php');
        return true;
    }

    public function actionUpdate($id)
    {
        User::confirmLoggedIn();

        $writer = Writer::getById($id);
        $photo = $writer['photo'];
        
        Writer::update($id);
        
        $_SESSION['message'] = 'Информация о Авторе обновлена';
        redirect("writers");            
        
    }

    public function actionDestroy($id)
    {
        User::confirmLoggedIn();

        $writer = Writer::getById($id);
        Writer::deleteByid($id);
        unlink(ROOT . '/public/uploads/img/writers/'.$writer['photo']);
        $_SESSION['message'] = 'Запись удалена';
        redirect("writers");
    }

}
