<?php
require_once ROOT.'/components/DB.php';
require_once ROOT.'/components/Upload.php';

// namespace Libr\Model;

class Writer
{
    // protected $oDb;
    // public function __construct()
    // {
    //     $dbFile = ROOT . 'components/DB.ph';
    //     $this->oDb = new $dbFile;
    // }

    // READ ALL
    public static function getAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, biography, years, photo, created_date FROM writers ORDER BY id');

        // Получение и возврат результатов
        $i = 0;
        $writersList = array();
        while ($row = $result->fetch()) {
            $writersList[$i]['id'] = $row['id'];
            $writersList[$i]['name'] = $row['name'];
            $writersList[$i]['biography'] = $row['biography'];
            $writersList[$i]['photo'] = $row['photo'];
            $writersList[$i]['years'] = $row['years'];
            $writersList[$i]['created_date'] = $row['created_date'];
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
        $photo = $file;
        // var_dump($photo = Upload::fileUpload());
        // print_r($photo);
       
        $db = Db::getConnection();
        $sql = 'INSERT INTO writers '
                . '(name, biography, years, photo)'
                . 'VALUES '
                . '(:name, :biography, :years, :photo)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $result->bindParam(':biography', $_POST['biography'], PDO::PARAM_STR);
        $result->bindParam(':photo', $photo, PDO::PARAM_STR);
        $result->bindParam(':years', $_POST['years'], PDO::PARAM_INT);
        // $result->bindParam(':created_date', $options['created_date'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

}
