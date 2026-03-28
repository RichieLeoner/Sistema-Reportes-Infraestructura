<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que se pueden llenar masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * Campos ocultos (no se muestran en JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Convertir campos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación: Un usuario pertenece a un rol
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relación: Un usuario tiene muchos tickets
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Relación: Un usuario tiene muchas notificaciones
     * Nota: Usamos notifiable (polimórfica) en lugar de user_id
     */
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable');
    }

    /**
     * Relación: Un usuario tiene notificaciones leídas
     */
    public function readNotifications()
    {
        return $this->notifications()->whereNotNull('read_at');
    }

    /**
     * Relación: Un usuario tiene notificaciones no leídas
     */
    public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }

    /**
     * Helper: Verificar si es admin
     */
    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    /**
     * Helper: Verificar si es mantenimiento
     */
    public function isMaintenance()
    {
        return $this->role_id == 2;
    }

    /**
     * Helper: Verificar si es usuario normal
     */
    public function isUser()
    {
        return $this->role_id == 3;
    }
}
