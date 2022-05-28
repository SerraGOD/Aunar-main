<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use App\Models\User;
use App\Models\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class Alerts {

    public static function categoryAlert($param) {
        $array = array('', 'Group', 'Company', 'User');
        return $array[$param];
    }

    public static function typeAlert($param) {
        $array = array('', 'view', 'sms', 'mail');
        return $array[$param];
    }

    public static function createAlert($param) {
        if (Alerts::validaAlert($param)) {
            Alert::create([
                'alert_user_id' => $param['alert_user_id'],
                'alert_name' => $param['alert_name'],
                'alert_description' => ($param['alert_description'] ?? ''),
                'alert_category' => ($param['alert_category'] ?? ''),
                'alert_type' => $param['alert_type'],
                'alert_send_type' => ($param['alert_send_type'] ?? ''),
                'alert_see_report' => ($param['alert_see_report'] ?? ''),
            ]);
        }

        Alerts::sentMail('luydjmix@gmail.com', 'asd', 'hello word');
        return $param['alert_name'];
    }

    public static function validaAlert($param) {
        if (!empty($param['alert_user_id']) && !empty($param['alert_name']) && !empty($param['alert_type'])) {
            $resp = true;
        } else {
            $resp = false;
        }
        return $resp;
    }

    public static function sentMail($mailto, $company, $msj) {

        $objAlert = new \stdClass();
        $objAlert->msj = $msj;
        $objAlert->sender = 'PL&R';
        $objAlert->company = $company;

        Mail::to($mailto)->send(new OrderShipped($objAlert));
    }

}
