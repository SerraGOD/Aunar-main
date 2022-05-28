<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

class Sed {

    public static function key4() {
        return '1YVoHsMBkylC1TYIH85USsTXuNh6hlwlxa00GsCmgvE=';
    }

    public static function method() {
        return 'AES-256-CBC';
    }

    public static function encryption($string, $token) {
        $output = FALSE;
        $key = hash('sha256', $token);
        $iv = substr(hash('sha256', Sed::key4()), 0, 16);
        $output = openssl_encrypt($string, Sed::method(), $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decryption($string, $token) {
//        dd($string);
        $key = hash('sha256', $token);
//        dd($key);
        $iv = substr(hash('sha256', Sed::key4()), 0, 16);
//        dd($iv);
        $output = openssl_decrypt(base64_decode($string), Sed::method(), $key, 0, $iv);
//        dd($output);
        return $output;
    }

}

?>