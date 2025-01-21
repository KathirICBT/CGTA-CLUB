<?php

namespace App\Livewire\UserPanel\Component;

use Livewire\Component;

class CardComp extends Component
{
    public $datas = [];
    public $heading = '';


    public function mount($datas, $heading): void
    {
        // Initialize data and headers
        $this->datas = $datas;
        $this->heading = $heading;
    }

    public function render()
    {
        return view('livewire.user-panel.component.card-comp');
    }
}
