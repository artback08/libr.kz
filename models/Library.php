<?php
require_once ROOT.'/components/Db.php';
require_once ROOT.'/components/Upload.php';

class Library
{

    // READ ALL
    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT * FROM libraries ORDER BY id');

        // Получение и возврат результатов
        $i = 0;
        $librariesList = array();
        while ($row = $result->fetch()) {
            $librariesList[$i]['id'] = $row['id'];
            $librariesList[$i]['name'] = $row['name'];
            $librariesList[$i]['address'] = $row['address'];
            $librariesList[$i]['link'] = $row['link'];
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
        $address = '';
        $link = '';
        $telephone = '';
        $site = '';
        $photo = '';
        $history = '';
        $is_published = '';

        $name = $_POST['name'];
        $address = $_POST['address'];
        $link = $_POST['link'];
        $telephone = $_POST['telephone'];
        $site = $_POST['site'];
        $history = $_POST['history'];
        $is_published = $_POST['is_published'];

        //если существует изображение
        $photo = $file !== null ? $file : "library.jpg";
        
       
        $db = Db::getConnection();
        $sql = 'INSERT INTO libraries '
                . '(name, address, link, telephone, site, history, photo, is_published)'
                . 'VALUES '
                . '(:name, :address, :link, :telephone, :site, :history, :photo, :is_published)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $result->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
        $result->bindParam(':link', $_POST['link'], PDO::PARAM_STR);
        $result->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
        $result->bindParam(':site', $_POST['site'], PDO::PARAM_STR);
        $result->bindParam(':history', $_POST['history'], PDO::PARAM_STR);
        $result->bindParam(':photo', $photo, PDO::PARAM_STR);
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
        $address = '';
        $link = '';
        $telephone = '';
        $site = '';
        $photo = '';
        $history = '';
        $is_published = '';

        

        $library = Library::getById($id);
        
        // изображение из БД
        $photo = $library['photo'];

        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $link = $_POST['link'];
            $telephone = $_POST['telephone'];
            $site = $_POST['site'];
            $history = $_POST['history'];
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
                    address = :address,
                    link = :link,
                    telephone = :telephone,
                    site = :site,
                    history = :history,
                    photo = :photo,
                    is_published = :is_published,
                    updated_at = :updated_at
                    WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':address', $address, PDO::PARAM_STR);
            $result->bindParam(':link', $link, PDO::PARAM_STR);
            $result->bindParam(':telephone', $telephone, PDO::PARAM_INT);
            $result->bindParam(':site', $site, PDO::PARAM_INT);
            $result->bindParam(':photo', $photo, PDO::PARAM_STR);
            $result->bindParam(':history', $history, PDO::PARAM_INT);
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
