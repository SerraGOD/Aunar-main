<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alert;

class AlertSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Alert::create([
            'alert_user_id'=>'1',
            'alert_name'=>'hola',
            'alert_description'=>'Prueba hola',
            'alert_category'=>'1',
            'alert_type'=>'1',
            'alert_send_type'=>'1',
            'alert_see_report'=>'1',
        ]);
    }

}
