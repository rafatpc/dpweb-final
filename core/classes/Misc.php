<?php

class Misc {
    
    //private static $db = Database::getInstance()->connect('127.0.0.1','sa','sql_pass','MuOnline');

    public static function character_class($value, $view=0)
    {
            $class = array(
                    0 => array("Dark Wizard","DW"),1 => array("Soul Master","SM"),2 => array("Grand Master","GrM"),3 => array("Grand Master","GrM"),
                    16 => array("Dark Knight","DK"),17 => array("Blade Knight","BK"),18 => array("Blade Master","BM"),19 => array("Blade Master","BM"),
                    32 => array("Fairy Elf","Elf"),33 => array("Muse Elf","ME"),34 => array("High Elf","HE"),35 => array("High Elf","HE"),
                    48 => array("Magic Gladiator","MG"),49 => array("Duel Master","DM"),50 => array("Duel Master","DM"),
                    64 => array("Dark Lord","DL"),65 => array("Lord Emperor","LE"),66 => array("Lord Emperor","LE"),
                    80 => array("Summoner","Sum"),81 => array("Bloody Summoner","BS"),82 => array("Dimension Master","DiM"),83 => array("Dimension Master","DiM")
            );
            return isset($class[$value][$view]) ? $class[$value][$view] : 'Unknown';   
    }

    public static function pk_level($value, $view=0)
    {
            $pklevel = array( 
                    1 => array('<span style="color:#605ca8;">Hero</span>','<span style="color:#605ca8;">H.</span>'), 
                    2 => array('<span style="color:#605ca8;">Commoner</span>','<span style="color:#605ca8;">C.</span>'), 
                    3 => array('<span>Normal</span>','<span>N.</span>'), 
                    4 => array('<span style="color:#fbaf5d;">Against Murderer</span>','<span style="color:#fbaf5d;">A.M.</span>'), 
                    5 => array('<span style="color:#a0410d;">Murderer</span>','<span style="color:#a0410d;">M.</span>'), 
                    6 => array('<span style="color:#c81118;">Phonomania</span>','<span style="color:#c81118;">P.</span>')
            );
            return isset($pklevel[$value][$view]) ? $pklevel[$value][$view] : 'Unknown';   
    }

    public static function is_online($char_name, $only_user=0)
    {
            $accountid = self::$db->select('SELECT AccountID FROM Character WHERE Name=:charname', array('charname' => $char_name), PDO::FETCH_NUM);

            $check_status = self::$db->select('SELECT ConnectStat FROM MEMB_STAT WHERE memb___id=:userid', array('userid' => $accountid[0]), PDO::FETCH_NUM);

            $name = self::$db->select('SELECT GameIDC FROM AccountCharacter WHERE id=:userid', array('userid' => $accountid[0]), PDO::FETCH_NUM);

            if($only_user===1 && $check_status[0] >= 1){ return 1; }
            elseif($check_status[0] >= 1 && $name[0] == $char_name){ return 1; }
            else{ return 0; }
    }

    public static function chararacter_info($char_name)
    {
            $char = self::$db->select('SELECT * FROM Character WHERE Name=:charname', array('charname' => $char_name));

            $guild = self::$db->select('SELECT G_Name FROM GuildMember WHERE Name=:charname', array('charname' => $char_name));

            if($guild['G_Name']==NULL)
            {
                    $char['cGuild'] = 'No Guild';
            }
            else
            {
                    $char['cGuild'] = $guild['G_Name'];
            }
            return $char;
    }
}
