<?php

namespace App\Models;

use App\TicketPriority;
use App\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden llenar masivamente
     */
    protected $fillable = [
        'user_id',
        'location',
        'description',
        'priority',
        'status',
        'photo_path',
    ];

    /**
     * Los casts de atributos
     */
    protected function casts(): array
    {
        return [
            'priority' => TicketPriority::class,
            'status' => TicketStatus::class,
        ];
    }

    /**
     * Relación: Un ticket pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor: Obtener etiqueta legible del estado
     */
    public function getStatusLabelAttribute(): string
    {
        return $this->status->label();
    }

    /**
     * Accessor: Obtener color del estado
     */
    public function getStatusColorAttribute(): string
    {
        return $this->status->color();
    }

    /**
     * Accessor: Obtener clase CSS para la etiqueta del estado
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return $this->status->badgeClass();
    }

    /**
     * Accessor: Obtener etiqueta legible de la prioridad
     */
    public function getPriorityLabelAttribute(): string
    {
        return $this->priority->label();
    }

    /**
     * Accessor: Obtener color de la prioridad
     */
    public function getPriorityColorAttribute(): string
    {
        return $this->priority->color();
    }

    /**
     * Accessor: Obtener clase CSS para la etiqueta de prioridad
     */
    public function getPriorityBadgeClassAttribute(): string
    {
        return $this->priority->badgeClass();
    }

    /**
     * Verificar si el ticket está pendiente
     */
    public function isPending(): bool
    {
        return $this->status->isPending();
    }

    /**
     * Verificar si el ticket está en proceso
     */
    public function isInProgress(): bool
    {
        return $this->status->isInProgress();
    }

    /**
     * Verificar si el ticket está resuelto
     */
    public function isResolved(): bool
    {
        return $this->status->isResolved();
    }

    /**
     * Verificar si la prioridad es alta
     */
    public function isHighPriority(): bool
    {
        return $this->priority->isHigh();
    }

    /**
     * Verificar si la prioridad es media
     */
    public function isMediumPriority(): bool
    {
        return $this->priority->isMedium();
    }

    /**
     * Verificar si la prioridad es baja
     */
    public function isLowPriority(): bool
    {
        return $this->priority->isLow();
    }
}
