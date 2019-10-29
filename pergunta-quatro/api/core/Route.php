<?php
    namespace Core;
    class Route
    {
        private $routes;
        public function __construct(array $routes)
        {
            $this->setRoutes($routes);
            $this->rum();
        }
        private function getUrl()
        {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
        private function setRoutes($routes)
        {
            foreach ($routes as $route) {
                $e = explode("@" , $route[1]);
                $r = [$route[0], $e[0], $e[1] ];
                $nR[] = $r; 
            }
            $this->routes = $nR;
        }
        private function getRequest()
        {
            $obj = new \stdClass;

            foreach ($_GET as $key => $value){
                @$obj->get->$key = $value;
            }
            foreach ($_POST as $key => $value){
                @$obj->post->$key = $value;
            }
            return $obj;
        }


        private function rum ()
        {
           $url = $this->getUrl();
           $urlArray = explode('/' , $url);   
           foreach ($this->routes as $route){
               $routeArray = explode("/" , $route[0]);
               for($i = 0 ; $i < count($routeArray); $i++){
                    if( ( strpos($routeArray[$i] , "{" ) !== false ) && ( count($urlArray) == count($routeArray) ) ){
                        $routeArray[$i] = $urlArray[$i];
                        $parem[] = $urlArray[$i];
                    }
                    $route[0] = implode( "/" , $routeArray );
               }               
                if ( $url == $route[0] ) {
                    $found = true;
                    $controller = $route[1];
                    $action = $route[2];
                    break;
                } 
            }
            if ( isset( $found ) ) {
                $contro = Container::newController($controller);
                if ( isset($parem) ) {
                    switch (count($parem)) {
                        case 1:
                            $contro->$action( $parem[0] , $this->getRequest() );
                            break;
                        case 2:
                            $contro->$action( $parem[0] , $parem[1] , $this->getRequest() );
                            break;
                        case 3:
                            $contro->$action( $parem[0] , $parem[1] , $parem[2] , $this->getRequest());
                            break;
                        default:
                            $contro->$action( $this->getRequest() );    
                    }
                } else {
                    $contro->$action( $this->getRequest() ); 
                }               
            } else {
                Container::pageNotFound();
            }

        }

    }