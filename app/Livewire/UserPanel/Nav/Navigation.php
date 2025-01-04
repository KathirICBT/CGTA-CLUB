<?php

namespace App\Livewire\UserPanel\Nav;

use Livewire\Component;

class Navigation extends Component
{
    public $links = [];

    public function mount()
    {       

        $this->links = [
            [
                'name' => 'Home',
                'url' => url('/'),
                'subLinks' => [],
            ],
            [
                'name' => 'About Us',
                'url' => url('/about-us'),
                'subLinks' => [],
            ],
            [
                'name' => 'Membership',
                'url' => '#',
                'subLinks' => [
                    ['name' => 'Join', 'url' => url('/membership/join')],
                    ['name' => 'Members', 'url' => url('/membership/members')],
                    ['name' => 'Benefits', 'url' => url('/membership/benefits')],
                    ['name' => 'Resources', 'url' => url('/membership/resources')],
                ],
            ],
            [
                'name' => 'Programs & Services',
                'url' => url('/programs-services'),
                'subLinks' => [],
            ],
            [
                'name' => 'Events',
                'url' => url('/events'),
                'subLinks' => [],
            ],
            [
                'name' => 'Gallery',
                'url' => url('/gallery'),
                'subLinks' => [],
            ],
            [
                'name' => 'Blog',
                'url' => url('/blog'),
                'subLinks' => [],
            ],
            [
                'name' => 'Contact Us',
                'url' => url('/contact-us'),
                'subLinks' => [],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.user-panel.nav.navigation');
    }
}
