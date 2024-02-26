<?php
require_once ROOT.'/components/Db.php';
require_once ROOT.'/components/Upload.php';

// namespace Libr\Model;

class Library
{

    // READ ALL
    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, address, site, telephone, photo, history, created_at, updated_at FROM libraries ORDER BY id');

        // Получение и возврат результатов
        $i = 0;
        $librariesList = array();
        while ($row = $result->fetch()) {
            $librariesList[$i]['id'] = $row['id'];
            $librariesList[$i]['name'] = $row['name'];
            $librariesList[$i]['address'] = $row['address'];
            $librariesList[$i]['history'] = $row['history'];
            $librariesList[$i]['site'] = $row['site'];
            $librariesList[$i]['photo'] = $row['photo'];
            $librariesList[$i]['telephone'] = $row['telephone'];
            $librariesList[$i]['created_at'] = $row['created_at'];
            $librariesList[$i]['updated_at'] = $row['updated_at'];
            $i++;
        }
        return $librariesList;
    }

    // READ ONE
    public static function getById($id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT * FROM libraries WHERE id = :id LIMIT 1");   
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

        // сгенерированное название изображения
        $photo = $file;
       
        $db = Db::getConnection();
        $sql = 'INSERT INTO libraries '
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

            if($newPhoto = Upload::upload('libraries')){
                Upload::delete('libraries', $photo);
                // название нового сохраненного изображения
                $photo = $newPhoto;
            };
            
            $db = Db::getConnection();
            $sql = 'UPDATE libraries SET
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
        $sql = 'DELETE FROM libraries WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
