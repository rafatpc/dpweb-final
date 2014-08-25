<?php

class Home extends Controller
{
    public function index()
    {
        \View::make('hello');
    }
    
    public function characters()
    {
        $this->loadModel('Test');
        $data['chars'] = $this->models['test']->select('Name');
        \View::make('characters', $data);
    }
}
