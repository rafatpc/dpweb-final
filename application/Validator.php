<?php

namespace DPWeb\Application;

class Validator {

    public function filter($str, $type = 0) {
        switch ($type) {
            case 0:
                return preg_match_all('/([;\\/*\[\]%\',#+^()<>|"\.!$&@])/', $str, $matches);
            case 1:
                //TODO
                return preg_match_all('/([;\\/*\[\]%\',#+^()<>|"\.!$&@])/', $str, $matches);
        }

        return null;
    }

    public function rstrlen($str, $min = 4, $max = 10) {
        if (in_array(strlen($str), range($min, $max))) {
            return true;
        } else {
            return false;
        }
    }

    public function session() {
        return true;
    }

}
