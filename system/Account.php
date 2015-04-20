<?php

class Account extends \DPWeb\System\DefaultModel
{

    private $name;
    private $mail;
    private $connectStat;
    private $connectedCharacter;
    private $characterNames = array();
    private $characters = array();

    public function __construct($memb___id) {
        parent::__construct();

        $accountInfo = $this->db->query("Select [MI].[memb___id], [MI].[mail_addr], [MS].[ConnectStat],
                                        [AC].[GameID1], [AC].[GameID2], [AC].[GameID3], [AC].[GameID4],
                                        [AC].[GameID5], [AC].[GameIDC] from [MEMB_INFO] [MI]
                                        LEFT JOIN [MEMB_STAT] [MS] on [MS].[memb___id]=[MI].[memb___id]
                                        LEFT JOIN [AccountCharacter] [AC] on [AC].[Id]=[MI].[memb___id]
                                        Where [MI].[memb___id]='{$memb___id}'", 2);

        if (count($accountInfo) === 1) {
            $this->name = $accountInfo['memb___id'];
            $this->mail = $accountInfo['memb_addr'];
            $this->connectStat = $accountInfo['ConnectStat'];
            $this->connectedCharacter = $accountInfo['GameIDC'];

            for ($i = 1; $i <= 5; $i++) {
                $character = $accountInfo['GameID' . $i];

                if (!empty($character)) {
                    $this->characterNames[] = $character;
                }
            }
        }
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
            $this->characters[] = new \DPWeb\System\Character($character, $this);
        }
    }

}
