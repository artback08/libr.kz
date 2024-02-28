<?php
require_once ROOT.'/models/User.php';

/**
 * Контроллер UserController
 */
class UserController
{

    public function actionLogin()
    {
        $email = "";
        $password = " ";
        $name = "";

        if (isset($_POST['login'])) 
        {
            $password = $_POST["password"];
            $email = $_POST["email"];
            if(User::findByEmail($email)){
                $user = User::attemptLogin($email, $password);
                if ($user) {
                    // Success
                    // Mark user as logged in
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["name"] = $user["name"];

                    $_SESSION["message"] = "Успешная авторизация";
                    redirect();
                } else {
                    // Failure
                    $_SESSION["message"] = "Username/password not found.";
                }
            }
            else{
                $_SESSION["message"] = "Username/password not found.";
            }
        }
        require_once (ROOT . '/views/login.php');
        return true;
    } 

    public function actionLogout()
    {
        // Стартуем сессию
        // session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user_id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["name"]);
        unset($_SESSION["message"]);
        
        // Перенаправляем пользователя на главную страницу
        redirect('login');
    }

}
