<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Documentos_user;

class DocumentosUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Documentos_user::create([
            'user_id' => '1',
            'tipo_form' => '1',
            'descripcion' => 'asd',
            'copia_de_cedula' => 'asd',
            'certificado_eps' => 'asd',
            'registro_civil' => 'asd',
            'acta_diploma_bachiller' => 'asd',
            'foto_documento' => 'asd',
            'resultados_saber' => 'asd',
            'ficha_inscripcion' => 'asd',
            'formato_tratamiento' => 'asd',
            'examen_medico' => 'asd',
            'examen_serologia' => 'asd',
            'soporte_pago' => 'asd',
            'resolucion_acta_homologacion' => 'asd',
            'certificado_notas' => 'asd',
            'contenidos_tematicos' => 'asd',
            'carnet_vacunas' => 'asd',
        ]);
    }

}
