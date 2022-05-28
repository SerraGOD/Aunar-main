<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Price::create([
            'programa_id' => '1',
            'concept' => 'Profesional  En Contaduría Pública (SNIES 102322) Abreviatura_Q10ID',
            'value_ordinary' => '1515464,5',
            'value_with_discount' => '1191520',
            'percentage_discount' => '21,3759213759214',
            'discount_strategy' => 'Anticipada est.admon',
        ]);

        Price::create([
            'programa_id' => '2',
            'concept' => 'Profesional En Administración De Empresas (SNIES 102519)',
            'value_ordinary' => '1515464,5',
            'value_with_discount' => '1191520',
            'percentage_discount' => '21,3759213759214',
            'discount_strategy' => 'Anticipada est.admon',
        ]);

        Price::create([
            'programa_id' => '3',
            'concept' => 'Profesional en Diseño Visual  (SNIES 109036)',
            'value_ordinary' => '2721039,2',
            'value_with_discount' => '1470000',
            'percentage_discount' => '45,9765224991981',
            'discount_strategy' => 'Anticipada est.2',
        ]);

        Price::create([
            'programa_id' => '4',
            'concept' => 'Profesional En Ingeniería Informática  (SNIES 102883)',
            'value_ordinary' => '1644850',
            'value_with_discount' => '1292800',
            'percentage_discount' => '21,4031674620786',
            'discount_strategy' => 'Ingenieria est.1',
        ]);

        Price::create([
            'programa_id' => '5',
            'concept' => 'Profesional En Seguridad y Salud en el Trabajo (SNIES 104600)',
            'value_ordinary' => '3843110',
            'value_with_discount' => '1634900',
            'percentage_discount' => '57,4589329995759',
            'discount_strategy' => 'Anticipada est.1',
        ]);

        Price::create([
            'concept' => 'Incripcion nuevos',
            'value_ordinary' => '123117,5',
            'value_with_discount' => '121000',
        ]);

        Price::create([
            'concept' => 'Plataforma cambridge',
            'value_ordinary' => '54000',
        ]);
    }

}
