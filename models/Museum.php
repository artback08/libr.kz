<?php
require_once ROOT.'/components/Db.php';
require_once ROOT.'/components/Upload.php';

class Museum
{

    // READ ALL
    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT * FROM museums ORDER BY id');

        // Получение и возврат результатов
        $i = 0;
        $museumsList = array();
        while ($row = $result->fetch()) {
            $museumsList[$i]['id'] = $row['id'];
            $museumsList[$i]['name'] = $row['name'];
            $museumsList[$i]['address'] = $row['address'];
            $museumsList[$i]['link'] = $row['link'];
            $museumsList[$i]['history'] = $row['history'];
            $museumsList[$i]['email'] = $row['email'];
            $museumsList[$i]['photo'] = $row['photo'];
            $museumsList[$i]['telephone'] = $row['telephone'];
            $i++;
        }
        return $museumsList;
    }

    // READ ONE
    public static function getById($id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT * FROM museums WHERE id = :id LIMIT 1");   
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
        $email = '';
        $photo = '';
        $history = '';
        $is_published = '';

        $name = $_POST['name'];
        $address = $_POST['address'];
        $link = $_POST['link'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $history = $_POST['history'];
        $is_published = $_POST['is_published'];

        //если существует изображение
        $photo = $file !== null ? $file : "museum.jpg";
        
       
        $db = Db::getConnection();
        $sql = 'INSERT INTO museums '
                . '(name, address, link, telephone, email, history, photo, is_published)'
                . 'VALUES '
                . '(:name, :address, :link, :telephone, :email, :history, :photo, :is_published)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $result->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
        $result->bindParam(':link', $_POST['link'], PDO::PARAM_STR);
        $result->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $result->bindParam(':history', $_POST['history'], PDO::PARAM_STR);
        $result->bindParam(':photo', $photo, PDO::PARAM_STR);
        $result->bindParam(':is_published', $_POST['is_published'], PDO::PARAM_INT);
        
        if ($result->execute()) {
            // return $db->lastInsertId();
            return true;
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
        $email = '';
        $photo = '';
        $history = '';
        $is_published = '';

        if($museum = Museum::getById($id))
        {
            // текущее изображение
            $photo = $museum['photo'];
        }
        
        $name = $_POST['name'];
        $address = $_POST['address'];
        $link = $_POST['link'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $history = $_POST['history'];
        $is_published = $_POST['is_published'];

        // if(isset($_POST['update'])){

            
            if($newPhoto = Upload::upload('museums')){                
                Upload::delete('museums', $photo);
                // название нового сохраненного изображения
                $photo = $newPhoto;
            };
            
            $db = Db::getConnection();
            $sql = 'UPDATE museums SET
                    name = :name,
                    address = :address,
                    link = :link,
                    telephone = :telephone,
                    email = :email,
                    history = :history,
                    photo = :photo,
                    is_published = :is_published
                    WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':address', $address, PDO::PARAM_STR);
            $result->bindParam(':link', $link, PDO::PARAM_STR);
            $result->bindParam(':telephone', $telephone, PDO::PARAM_INT);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':photo', $photo, PDO::PARAM_STR);
            $result->bindParam(':history', $history, PDO::PARAM_STR);
            $result->bindParam(':is_published', $is_published, PDO::PARAM_INT);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            if ($result->execute()) {
                // return $db->lastInsertId();
                return true;
            }
            else{
                return false;
            }
    }

    // DELETE
    public static function deleteByid($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM museums WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
