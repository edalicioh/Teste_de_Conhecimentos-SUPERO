<?php
namespace App\Controllers;
use App\Models\Home;
use Core\BaseController;
use Core\Container;

class HomeController extends BaseController
{
    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Container::getModel('Home');
    }
    public function index()
    {
        $data = $this->db->all() ;
        $this->renderView( 'api' , $data );        
    }
    public function show($id)
    {
        $data = $this->db->find($id) ;
        $this->renderView( 'api' , $data );
    }
    public function store($request)
    {   
        if ( !empty( $request->post ) ) {
            $req = $request->post;

            if( 
                isset( $req->title ) &&
                isset( $req->body ) &&
                isset( $req->priority ) &&
                isset( $req->status ) ) {
                $data =[
                    "title"     => $req->title,
                    "body"      => $req->body,
                    "data"      => date('Y-m-d H:i:s'),
                    "priority"  => $req->priority,
                    "status"  => $req->status,
                ];
                try {
                    $res = $this->db->create($data);
                    if ( $res ) {
                        $this->index();
                    } else {
                        $this->renderView( 'api' , ["error" => "ocorreu um erro"]);
                    }

                } catch (\Exception $e) {
                    $this->renderView( 'api' , ["error" => $e->getMessage() ]);
                }
            } else {
                $this->renderView( 'api' , ["error" => "Esta faltando dados 01"]);
            }
        } else { 
            $this->renderView( 'api' , ["error" => "Esta faltando dado 02"]);
        }

    }
    public function update($id, $request)
    {        
        $req = $request->post;
        $data =[
            "title"     => $req->title,
            "body"      => $req->body,
            "priority"  => $req->priority,
            "status"    => $req->status,
        ];
        try {
            $res = $this->db->update($data , $id);
            if ( $res ) {
                $this->index();
            } else {
                $this->renderView( 'api' , ["error" => "ocorreu um erro"]);
            }

        } catch (\Exception $e) {
            $this->renderView( 'api' , ["error" => $e->getMessage() ]);
        }

    }
    public function delete($id)
    {
        try {
            $res = $this->db->delete($id);
            if ( $res ) {
                $this->index();
            } else {
                $this->renderView( 'api' , ["error" => "ocorreu um erro"]);
            }
        } catch (\Exception $e) {
            $this->renderView( 'api' , ["error" => $e->getMessage() ]);
        }
    }
}