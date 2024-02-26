<?php

class Router
{
    // Свойство для хранения массива роутов
    private $routes;

    
    // Конструктор
    public function __construct()
    {
        // Путь к файлу с роутами
        $routesPath = ROOT . '/config/routes.php';

        // Получаем роуты из файла
        $this->routes = include($routesPath);
    }

    //  Возвращаем строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        
    }

    // Метод для обработки запроса
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                // Определяем контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments) . 'Controller');
                
                // Если параметров нет
                if(sizeof($segments)){
                    $actionName = 'action' . ucfirst(array_shift($segments));
                }
                else{
                    $actionName = 'action';
                }

                $parameters = $segments;     
                
                // Подключаем файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                // Если запрос URL корректный, вызываем инициализацию
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                    $controllerObject = new $controllerName;
                    /* Вызываем необходимый метод ($actionName) у определенного 
                    класса ($controllerObject) с заданными ($parameters) параметрами*/
                    // $result = call_user_func_array(array($controllerObject, $actionName), $parameters = array(''));
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                    
                }
                
                // Если запрос URL некорректный, загружаем главную страницу
                else{
                    header("Location: http://" . SITE);
                    exit( );
                }
                
                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
