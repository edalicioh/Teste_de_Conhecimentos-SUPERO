<?php

    namespace Core;
    use Core\DataBase;

    class Container
    {
        public static function newController($contoller)
        {
            $objController = "App\\Controllers\\" . $contoller;
            return new $objController;
        }

        public static function getModel($model)
        {
            $objModel = "\\App\\Models\\" . $model ;
            return new $objModel(DataBase::getDataBase());
        }

        public static function pageNotFound()
        {
            if ( file_exists( __DIR__ . "/../app/Views/pages/404/index.phtml") ) {
                require_once __DIR__ . "/../app/Views/pages/404/index.phtml";
            } else {
                echo "pagina nao encontrada";
            }
        }
    }