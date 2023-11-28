<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            array(
                'nombre' => 'ADMINISTRADOR',
                'username' => 'admin',
                'password_hash' => Hash::make('4dm1nSM'),
                'estado_usuario' => 'A',
                'id_rol' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_usuarios')->insert($data);

    }
}
