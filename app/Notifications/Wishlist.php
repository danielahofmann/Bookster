<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Wishlist extends Notification
{
    use Queueable;

	public $wishlist;

	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($wishlist)
	{
		$this->wishlist = $wishlist;
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
	        ->subject('Ihre Wunschliste')
	        ->greeting('Zusendung Ihrer Wunschliste')
	        ->line('Dies sind die Produkte auf Ihrer Wunschliste: ' . $this->wishlist->totalQuantity)
	        ->action('zu bookster', url('/'))
	        ->line('Wenn Sie dem Link folgen, gelangen Sie zu unserem Onlineshop.');
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
