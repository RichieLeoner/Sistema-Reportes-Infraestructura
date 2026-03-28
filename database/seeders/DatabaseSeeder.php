<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Crear roles primero (IDs: 1=admin, 2=mantenimiento, 3=usuario)
        $admin = Role::create(['name' => 'admin']);
        $maintenance = Role::create(['name' => 'mantenimiento']);
        $user = Role::create(['name' => 'usuario']);

        // ✅ Crear usuarios de prueba con role_id correcto
        User::create([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@itsc.edu.do',
            'password' => Hash::make('123456'),
            'role_id' => $admin->id,
        ]);

        User::create([
            'name' => 'Carlos Martínez - Mantenimiento',
            'email' => 'mantenimiento@itsc.edu.do',
            'password' => Hash::make('123456'),
            'role_id' => $maintenance->id,
        ]);

        User::create([
            'name' => 'María García - Estudiante',
            'email' => 'demo1@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $user->id,
        ]);

        User::create([
            'name' => 'Carlos Rodríguez - Profesor',
            'email' => 'demo2@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $user->id,
        ]);

        User::create([
            'name' => 'Ana Martínez - Mantenimiento Demo',
            'email' => 'demo3@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $maintenance->id,
        ]);

        // ✅ Crear reportes de prueba
        $this->call(TicketSeeder::class);
    }
}
