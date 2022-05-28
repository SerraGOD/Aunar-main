<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Program::create(['Codigo' => '102322', 'Nombre' => 'Profesional  En Contaduría Pública (SNIES 102322)', 'Abreviatura_Q10ID' => 'CP603A', 'N_Res_autorización' => '6889', 'F_Res_autorizacion' => '13/05/2014', 'Aplica_para_grupos' => 'Sí', 'Aplica_para_preinscripciones' => 'Sí', 'Tipo_de_evaluacion' => 'Cuantitativo', 'Estado' => '1',]);
        Program::create(['Codigo' => '102519', 'Nombre' => 'Profesional En Administración De Empresas (SNIES 102519)', 'Abreviatura_Q10ID' => 'AE602A', 'N_Res_autorización' => '5969', 'F_Res_autorizacion' => '20/11/2013', 'Aplica_para_grupos' => 'Sí', 'Aplica_para_preinscripciones' => 'Sí', 'Tipo_de_evaluacion' => 'Cuantitativo', 'Estado' => '1',]);
        Program::create(['Codigo' => '109036', 'Nombre' => 'Profesional en Diseño Visual  (SNIES 109036)', 'Abreviatura_Q10ID' => 'DV', 'N_Res_autorización' => '15653', 'F_Res_autorizacion' => '18/12/2019', 'Aplica_para_grupos' => 'Sí', 'Aplica_para_preinscripciones' => 'Sí', 'Tipo_de_evaluacion' => 'Cuantitativo', 'Estado' => '1',]);
        Program::create(['Codigo' => '102883', 'Nombre' => 'Profesional En Ingeniería Informática  (SNIES 102883)', 'Abreviatura_Q10ID' => 'II609A', 'N_Res_autorización' => '16935', 'F_Res_autorizacion' => '22/08/2016', 'Aplica_para_grupos' => 'Sí', 'Aplica_para_preinscripciones' => 'Sí', 'Tipo_de_evaluacion' => 'Cuantitativo', 'Estado' => '1',]);
        Program::create(['Codigo' => '104600', 'Nombre' => 'Profesional En Seguridad y Salud en el Trabajo (SNIES 104600)', 'Abreviatura_Q10ID' => 'PSST608A', 'N_Res_autorización' => '7822', 'F_Res_autorizacion' => '1/06/2015', 'Aplica_para_grupos' => 'No', 'Aplica_para_preinscripciones' => 'Sí', 'Tipo_de_evaluacion' => 'Cuantitativo', 'Estado' => '1',]);
    }

}
