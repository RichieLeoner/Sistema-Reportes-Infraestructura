<?php

namespace App;

enum TicketStatus: string
{
    case PENDIENTE = 'pendiente';
    case EN_PROCESO = 'en_proceso';
    case RESUELTO = 'resuelto';

    /**
     * Obtener etiqueta legible del estado
     */
    public function label(): string
    {
        return match($this) {
            self::PENDIENTE => 'Pendiente',
            self::EN_PROCESO => 'En Proceso',
            self::RESUELTO => 'Resuelto',
        };
    }

    /**
     * Obtener color del estado (Tailwind CSS)
     */
    public function color(): string
    {
        return match($this) {
            self::PENDIENTE => 'yellow',
            self::EN_PROCESO => 'blue',
            self::RESUELTO => 'green',
        };
    }

    /**
     * Obtener clase CSS para la etiqueta
     */
    public function badgeClass(): string
    {
        return match($this) {
            self::PENDIENTE => 'bg-yellow-100 text-yellow-800',
            self::EN_PROCESO => 'bg-blue-100 text-blue-800',
            self::RESUELTO => 'bg-green-100 text-green-800',
        };
    }

    /**
     * Obtener todos los estados como array para selects
     */
    public static function asArray(): array
    {
        return [
            self::PENDIENTE->value => self::PENDIENTE->label(),
            self::EN_PROCESO->value => self::EN_PROCESO->label(),
            self::RESUELTO->value => self::RESUELTO->label(),
        ];
    }

    /**
     * Verificar si el estado es pendiente
     */
    public function isPending(): bool
    {
        return $this === self::PENDIENTE;
    }

    /**
     * Verificar si el estado es en proceso
     */
    public function isInProgress(): bool
    {
        return $this === self::EN_PROCESO;
    }

    /**
     * Verificar si el estado es resuelto
     */
    public function isResolved(): bool
    {
        return $this === self::RESUELTO;
    }
}
