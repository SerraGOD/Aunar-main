<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\Roles;

class PermissionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Permissions::create(['name' => 'C','guard_name'=>'Crear']);
        Permissions::create(['name' => 'V','guard_name'=>'Ver']);
        Permissions::create(['name' => 'E','guard_name'=>'Editar']);
        Permissions::create(['name' => 'D','guard_name'=>'Eliminar']);
        Permissions::create(['name' => 'S','guard_name'=>'Campartir']);
        
        
        Roles::create(['name' => 'admin','guard_name'=>'Admin']);
        Roles::create(['name' => 'comercial','guard_name'=>'Comercial']);
        Roles::create(['name' => 'academico','guard_name'=>'Academico']);
        Roles::create(['name' => 'financiero','guard_name'=>'Financiero']);
        Roles::create(['name' => 'estudiante','guard_name'=>'Estudiante']);
    }

}
