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
        
        $data['chars'] = $character->getAll();
        
        \View::make('characters', $data);
    }
    
    public function user_create()
    {
        $user = $this->model('User');
        
        $user->create(); // will throw an error that the "users" table don't exists
        
        \View::make('user/create');
    }
    public function user_update()
    {
        $user = $this->model('User');
        
        $user->update(); // will throw an error that the "users" table don't exists
        
        \View::make('user/update');
    }
}
