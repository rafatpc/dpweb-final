<?php

class Home extends Controller
{
    public function index()
    {
        \View::make('hello');
    }
    
    public function characters()
    {
        $character = $this->model('Character');
        
        $data['chars'] = $character->getAll(); // also can use $this->model('Character')->getAll();
        
        \View::make('characters', $data);
    }
}
