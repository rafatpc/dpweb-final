<?php

namespace DPWeb\Models\User;

class Login extends \DefaultModel {

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

        if (\DPWeb\System\Config::getInstance()->main['md5']) {
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
}
