<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use Illuminate\Support\Carbon;
use App\Notifications\BirthdayNotification; // Import the Notification
use App\Notifications\BirthdayAnnouncementNotification; // Import the Notification
use Illuminate\Support\Facades\Notification;



class BirthdayNotificationCommand extends Command
{

    protected $signature = 'birthday:notify';
    protected $description = 'Send birthday notifications to members and announcements to others';


    public function handle()
    {
        // Add this to see if the command is being executed
        $this->info('Birthday notification command is running.');

        // Get today's date formatted as month and day
        $today = Carbon::now()->format('m-d');

        // Fetch members whose birthday matches today
        $membersWithBirthday = Member::whereRaw('DATE_FORMAT(date_of_birth, "%m-%d") = ?', [$today])->get();

        // Check if any members have a birthday today
        if ($membersWithBirthday->isEmpty()) {
            $this->info('No members have birthdays today.');
            return; // Exit if no birthdays are found
        }

        // Loop through each member and send a notification
        foreach ($membersWithBirthday as $member) {
            // Send the birthday notification to the member
            $member->notify(new BirthdayNotification($member->first_name));
            $this->info('Sent birthday notification to: ' . $member->first_name . ' ' . $member->last_name);
        }

        // Collect names of birthday members for announcement
        $birthdayMemberNames = $membersWithBirthday->map(function ($member) {
            return $member->first_name . ' ' . $member->last_name;
        })->toArray();

        // Notify all members about today's birthdays
        $nonBirthdayMembers = Member::whereNotIn('id', $membersWithBirthday->pluck('id'))->get();
        Notification::send($nonBirthdayMembers, new BirthdayAnnouncementNotification($birthdayMemberNames));

        $this->info("Sent birthday announcement to all non Birthday Members");

    }
}
