<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BirthdayNotification extends Notification
{
    use Queueable;
    public $memberName;

    /**
     * Create a new notification instance.
     */
    public function __construct($memberName)
    {
        $this->memberName = $memberName;
    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Happy Birthday, ' . $this->memberName . '!')
                    ->line('Wishing you a wonderful birthday filled with joy and happiness.')
                    ->action('View Your Profile', url('/members/'). $notifiable->id)
                    ->line('Thank you for being a valued member!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
