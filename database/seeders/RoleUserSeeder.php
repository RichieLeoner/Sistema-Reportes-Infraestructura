<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $maintenance = Role::create(['name' => 'mantenimiento']);
        $user = Role::create(['name' => 'usuario']);

        // Crear usuarios de prueba
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@itsc.edu.do',
            'password' => Hash::make('123456'),
            'role_id' => $admin->id,
        ]);

        User::create([
            'name' => 'Demo Estudiante',
            'email' => 'demo1@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $user->id,
        ]);

        User::create([
            'name' => 'Demo Profesor',
            'email' => 'demo2@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $user->id,
        ]);

        User::create([
            'name' => 'Demo Mantenimiento',
            'email' => 'demo3@itsc.edu.do',
            'password' => Hash::make('demo1234'),
            'role_id' => $maintenance->id,
        ]);
    }
}