<?php

class Character extends \DPWeb\System\DefaultModel
{

    private $account;
    private $name;
    private $mail;
    private $connectStat;
    private $connectedCharacter;
    private $characterNames = array();
    private $characters = array();

    public function __construct($character, $account) {
        parent::__construct();
//if object...
        $this->account = $account;
    }

    public function getName() {
        return $this->name;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getCharacters() {
        if (count($this->characterNames) === 0 || count($this->characters) !== 0) {
            return $this->characters;
        }

        foreach ($this->characterNames as $character) {
            $this->characters[] = new \DPWeb\System\Character($character);
        }
    }

}
