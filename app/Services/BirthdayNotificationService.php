<?php

namespace App\Services;

use App\Models\Member;
use App\Models\NotificationTemplate;
use App\Notifications\BirthdayNotificationAlert;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BirthdayNotificationService

{
    // Find members whose birthday is today
    public function findBirthdayMembers()
    {
        // Get today's date formatted as month and day (ignoring the year)
        $today = Carbon::now()->format('m-d');  // Format as 'month-day' (e.g. '11-09')

        // Debug: log today's month and day for checking
        error_log('Today\'s Date (Month-Day): ' . $today);

        // Query to find members whose birthday matches today (month and day)
        $birthdayMembers = Member::whereRaw('DATE_FORMAT(date_of_birth, "%m-%d") = ?', [$today])->get();

        // Debug: log the birthday members found
        error_log('Birthday Members: ' . $birthdayMembers->toJson());

        return $birthdayMembers;

    }
    
    // Get the birthday notification template
    public function getBirthdayTemplate()
    {
        $template = NotificationTemplate::where('type', 'birthday')->first();

        // Check if the template exists
        if (!$template) {
            error_log('Birthday notification template not found!');
            return null;
        }

        return NotificationTemplate::where('type', 'birthday')->first();
    }

    // Get the birthday notification template
    public function getBirthdayWishTemplate()
    {
        $template = NotificationTemplate::where('type', 'birthday_member')->first();

        // Check if the template exists
        if (!$template) {
            error_log('Birthday wish notification template not found!');
            return null;
        }

        return $template;
    }

    // Create a birthday notification message
    public function createBirthdayNotification($member)
    {
        $template = $this->getBirthdayTemplate();

        if (!$template) {
            error_log('Template not found for birthday notification!');
            return null;
        }

        error_log('');
        error_log('---------------------');
        error_log('---------------------');
        error_log('Member First Name: ' . $member->first_name);  // Member's first name
        error_log('Template Text: ' . $template->templateText);  // Template text
        error_log('Template ID: ' . $template->id);  // Template ID
        error_log('createBirthdayNotification(): ' . str_replace('{birthdayUserName}', $member->first_name, $template->templateText));
        error_log('---------------------');
        error_log('---------------------');
        error_log('');



        // Replace the member's name in the template
        return str_replace('{birthdayUserName}', $member->first_name, $template->templateText);
    }

    // Create a birthday notification message
    public function createBirthdayWishNotification($member)
    {
        $template = $this->getBirthdayWishTemplate();

        if (!$template) {
            error_log('Template not found for birthday wish notification!');
            return null;
        }

        error_log('');
        error_log('---------------------');
        error_log('---------------------');
        error_log('Member First Name: ' . $member->first_name);  // Member's first name
        error_log('Template Text: ' . $template->templateText);  // Template text
        error_log('Template ID: ' . $template->id);  // Template ID
        error_log('createBirthdayNotification(): ' . str_replace('{birthdayUserName}', $member->first_name, $template->templateText));
        error_log('---------------------');
        error_log('---------------------');
        error_log('');



        // Replace the member's name in the template
        return str_replace('{birthdayUserName}', $member->first_name, $template->templateText);
    }
    

    // Send birthday notifications to all members with birthdays today
    public function sendBirthdayNotifications()
    {
        $birthdayMembers = $this->findBirthdayMembers();
        $template = $this->getBirthdayTemplate();
        $templateWish = $this->getBirthdayWishTemplate();
        $allMembers = Member::all();

        if ($birthdayMembers->isEmpty()) {
            error_log('No birthday members found today.');
            return;
        }

        $templateText = $this->createBirthdayNotification($birthdayMembers->first());
        $templateTextWish = $this->createBirthdayWishNotification($birthdayMembers->first());

        error_log('Birthday Members from sendBirthdayNotifications(): ' . $birthdayMembers);  // Template ID
        error_log('Template ID from sendNotificationToStore(): ' . $template->id);
        error_log('Template ID from sendNotificationToStore(): ' . $templateWish->id);


        foreach ($birthdayMembers as $birthdayMember) {
            $templateText = $this->createBirthdayNotification($birthdayMember);
            $templateTextWish = $this->createBirthdayWishNotification($birthdayMember);

            $this->sendNotificationToStore($birthdayMember, $templateTextWish, $templateWish->id);
        
            // Filter out birthday members from all members
            $nonBirthdayMembers = $allMembers->whereNotIn('id', $birthdayMembers->pluck('id'));
            error_log(' ');
            error_log('-----------');
            error_log('birthday members: ' . $birthdayMember);
            error_log(' ');
            error_log('-----------');
            foreach ($nonBirthdayMembers as $member) {
                // Notify each member about today's birthday member
                $this->sendNotificationToStore($member, $templateText, $template->id);
                error_log('Non-birthday member notified: ' . $member->id);
            }
        }
        
        error_log('Birthday notifications sent successfully from sendBirthdayNotifications().');
        
    }

    // A helper method to send notification data to the store method
    private function sendNotificationToStore($member, $templateText, $templateId)
    {
        // $url = route('notification.store'); // Assuming you have a route to handle the store method

        error_log(' ');
        error_log('------- sendNotificationToStore()--------');
        error_log('member from sendNotificationToStore(): ' . $member->id);  // Template ID
        error_log('Template ID from sendNotificationToStore(): ' . $templateId);  // Template ID
        error_log(' ');
        // Create an instance of the controller

        $controller = new NotificationController();

        // Directly call the store method
        $controller->store(new Request([
            'memberId' => $member->id,
            'NotificationTemplateId' => $templateId,
            'TemplateData' => json_encode(['birthdayUserName' => $member->first_name]),
            'is_read' => false,
            'sent_at' => now(),
        ]));
    }

}

