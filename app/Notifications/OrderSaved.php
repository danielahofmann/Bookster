<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderSaved extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
	    return (new MailMessage)
		    ->subject('Bestätigung der Bestellung')
		    ->greeting('Bestellungsbestätigung')
		    ->line('Hallo,')
		    ->line('Vielen Dank das du bei bookster bestellt hast. Wir haben die Einverständniserklärung bereits an deine Eltern gesendet und warten nun auf deren Bestätigung. Bitte beachte, dass die Bestellung erst nach Eingang der Einverständniserklärung bearbeitet wird.')
		    ->line('Falls es sich hierbei um einen Fehler handelt, bitten wir diese E-Mail zu ignorieren.');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
