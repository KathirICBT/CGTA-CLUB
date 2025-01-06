<?php

namespace App\Livewire\UserPanel;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.user-panel.landing-page')->layout('components.layouts.user');
    }
}
