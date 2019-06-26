<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensagem
 *
 * @author luizc
 */
class Mensagem {

    private static $msg;

    const SUCCESSS = 1;
    const FAILURE = 0;

    public static function set($msg = null, $type = null) {
        self::$msg["msg"] = $msg;
        self::$msg["type"] = $type;
    }

    public static function get() {
        return self::$msg;
    }

    public static function msg() {
        return self::$msg["msg"];
    }

    public static function type() {
        return self::$msg["type"];
    }

    public static function exists() {
        return self::$msg != null;
    }

}
