<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener usuarios de prueba
        $admin = User::where('email', 'admin@itsc.edu.do')->first();
        $usuario1 = User::where('email', 'demo1@itsc.edu.do')->first();
        $usuario2 = User::where('email', 'demo2@itsc.edu.do')->first();

        // Crear reportes de ejemplo
        Ticket::create([
            'user_id' => $usuario1->id,
            'location' => 'Aula 302',
            'description' => 'La luz del techo parpadea constantemente y a veces se apaga sola.',
            'priority' => 'media',
            'status' => 'pendiente',
            'photo_path' => null
        ]);

        Ticket::create([
            'user_id' => $usuario1->id,
            'location' => 'Baño del primer piso',
            'description' => 'El grifo del lavamanos está goteando sin parar.',
            'priority' => 'baja',
            'status' => 'en_proceso',
            'photo_path' => null
        ]);

        Ticket::create([
            'user_id' => $usuario2->id,
            'location' => 'Laboratorio de Cómputo 2',
            'description' => 'Tres computadoras no encienden. Se necesita revisión urgente.',
            'priority' => 'alta',
            'status' => 'pendiente',
            'photo_path' => null
        ]);

        Ticket::create([
            'user_id' => $usuario2->id,
            'location' => 'Pasillo principal',
            'description' => 'Una lámpara está rota y hay cristales en el suelo.',
            'priority' => 'alta',
            'status' => 'resuelto',
            'photo_path' => null
        ]);

        Ticket::create([
            'user_id' => $usuario1->id,
            'location' => 'Cafetería',
            'description' => 'Una mesa está inestable y peligra con caerse.',
            'priority' => 'media',
            'status' => 'pendiente',
            'photo_path' => null
        ]);
    }
}
