<?php

abstract class AbstractController
{
    public function view($view, $data = [])
    {
        require '../src/views/' . $view . '.php';
    }

    abstract public function model($model);
}

class Controller extends AbstractController
{
    public function model($model)
    {
        require '../src/models/' . $model . '.php';

        return new $model;
    }
}

