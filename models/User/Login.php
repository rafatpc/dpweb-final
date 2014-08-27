<?php

namespace DPWeb\Models\User;

class Login {

    public function __construct($user, $pass) {
        $db = \DPWeb\Application\Database::getInstance();

        $user = $db->escape($user);
        $pass = $db->escape($pass);

        if ($user === false || \DPWeb\Application\Validator::filter($user) != 0) {
            throw new \Exception('Invalid username!');
        }

        if ($pass === false || \DPWeb\Application\Validator::filter($pass) != 0) {
            throw new \Exception('Invalid password!');
        }

        if (!\DPWeb\Application\Validator::rstrlen($user)) {
            throw new \Exception('The lenght of the username should be between 4 and 10 characters!');
        }

        if (!\DPWeb\Application\Validator::rstrlen($pass)) {
            throw new \Exception('The lenght of the password should be between 4 and 10 characters!');
        }

        if (\DPWeb\Application\Config::getInstance()->main['md5']) {
            $password = "[dbo].[fn_md5]('{$pass}','{$user}')";
        } else {
            $password = "'{$pass}'";
        }

        $login = $db->query("Select [memb__pwd], [memb___id] from [MEMB_INFO] Where [memb___id]='{$user}' and [memb__pwd]={$password}");
        $nr = $db->numRows($login);
        
        if($nr === 1){
            $fa = $db->fetchArray($login);
            $_SESSION['dpw_user'] = $fa['memb___id'];
            $_SESSION['dpw_pass'] = strtoupper(bin2hex($fa['memb__pwd']));
        } else {
            \DPWeb\Controllers\View::getInstance()->layoutData['errors'][] = 'Invalid username or password!';
        }
    }

}
