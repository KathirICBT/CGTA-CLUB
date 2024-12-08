<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BirthdayNotificationAlert extends Notification
{
    use Queueable;

    protected $member;
    protected $templateText;
    protected $notificationTemplateId;


    /**
     * Create a new notification instance.
     */
    public function __construct($member, $templateText, $notificationTemplateId)
    {
        error_log(' ');  // Template ID
        error_log('--------------------------');  // Template ID
        error_log('--------------------------');  // Template ID
        error_log('member ID from BirthdayNotificationAlert(): ' . $member);  // Template ID
        error_log('templeText from BirthdayNotificationAlert(): ' . $templateText);  // Template ID
        error_log('Template ID from BirthdayNotificationAlert(): ' . $notificationTemplateId);  // Template ID

        $this->member = $member;
        $this->templateText = $templateText;
        $this->notificationTemplateId = $notificationTemplateId; // Store the template ID

    }


    public function via($notifiable): array
    {
        return ['database'];
        // return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->subject('Happy Birthday ' . $this->member->full_name)
    //                 ->line($this->templateText)  // The template content with member’s name
    //                 ->action('Wish them Happy Birthday', url('/members/' . $this->member->id));
    // }

    // Store the notification in the database
    public function toDatabase($notifiable)
    {
        // Assuming TemplateData comes as a JSON string, we need to convert it to an array
        $templateData = json_encode(['birthdayUserName' => $this->member->first_name]);
        error_log('--------------------------');  // Template ID
        error_log('--------------------------');  // Template ID
        error_log('member ID from toDatabase(): ' . $this->member->id);  // Template ID
        error_log('templeText from toDatabase(): ' . $this->templateText);  // Template ID
        error_log('notificationTemplateId from toDatabase(): ' . $this->notificationTemplateId);  // Template ID
        error_log('Data type of notificationTemplateId: ' . gettype($this->notificationTemplateId));  // Log the type
        error_log('Template Data from toDatabase(): ' . $templateData);  

        
        $notificationData = [
            'memberId' => $this->member->id,  // member ID
            'NotificationTemplateId' =>(int) $this->notificationTemplateId,  // Template ID
            'TemplateData' => json_encode($templateData),  // The dynamic data in array format
            'is_read' => false,  // By default, the notification is unread
            'sent_at' => now()->toDateTimeString(),  // Timestamp when the notification was sent
            'read_at' => null,  // Initially null since the notification is unread
        ];

        // Log the complete array to inspect it
        error_log('Notification Data Array: ' . print_r($notificationData, true));

        // Return the array for Laravel to process
        return $notificationData;

    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
