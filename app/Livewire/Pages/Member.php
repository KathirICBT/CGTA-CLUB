<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Member extends Component
{
    public $headers = [
        'ID',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Date of Birth'
    ];

    public $members = [
        [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123-456-7890',
            'date_of_birth' => '1990-01-01',
        ],
        [
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '987-654-3210',
            'date_of_birth' => '1995-05-15',
        ],
        // Add more test data as needed
    ];

    public function render()
    {
        return view('livewire.pages.member', [
            'headers' => $this->headers,
            'members' => $this->members,
        ]);
    }
}
