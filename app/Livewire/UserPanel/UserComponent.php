<?php

namespace App\Livewire\UserPanel;

use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        return view('livewire.user-panel.user-component')->layout('components.layouts.user');
    }
}
