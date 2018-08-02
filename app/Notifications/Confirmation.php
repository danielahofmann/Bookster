<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Confirmation extends Notification
{
    use Queueable;

	protected $order_id;

	/**
     * Create a new notification instance.
     *
     * @return void
     */
	public function __construct($order_id)
	{
		$this->order_id = $order_id;
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
	    $order_id = $this->order_id;

	    return (new MailMessage)
		    ->subject('Einverständniserklärung')
		    ->greeting('Bitte um Einverständniserklärung')
		    ->line('Sehr geehrte Damen und Herren,')
		    ->line('Ihr Kind hat in unserem Onlineshop eine Bestellung getätigt. Diese muss nun innerhalb der nächsten zwei Wochen von Ihnen bestätigt werden, um somit wirksam zu werden. Bis dahin werden wir die Bestellung nicht bearbeiten')
		    ->action('Bestellung bestätigen', route('confirmation', $order_id))
		    ->line('Falls es sich hierbei um einen Fehler handelt, bitten wir Sie diese E-Mail zu ignorieren.');
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
