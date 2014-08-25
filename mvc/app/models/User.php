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
            'USErname' => 'Jack',
            'PAsswORD' => 'jacks',
            'EMail' => 'jack@mail.com'
        ))->where('user_id','=', 1)->build(false);
        return true;
    }
}
