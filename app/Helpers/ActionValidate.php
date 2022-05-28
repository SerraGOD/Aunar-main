<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Illuminate\Support\Facades\URL;
use App\Models\Inscription;
use App\Models\Program;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ActionValidate {

//    obliga al usuario a realizar primero que nada a 
//    inscribirse
    public static function validaInscripcion($param) {
        $urlActual = URL::current();
        $urlInscrip = url("/inscripcion");
        if (Inscription::where('user_id', $param)->count() == 0) {
            if ($urlActual != $urlInscrip) {
                $js = '<script type="text/javascript">'
                        . 'window.location="' . $urlInscrip . '";'
                        . '</script>';
                echo $js;
            }
        }
    }

//    se valida que el usurio este inscripto
//    esto responde un valor booleano
    public static function valideUserInscripcion() {
        $id_user = Auth::id();
        $resp = 0;
        if (Inscription::where('user_id', $id_user)->count() == 0) {
            $resp = 1;
        }
        return $resp;
    }

//    en esta consulta se consulta el programa selecionado 
//    y posterior se consulta la informacion del programa corespondiente
//    para consultar el valor necesario se ingresa la columna de la tabla programs
    public static function querryProgram($user_id, $colunm) {
        $inscrip = Inscription::where('user_id', $user_id)->first();
        $program = Program::where('id', $inscrip->programa_id)->first();
        return $program->{$colunm};
    }

    public static function validFile104600($CodeProgram) {
        if ($CodeProgram != 104600) {
            return 0;
        } else {
            return 1;
        }
    }

    public static function validNewHomologRoute($param) {
        switch ($param) {
            case '1':
                return 'cargadocumentos.store.new';
                break;
            case '2':
                return 'cargadocumentos.store.homologation';
                break;
        }
    }

}
