<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(ConceptoSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(SintomaSeeder::class);
        $this->call(DiagnosticoSeeder::class);
        $this->call(ConsultaSeeder::class);
        $this->call(ConsultaSintomaSeeder::class);
        $this->call(TratamientoSeeder::class);
        $this->call(DetalleTratamientoSeeder::class);
        $this->call(TipoMovimientoSeeder::class);
        $this->call(MovimientoSeeder::class);
        $this->call(DetalleMovimientoSeeder::class);
    }
}
