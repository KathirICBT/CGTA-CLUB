<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BirthdayAnnouncementNotification extends Notification
{
    use Queueable;
    protected $birthdayMembers;

    /**
     * Create a new notification instance.
     */
    public function __construct($birthdayMembers)
    {
        $this->birthdayMembers = $birthdayMembers;
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
        $memberNames = implode(', ', $this->birthdayMembers);

        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line("Today is the birthday of: $memberNames")
                    ->action('View Members', url('/')) // memberNames profile line "plural" should be implemented here
                    ->line('Join us in wishing them a happy birthday!');
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
