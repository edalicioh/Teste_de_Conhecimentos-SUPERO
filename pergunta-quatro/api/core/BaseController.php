<?php
    namespace Core;

    abstract class BaseController
    {        
        protected $view;
        private $viewPath;
        public function __construct()
        {            
            $this->view = new \stdClass; //passa variaves e  conteudo para as views
        }
        protected function renderView($viewPath , $data)
        {
            $this->viewPath = $viewPath; // trais a paginas pedidas
           
            $this->exitJson($data);
            $this->content();
        }
        protected function content()
        {
            if ( file_exists( __DIR__ . "/../app/Views/{$this->viewPath}.php") ) {
                require_once __DIR__ . "/../app/Views/{$this->viewPath}.php";
            } else {
                echo "ERRO : 404";
            }
        }
        protected function exitJson( $data )
        { 
            if ( !empty($data) ) {
                $this->view->exit = json_encode( $data );
            } else {
                $this->view->exit = json_encode( ['error' => 'Dado não encontrado'] );
            }
        }
    
    }