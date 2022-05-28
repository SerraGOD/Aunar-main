<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Liquidation;

class LiquidationSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Liquidation::create([
            'user_id' => '5',
            'inscription_id' => '1',
            'value' => '1245520',
            'dateValue' => '2021-08-04',
            'period' => '2021-2',
            'dateExpiration' => '2021-08-04',
        ]);
        
        Liquidation::create([
            'user_id' => '6',
            'inscription_id' => '2',
            'value' => '1245520',
            'dateValue' => '2021-08-04',
            'period' => '2021-2',
            'dateExpiration' => '2021-08-04',
        ]);
    }

}
