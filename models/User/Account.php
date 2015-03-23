<?php

namespace DPWeb\Models\User;

class Account extends \DefaultModel {

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
        } else {
            $abbrev = explode(' ', $classArray[$class]);
            return substr($abbrev[0], 0, 1) . substr($abbrev[1], 0, 1);
        }
    }

    public function getClassImage($class) {
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
<<<<<<< HEAD
            
=======
>>>>>>> 798aa1085cde3442cac6b1b50be0c40050a7c850
            $r['classname'] = $this->decodeClass($r['Class']);
            $r['image'] = $this->getClassImage($r['Class']);

            $charArr['characters'][$r['Name']] = $r;
        }

        return $charArr;
    }
<<<<<<< HEAD
    
    public function loginUser($user, $pass) {
        $user = $this->db->escape($user);
        $pass = $this->db->escape($pass);

        if ($user === false || $this->validator->filter($user) != 0) {
            $this->view->setError('Invalid username!');
        }

        if ($pass === false || $this->validator->filter($pass) != 0) {
            $this->view->setError('Invalid password!');
        }

        if (!$this->validator->rstrlen($user)) {
            $this->view->setError('The lenght of the username should be between 4 and 10 characters!');
        }

        if (!$this->validator->rstrlen($pass)) {
            $this->view->setError('The lenght of the password should be between 4 and 10 characters!');
        }

        if (\DPWeb\Application\Config::getInstance()->main['md5']) {
            $password = "[dbo].[fn_md5]('{$pass}','{$user}')";
        } else {
            $password = "'{$pass}'";
        }

        $login = $this->db->query("Select [memb__pwd], [memb___id] from [MEMB_INFO] Where [memb___id]='{$user}' and [memb__pwd]={$password}");
        $nr = $this->db->numRows($login);
        
        if($nr === 1){
            $fa = $this->db->fetchArray($login);
            $_SESSION['dpw_user'] = $fa['memb___id'];
            $_SESSION['dpw_pass'] = strtoupper(bin2hex($fa['memb__pwd']));
        } else {
            $this->view->setError('Invalid username or password!');
        }
    }

    public function register($user, $pass, $mail, $question, $answer, $anispam) {
        
    }
=======
>>>>>>> 798aa1085cde3442cac6b1b50be0c40050a7c850

}
