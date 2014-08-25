<?php

class User extends Model
{
    public function create()
    {
        $this->db->insert('users',array(
            'UseRName' => 'Jack',
            'paSSword' => 'jacks',
            'emAil' => 'jack@mail.com'
        ))->build(false);
        return true;
    }

    public function update()
    {
        $this->db->update('users',array(
            'USERname' => 'Jack',
            'PASSWORD' => 'jacks',
            'EMail' => 'jack@mail.com'
        ))->where('user_id','=', 1)->build(false);
        return true;
    }
}
