<?php
namespace App\core;
class App{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        // controle de rotas
        $url = $this-> parseURL();

//        verificando se existe o controller
        if(file_exists('App/controllers/'.$url[2].'.php')){
            $this-> controller = $url[2];
            unset($url[2]);
        }

        require_once 'App/controllers/'.$this-> controller.'.php';
        $this-> controller = new $this-> controller;

        if(isset($url[3]) && !empty($url[3])){
            // temos um método
            if(method_exists($this-> controller, $url[3])){
                $this-> method = $url[3];
                unset($url[3]);
                unset($url[1]);
                unset($url[0]);
            }
        }
        // capturando os parametros
        $this-> params = $url ? array_values($url) : [];

        call_user_func_array([$this-> controller,  $this-> method], $this-> params);
    }

    public function parseURL(){
        return explode('/',filter_var($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
    }
}