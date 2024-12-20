<?php

namespace App\Livewire\Components\UserDeletion;

use Livewire\Component;

class UserDeletion extends Component
{
    public $confirmingUserDeletion = false;
    public $password;
    public $banner;
    public $bannerStyle;

    public function confirmUserDeletion()
    {
        error_log('confirmingUserDeletion is triggered');
//        // Clear any existing notifications
//        $this->banner = null;
//        $this->bannerStyle = null;
        $this->confirmingUserDeletion = true;
    }


    public function deleteUser()
    {
        // Perform user deletion logic
        $this->confirmingUserDeletion = false;
    }

    public function render()
    {
        return view('livewire.components.user-deletion.user-deletion');
    }
}
