<?php

namespace App\Livewire\UserPanel\CustomerReview;

use Livewire\Component;

class CustReview extends Component
{

    public $profiles = [
        [
            'name' => 'Parag Agrawal',
            'title' => 'CEO of Twitter',
            'image' => 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg',
            'bio' => 'Enim neque volutpat ac tincidunt vitae semper. Mattis aliquam faucibus purus in massa tempor. Neque vitae tempus quam pellentesque nec. Turpis cursus in hac habitasse platea dictumst.',
            'link' => 'https://twitter.com/paraga'
        ],
        [
            'name' => 'Satya Nadella',
            'title' => 'CEO of Microsoft',
            'image' => 'https://example.com/satya.jpg',
            'bio' => 'Satya Nadella leads Microsoft as its CEO, empowering individuals and businesses to achieve more.',
            'link' => 'https://twitter.com/satyanadella'
        ],
        [
            'name' => 'Parag Agrawal',
            'title' => 'CEO of Twitter',
            'image' => 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg',
            'bio' => 'Enim neque volutpat ac tincidunt vitae semper. Mattis aliquam faucibus purus in massa tempor. Neque vitae tempus quam pellentesque nec. Turpis cursus in hac habitasse platea dictumst.',
            'link' => 'https://twitter.com/paraga'
        ],
        [
            'name' => 'Satya Nadella',
            'title' => 'CEO of Microsoft',
            'image' => 'https://example.com/satya.jpg',
            'bio' => 'Satya Nadella leads Microsoft as its CEO, empowering individuals and businesses to achieve more.',
            'link' => 'https://twitter.com/satyanadella'
        ],
        [
            'name' => 'Parag Agrawal',
            'title' => 'CEO of Twitter',
            'image' => 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg',
            'bio' => 'Enim neque volutpat ac tincidunt vitae semper. Mattis aliquam faucibus purus in massa tempor. Neque vitae tempus quam pellentesque nec. Turpis cursus in hac habitasse platea dictumst.',
            'link' => 'https://twitter.com/paraga'
        ],
        [
            'name' => 'Satya Nadella',
            'title' => 'CEO of Microsoft',
            'image' => 'https://example.com/satya.jpg',
            'bio' => 'Satya Nadella leads Microsoft as its CEO, empowering individuals and businesses to achieve more.',
            'link' => 'https://twitter.com/satyanadella'
        ],
    ];



    public function render()
    {
        return view('livewire.user-panel.customer-review.cust-review');
    }
}
