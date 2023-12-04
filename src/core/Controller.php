<?php

class Controller
{
    public function view($view, $data = [])
    {
        require '../src/views/' . $view . '.php';
    }

    public function model($model){
       
        require '../src/models/'. $model .'.php';
        return new $model;
    }
}