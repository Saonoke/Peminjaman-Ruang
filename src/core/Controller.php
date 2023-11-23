<?php

class Controller
{
    public function view($view, $data = [])
    {
        require '../src/views/' . $view . '.php';
    }
}