<?php

namespace App\Notifications;

use App\Models\Vacante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( public Vacante $vacante ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via( $notifiable )
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable )
    {
        return ( new MailMessage )
            ->line( 'Has recibido un nuevo candidato para la vacante: ' )
            ->line( $this->vacante->titulo )
            ->action( 'Ver candidatos', url( route( 'vacantes.show', [$this->vacante] ) ) )
            ->line( 'Gracias por usar nuestra aplicación' );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray( $notifiable )
    {
        return [
            //
        ];
    }
}
