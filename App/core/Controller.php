<?php
namespace App\core;
class Controller{
    public function model($model){
        require_once "App/models/".$model.".php";
        return new $model;
    }

    public function views($view, $data = []){
        require_once "App/views/template.php";
        return new $view;
    }
}