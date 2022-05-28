<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gestionagente;
use Carbon\Carbon;

class GestionagenteSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Gestionagente::create([
            'student_id' => '1',
            'agent_id' => '2',
            'inscription_id' => '1',
            'description' => 'Deben hacerse correciones',
            'status' => '1',
            'creation_date' => Carbon::now(),
        ]);
    }

}
