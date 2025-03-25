<?php


class Controller {

    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function views($view, $data){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        $mode = new $model();
        return $mode;
    }

    public function models($model){
        require_once '../app/models/' . $model . '.php';
        // $mode = new $model();
        return new $model();
    }

    public function utils($utils){
        require_once '../app/Utils/' . $utils . '.php';
        return new $utils();
    }

    public function util($utils, $model){
        require_once '../app/Utils/' . $utils . '.php';
        return new $utils($model); 
    }

}