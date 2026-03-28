<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReporteActualizadoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Ticket $ticket;
    protected string $estadoAnterior;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, string $estadoAnterior)
    {
        $this->ticket = $ticket;
        $this->estadoAnterior = $estadoAnterior;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Guardar en base de datos
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('🔄 Reporte Actualizado')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Tu reporte ha sido actualizado.')
            ->line('Ubicación: ' . $this->ticket->location)
            ->line('Estado anterior: ' . $this->estadoAnterior)
            ->line('Nuevo estado: ' . $this->ticket->status->label())
            ->action('Ver Reporte', url('/reportes/' . $this->ticket->id))
            ->line('Gracias por usar el Sistema de Reportes!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'ticket_id' => $this->ticket->id,
            'location' => $this->ticket->location,
            'old_status' => $this->estadoAnterior,
            'new_status' => $this->ticket->status->value,
            'priority' => $this->ticket->priority->value,
            'message' => 'Tu reporte en "' . $this->ticket->location . '" ha sido actualizado a: ' . $this->ticket->status->label(),
            'url' => '/reportes/' . $this->ticket->id,
            'type' => 'reporte_actualizado',
        ];
    }
}
