<?php

namespace App\Livewire\Components\Notification;

use Livewire\Component;

class Notification extends Component
{
    public $banner;
    public $bannerStyle;

    public function mount($banner = null, $bannerStyle = null)
    {
        $this->banner = $banner;
        $this->bannerStyle = $bannerStyle;
    }

    public function clearNotification()
    {
        error_log('method is triggerded');
        $this->banner = null;
        $this->bannerStyle = null;
    }

    public function render()
    {
        return view('livewire.components.notification.notification');
    }
}
