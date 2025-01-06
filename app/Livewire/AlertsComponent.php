<?php

namespace App\Livewire;

use Livewire\Component;

class AlertsComponent extends Component
{
    public function alert($data)    {
        
        $this->dispatch('alert', [
            'title' => $data['title'],
            'message' => $data['message'],
            'type' => $data['type'],
        ]);
    }
    
    public function render()
    {
        return view('livewire.alerts-component');
    }
}
