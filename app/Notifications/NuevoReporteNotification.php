<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoReporteNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Ticket $ticket;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
            ->subject('📬 Nuevo Reporte Creado')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Se ha creado un nuevo reporte de infraestructura.')
            ->line('Ubicación: ' . $this->ticket->location)
            ->line('Prioridad: ' . $this->ticket->priority->label())
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
            'priority' => $this->ticket->priority->value,
            'status' => $this->ticket->status->value,
            'message' => 'Se ha creado un nuevo reporte en: ' . $this->ticket->location,
            'url' => '/reportes/' . $this->ticket->id,
            'type' => 'nuevo_reporte',
        ];
    }
}
