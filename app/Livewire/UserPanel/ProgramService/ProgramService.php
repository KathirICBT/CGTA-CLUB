<?php

namespace App\Livewire\UserPanel\ProgramService;

use Livewire\Component;

class ProgramService extends Component
{

    public $sections = [
        [
            'title' => 'Start-up Strategies',
            'content' => 'Congratulations on starting your new business. You don’t have to feel overwhelmed with all the details. We will help you determine what you need to run a cost effective and focused strategy to reach your goals.',
            'image' => 'https://connectinggta.com/wp-content/uploads/2024/04/strategies.jpg',
            'reverse' => false // Image on the right
        ],
        [
            'title' => 'One on One Coaching',
            'content' => 'Starting a business can pull you in many directions which can cause confusion. We will provide personalized coaching to help you stay on track with your goals, plans and strategies. With ‘one on one’ coaching you will gain confidence that your business is on the road to success.',
            'image' => 'https://connectinggta.com/wp-content/uploads/2024/04/coaching.jpg',
            'reverse' => true // Image on the left
        ],
        [
            'title' => 'Grant & Proposal Writing',
            'content' => 'There are many Government funding programs available to help businesses get off the ground. Writing a grant proposal requires a specific skill to create a targeted proposal to receive approval. We can help you with that so you can focus on your business needs.',
            'image' => 'https://connectinggta.com/wp-content/uploads/2024/04/writing.jpg',
            'reverse' => false // Image on the right
        ],
        [
            'title' => 'LinkedIn Optimization',
            'content' => 'There are many Government funding programs available to help businesses get off the ground. Writing a grant proposal requires a specific skill to create a targeted proposal to receive approval. We can help you with that so you can focus on your business needs.',
            'image' => 'https://connectinggta.com/wp-content/uploads/2024/04/linkedin.jpg',
            'reverse' => true // Image on the left
        ],
    ];


    public function render()
    {
        return view('livewire.user-panel.program-service.program-service');
    }
}
