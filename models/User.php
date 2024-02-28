<?php

require_once ROOT .'/components/Db.php';

class User
{
    
    // поиск по email 
    public static function findByEmail($email)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // $email = '\''.$email.'\'';

        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        // Fetch the records so we can display them in our template.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // ПОПЫТКА ВХОДА
    public static function attemptLogin($email, $password) {
        $user = User::findByEmail($email);
        
        if($user) {
            // ПОСЛЕ НАХОЖДЕНИЯ ПОЛЬЗОВАТЕЛЯ ПО 'email' ПРОВЕРЯЕМ ПАРОЛЬ
            if (User::passwordCheck($password, $user['password'])) {               
                return $user;
            } else {               
                return false;
            }
        } else {
            return false;
        }
    }
    
    // проверка, выполнен ли вход
    public static function loggedIn() {
        return isset($_SESSION['user_id']);
    }
    
    // перенаправление с закрытой страницы
    public static function confirmLoggedIn() {
        if(!loggedIn()) {
            redirect("login.php");
        }
    }

    // шифрование пароля
    public static function passwordEncrypt($password) {
		$hash_format = "$2y$10$";	// Tells PHP to use Blowfish with a "cost" of 10
		$salt_length = 22;			// Blowfish salts should be 22-characters or more
		$salt = User::generateSalt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}

	// генератор соли
	public static function generateSalt($length) {
		// Not 100% unique, not 100% random, but good enough for a salt
		// MD5 returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));

		// Valid characters for a salt are [a-zA-Z0-9./]
		$base64_string = base64_encode($unique_random_string);

		// But not '+' which is valid in base64 encoding
		$modified_base64_string = str_replace('+', '.', $base64_string);

		// Truncate string to the correct length
		$salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}

    // проверка зашифрованного пароля
	public static function passwordCheck($password, $existing_hash) {
		// existing hash contains format and salt at start
		$hash = crypt($password, $existing_hash);
		if ($hash == $existing_hash) {
			return true;
		} else {
			return false;
		}
	}


}
