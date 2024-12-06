<?php

namespace App\Console\Commands;

use App\Services\BirthdayNotificationService;


use Illuminate\Console\Command;

class SendBirthdayNotificationAlert extends Command
{

    protected $signature = 'send:birthday-notifications';
    protected $description = 'Send birthday notifications to all members with birthdays today';
    

    protected $birthdayNotificationService;

    public function __construct(BirthdayNotificationService $birthdayNotificationService)
    {
        parent::__construct();
        $this->birthdayNotificationService = $birthdayNotificationService;
    }

    public function handle()
    {
        // Call the sendBirthdayNotifications method from the service class
        $this->birthdayNotificationService->sendBirthdayNotifications();

        $this->info('Birthday notifications task completed!');
    }
}
