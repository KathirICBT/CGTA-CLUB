<?php

namespace App\Livewire\UserPanel\Component;

use Livewire\Component;

class Button extends Component
{
    public $label;
    public $iconURL;
    public $url;
    public $color;
    public $hoverColor;

    public function mount($label = 'Click Me', $iconURL = null, $url = '/', $color = '#007bff')
    {
        $this->label = $label;
        $this->iconURL = $iconURL;
        $this->url = $url;
        $this->color = $color;
        $this->hoverColor = $this->darkenColor($color, 15); // Calculate hover color
    }

    private function darkenColor($hex, $percent)
    {
        // Convert HEX to RGB
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        // Darken RGB values
        $r = max(0, $r - ($r * $percent / 100));
        $g = max(0, $g - ($g * $percent / 100));
        $b = max(0, $b - ($b * $percent / 100));

        // Convert back to HEX
        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }
    
    public function render()
    {
        return view('livewire.user-panel.component.button');
    }
}
