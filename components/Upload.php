<?php 
    class Upload
    {

        public static function upload($dir)
        {
            $image = '';

            if (isset($_FILES['photo']) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK){

                $image = $_FILES['photo'];

                // VALIDATION
                
                // ищем в массиве с типами тип текущего файла
                $types = ["image/jpeg", "image/png"];
                if (!in_array($image["type"], $types)) {
                    die('Incorrect file type');
                }
                
                // определяем размер файла в мегабайтах
                $fileSize = $image["size"] / 1000000;
                // максимальный размер файла в мегабайтах
                $maxSize = 5;

                // создаем папку uploads в корне проекта, если её нет
                if (!is_dir(ROOT . '/public/uploads/img/'.$dir)) {
                    $directory = mkdir(ROOT . '/public/uploads/img/'.$dir, 0777, true);
                }

                // изнаем расширение текущего файла
                $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
                // формируем уникальное имя с помощью функции time()
                $fileName = time() . ".$extension";
                
                // загружаем файл
                move_uploaded_file($image["tmp_name"], ROOT.'/public/uploads/img/'.$dir.'/'.$fileName);
                // die('Error upload file');
                return $fileName;
            }
        }
        
        public static function delete($dir, $fileName)
        {
            if(isset ($_POST['update'])){
                if($fileName !== 'writer.jpg' && $fileName !== 'library.jpg' && $fileName !== 'museum.jpg'){

                    if(Upload::upload($dir)){
                        unlink(ROOT . '/public/uploads/img/' . $dir . '/' . $fileName);
                    }
                }
            }
        }
}
    