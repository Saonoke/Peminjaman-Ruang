<?php

abstract class AbstractController
{
    abstract public function model($model);
}

class Controller extends AbstractController
{
    public function model($model)
    {
        require '../src/models/' . $model . '.php';

        return new $model;
    }
    public function view($view, $data = [])
    {
        require '../src/views/' . $view . '.php';
    }

}

