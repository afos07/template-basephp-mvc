<?php
use App\core\Controller;
class Home extends Controller {
    public function index(){
        $this-> views('home', ["nome"=> "anderson filipe"]);
    }

}