<?php

namespace App\Livewire\UserPanel\AboutSection;

use Livewire\Component;

class AboutTeam extends Component
{
    public $testimonials = [
        [
            'img' => 'https://connectinggta.com/wp-content/uploads/2024/11/Leslie-Enright-1.jpg',
            'name' => 'John Doe',
            'title' => 'CEO, Company A',
            'quote' => 'This product changed my life!',
        ],
        [
            'img' => 'https://connectinggta.com/wp-content/uploads/2024/12/Daisy-Kaur.jpg',
            'name' => 'Jane Smith',
            'title' => 'Marketing Lead, Company B',
            'quote' => 'Incredible value and amazing support!',
        ],
        [
            'img' => 'https://connectinggta.com/wp-content/uploads/2024/11/Jaden-Kumar.jpg',
            'name' => 'Alice Johnson',
            'title' => 'Developer, Company C',
            'quote' => 'Highly recommended for all professionals!',
        ],
        [
                    'img' => 'https://connectinggta.com/wp-content/uploads/2024/11/Leslie-Enright-1.jpg',
                    'name' => 'John Doe',
                    'title' => 'CEO, Company A',
                    'quote' => 'This product changed my life!',
                ],
                [
                    'img' => 'https://connectinggta.com/wp-content/uploads/2024/12/Daisy-Kaur.jpg',
                    'name' => 'Jane Smith',
                    'title' => 'Marketing Lead, Company B',
                    'quote' => 'Incredible value and amazing support!',
                ],
                [
                    'img' => 'https://connectinggta.com/wp-content/uploads/2024/11/Jaden-Kumar.jpg',
                    'name' => 'Alice Johnson',
                    'title' => 'Developer, Company C',
                    'quote' => 'Highly recommended for all professionals!',
                ],
    ];



    public function render()
    {
        return view('livewire.user-panel.about-section.about-team');
    }
}
