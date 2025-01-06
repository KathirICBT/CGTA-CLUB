<?php

namespace App\Livewire\UserPanel\Component;

use Livewire\Component;

class Statistics extends Component
{
    public $stats = [];

    // public function mount()
    // {
    //     $this->stats = [
    //         [
    //             'value' => '415',
    //             'label' => 'Members',
    //             'icon' => 'rocket-launch.svg', // Replace with your icon filename
    //         ],
    //         [
    //             'value' => '75',
    //             'label' => 'Women-Led Businesses',
    //             'icon' => 'team.svg', // Replace with your icon filename
    //         ],
    //         [
    //             'value' => '24',
    //             'label' => 'Workshops & Seminars',
    //             'icon' => 'workshop.svg', // Replace with your icon filename
    //         ],
    //         [
    //             'value' => '$50K',
    //             'label' => 'Raised for Community',
    //             'icon' => 'donation.svg', // Replace with your icon filename
    //         ],
    //     ];
    // }

    public function mount()
{
    $this->stats = [
        [
            'value' => '415',
            'label' => 'Members',
            'icon' => 'fas fa-rocket',
        ],
        [
            'value' => '75',
            'label' => 'Women-Led Businesses',
            'icon' => 'fas fa-users',
        ],
        [
            'value' => '24',
            'label' => 'Workshops & Seminars',
            'icon' => 'fas fa-chalkboard-teacher',
        ],
        [
            'value' => '$50K',
            'label' => 'Raised for Community',
            'icon' => 'fas fa-hand-holding-usd',
        ],
    ];
}

    
    public function render()
    {
        return view('livewire.user-panel.component.statistics');
    }
}
