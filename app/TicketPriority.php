<?php

namespace App;

enum TicketPriority: string
{
    case BAJA = 'baja';
    case MEDIA = 'media';
    case ALTA = 'alta';

    /**
     * Obtener etiqueta legible de la prioridad
     */
    public function label(): string
    {
        return match($this) {
            self::BAJA => 'Baja',
            self::MEDIA => 'Media',
            self::ALTA => 'Alta',
        };
    }

    /**
     * Obtener color de la prioridad (Tailwind CSS)
     */
    public function color(): string
    {
        return match($this) {
            self::BAJA => 'gray',
            self::MEDIA => 'blue',
            self::ALTA => 'red',
        };
    }

    /**
     * Obtener clase CSS para la etiqueta
     */
    public function badgeClass(): string
    {
        return match($this) {
            self::BAJA => 'bg-gray-100 text-gray-800',
            self::MEDIA => 'bg-blue-100 text-blue-800',
            self::ALTA => 'bg-red-100 text-red-800',
        };
    }

    /**
     * Obtener todas las prioridades como array para selects
     */
    public static function asArray(): array
    {
        return [
            self::BAJA->value => self::BAJA->label(),
            self::MEDIA->value => self::MEDIA->label(),
            self::ALTA->value => self::ALTA->label(),
        ];
    }

    /**
     * Verificar si la prioridad es baja
     */
    public function isLow(): bool
    {
        return $this === self::BAJA;
    }

    /**
     * Verificar si la prioridad es media
     */
    public function isMedium(): bool
    {
        return $this === self::MEDIA;
    }

    /**
     * Verificar si la prioridad es alta
     */
    public function isHigh(): bool
    {
        return $this === self::ALTA;
    }
}
