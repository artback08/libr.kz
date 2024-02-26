<?php

require_once ROOT.'/models/Writer.php';

class WriterController
{
    // INDEX ALL
    public function actionIndex()
    {
        $writers = Writer::getAll();  
        require_once(ROOT . '/views/site/writers.php');
        return true;
    }
    // READ ONE 
    public function actionView($id)
    {
        $writer = Writer::getById($id);   
        require_once(ROOT . '/views/site/writer.php');
        return true;
    }
    // FORM FOR ADD WRITER
    public function actionAdd()
    {  
        require_once(ROOT . '/views/admin/writer_add.php');
        return true;
    }
    // STORE WRITER
    public function actionStore()
    {
        if(Writer::store(Upload::upload('writers'))){
            redirect("writers");
        }
        else{
            redirect("writers/add");
        }
    }
    // EDIT WRITER
    public function actionEdit($id)
    { 
        $writer = Writer::getById($id);
        require_once(ROOT . '/views/admin/writer_edit.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $writer = Writer::getById($id);
        $photo = $writer['photo'];
        
        if(Writer::update($id)){
            redirect("writers");            
        }
        else{
            redirect("writers/edit/{$id}");
        }
    }

    public function actionDestroy($id)
    {
        $writer = Writer::getById($id);
        Writer::deleteByid($id);
        unlink(ROOT . '/public/uploads/img/writers/'.$writer['photo']);
        redirect("writers");
    }

}
