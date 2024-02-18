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
    // ACTION STORE WRITER
    public function actionStore()
    {

        if(Writer::store(Upload::upload('writers'))){

            header("Location: http://" . SITE . "/writers/add");
            return true;
        }
        
        

        // $writer = Writer::getById($id);    
        
    }

}
