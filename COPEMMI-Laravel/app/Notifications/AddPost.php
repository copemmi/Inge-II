<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddPost extends Notification
{
    use Queueable;

    public function __construct(Notificaciones $notificacion)
    {
        $this->notificacion = $notificacion; 
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'data' => 'Tenemos una nueva notificación' .$this->notificacion->titulo. "<br> Agregado por " .auth()->user()->name 
        ];
    }
}
