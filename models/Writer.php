<?php
require_once ROOT.'/components/Db.php';
require_once ROOT.'/components/Upload.php';

class Writer
{

    // READ ALL
    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, biography, years, photo, created_at FROM writers ORDER BY id');

        // Получение и возврат результатов
        $i = 0;
        $writersList = array();
        while ($row = $result->fetch()) {
            $writersList[$i]['id'] = $row['id'];
            $writersList[$i]['name'] = $row['name'];
            $writersList[$i]['biography'] = $row['biography'];
            $writersList[$i]['photo'] = $row['photo'];
            $writersList[$i]['years'] = $row['years'];
            $writersList[$i]['created_at'] = $row['created_at'];
            $i++;
        }
        return $writersList;
    }

    // READ ONE
    public static function getById($id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT * FROM writers WHERE id = :id LIMIT 1");   
        $result->bindValue(':id', $id, \PDO::PARAM_INT);
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    // CREATE
    public static function store($file)
    {
        $name = '';
        $biography = '';
        $years = '';
        $photo = '';
        $is_published = '';

        $name = $_POST['name'];
        $biography = $_POST['biography'];
        $years = $_POST['years'];
        $is_published = $_POST['is_published'];

        // ЕСЛИ ИЗОБРАЖЕНИЕ НЕ ДОБАВЛЕНО В ФОРМУ, ТО БУДЕТ ОТОБРАЖАТЬСЯ 'writer.jpg'
        $photo = $file !== null ? $file : "writer.jpg";
        
        
        $db = Db::getConnection();
        $sql = 'INSERT INTO writers '
                . '(name, biography, years, photo, is_published)'
                . 'VALUES '
                . '(:name, :biography, :years, :photo, :is_published)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $result->bindParam(':biography', $_POST['biography'], PDO::PARAM_STR);
        $result->bindParam(':photo', $photo, PDO::PARAM_STR);
        $result->bindParam(':years', $_POST['years'], PDO::PARAM_INT);
        $result->bindParam(':is_published', $_POST['is_published'], PDO::PARAM_INT);
        
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    // UPDATE
    public static function update($id)
    {
        $name = '';
        $biography = '';
        $years = '';
        $photo = '';
        $is_published = '';

        $writer = Writer::getById($id);
        
        // изображение из БД
        $photo = $writer['photo'];

        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $biography = $_POST['biography'];
            $years = $_POST['years'];
            $is_published = $_POST['is_published'];

            $updated_at = date('Y-m-d H:i:s');

            if($newPhoto = Upload::upload('writers')){
                // удаление старого изображения с диска
                Upload::delete('writers', $photo);
                // название нового сохраненного изображения
                $photo = $newPhoto;
            };
            
            $db = Db::getConnection();
            $sql = 'UPDATE writers SET
                    name = :name,
                    biography = :biography,
                    years = :years,
                    photo = :photo,
                    is_published = :is_published,
                    updated_at = :updated_at
                    WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':biography', $biography, PDO::PARAM_STR);
            $result->bindParam(':photo', $photo, PDO::PARAM_STR);
            $result->bindParam(':years', $years, PDO::PARAM_INT);
            $result->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $result->bindParam(':is_published', $is_published, PDO::PARAM_INT);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            if ($result->execute()) {
                return $db->lastInsertId();
            }
        }
        return false;
    }

    // DELETE
    public static function deleteByid($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM writers WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
