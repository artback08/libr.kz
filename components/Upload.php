<?php 
    class Upload
    {

        public static function upload($dir)
        {
            if ($_FILES['photo'] !== null && $_FILES["photo"]["error"] == UPLOAD_ERR_OK){
             
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

                // загружаем файл и проверяем
                // если во премя загрузки файла произошла ошибка, возвращаем die()
                if (!move_uploaded_file($image["tmp_name"], ROOT 
                . '/public/uploads/img/' . $dir . '/' . $fileName)) {
                    die('Error upload file');
                }
                return $fileName;
            }
        }
}
    