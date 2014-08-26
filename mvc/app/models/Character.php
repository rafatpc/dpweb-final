<?php

class Character extends Model
{
    function getAll()
    {
        return $this->db->select('Name')->from('Character')->build(true);
    }
}