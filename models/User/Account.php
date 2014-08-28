<?php

namespace DPWeb\Models\User;

class Account {

    private $db = null;

    public function __construct() {
        $this->db = \DPWeb\Application\Database::getInstance();
    }

    public function decodeClass($class, $opt = 0) {
        $classArray = array(
            0 => "Dark Wizard", 1 => "Soul Master", 2 => "Grand Master", 3 => "Grand Master",
            16 => "Dark Knight", 17 => "Blade Knight", 18 => "Blade Master", 19 => "Blade Master",
            32 => "Fairy Elf", 33 => "Muse Elf", 34 => "High Elf", 35 => "High Elf",
            48 => "Magic Gladiator", 49 => "Duel Master", 50 => "Duel Master",
            64 => "Dark Lord", 65 => "Lord Emperor", 66 => "Lord Emperor",
            80 => "Summoner", 81 => "Bloody Summoner", 82 => "Dimension Master", 83 => "Dimension Master"
        );

        if (!isset($classArray[$class])) {
            return 'Unknown';
        }

        if ($opt === 0 && strpos($classArray[$class], ' ') > 0) {
            return $classArray[$class];
        } else if ($opt === 1) {
            $abbrev = explode(' ', $classArray[$class]);
            return substr($abbrev[0], 0, 1) . substr($abbrev[1], 0, 1);
        } else {
            if ($class <= 10) {
                $img = 'sm';
            } else if ($class <= 20) {
                $img = 'bk';
            } else if ($class <= 40) {
                $img = 'me';
            } else if ($class <= 50) {
                $img = 'mg';
            } else if ($class <= 70) {
                $img = 'dl';
            } else if ($class <= 90) {
                $img = 'sum';
            } else if ($class <= 100) {
                $img = 'rf';
            } else {
                $img = 'unknown';
            }

            return $img;
        }
    }

    public function getCharacters() {
        $query = "Select * from [AccountCharacter] as [AC], [Character] as [C]"
                . " Where [AC].[Id]=[C].[AccountID] and [AC].[Id]='{$_SESSION['dpw_user']}'";

        $getChars = $this->db->query($query);
        $charArr = array();

        while ($r = $this->db->fetchArray($getChars)) {
            for ($i = 1; $i <= 5; $i++) {
                if ($r['GameIDC'] === $r['Name']) {
                    $r['status'] = 1;
                } else {
                    $r['status'] = 0;
                }

                if ($r['Name'] === $r['GameID' . $i]) {
                    $r['gid'] = $i;
                    break;
                } else if (!isset($r['GameID' . $i])) {
                    break;
                }
            }
            $r['classname'] = $this->decodeClass($r['Class']);
            $r['image'] = $this->decodeClass($r['Class'], 2);
            
            $charArr['characters'][$r['Name']] = $r;
        }

        return $charArr;
    }

}
