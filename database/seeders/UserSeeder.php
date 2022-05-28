<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        DB::table('users')->insert([
//            'type_document' => 'CC',
//            'document' => '1234567890',
//            'name' => 'Admin',
//            'email' => 'admin@themesbrand.com',
//            'password' => Hash::make('12345678'),
//            'movil' => '3121234567',
//            'aceptar_terminos' => 'Acepto',
//            'created_at' => now(),
//            'profile' =>'1',
//        ]);
        
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567891',
            'name' => 'Admin1',
            'email' => 'admin1@themesbrand.com',
            'profile' => '2',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567892',
            'name' => 'Admin2',
            'email' => 'admin2@themesbrand.com',
            'profile' => '3',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567893',
            'name' => 'Admin3',
            'email' => 'admin3@themesbrand.com',
            'profile' => '4',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567894',
            'name' => 'Admin4',
            'email' => 'admin4@themesbrand.com',
            'profile' => '2',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567895',
            'name' => 'student1',
            'email' => 'student1@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567896',
            'name' => 'student2',
            'email' => 'student2@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567897',
            'name' => 'student3',
            'email' => 'student3@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567898',
            'name' => 'student4',
            'email' => 'student4@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '1234567899',
            'name' => 'student5',
            'email' => 'student5@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678910',
            'name' => 'student6',
            'email' => 'student6@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678911',
            'name' => 'student7',
            'email' => 'student7@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678912',
            'name' => 'student8',
            'email' => 'student8@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678913',
            'name' => 'student9',
            'email' => 'student9@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678914',
            'name' => 'student10',
            'email' => 'student10@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678915',
            'name' => 'student11',
            'email' => 'student11@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678916',
            'name' => 'student12',
            'email' => 'student12@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678917',
            'name' => 'student13',
            'email' => 'student13@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678918',
            'name' => 'student14',
            'email' => 'student14@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678919',
            'name' => 'student15',
            'email' => 'student15@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678920',
            'name' => 'student16',
            'email' => 'student16@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678921',
            'name' => 'student17',
            'email' => 'student17@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678922',
            'name' => 'student18',
            'email' => 'student18@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678923',
            'name' => 'student19',
            'email' => 'student19@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678924',
            'name' => 'student20',
            'email' => 'student20@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'type_document' => 'CC',
            'document' => '12345678925',
            'name' => 'student21',
            'email' => 'student21@themesbrand.com',
            'profile' => '1',
            'status' => '1',
            'password' => Hash::make('12345678'),
            'movil' => '3121234567',
            'aceptar_terminos' => 'Acepto',
            'created_at' => now(),
        ]);
    }

}
