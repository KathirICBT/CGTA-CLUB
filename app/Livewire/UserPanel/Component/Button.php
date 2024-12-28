<?php

namespace App\Livewire\UserPanel\Component;

use Livewire\Component;

class Button extends Component
{
    // CALLING BUTTON COMPONENT - WITH TEXT COLOR =======================================

    // public $label;
    // public $iconURL;
    // public $url;
    // public $color;
    // public $hoverColor;
    // public $textColor;

    // public function mount($label = 'Click Me', $iconURL = null, $url = '/', $color = '#007bff', $textColor = '#ffffff')
    // {
    //     $this->label = $label;
    //     $this->iconURL = $iconURL;
    //     $this->url = $url;
    //     $this->color = $color;
    //     $this->textColor = $textColor;
    //     $this->hoverColor = $this->darkenColor($color, 15); // Calculate hover color
    // }

    // private function darkenColor($hex, $percent)
    // {
    //     // Convert HEX to RGB
    //     $hex = str_replace('#', '', $hex);
    //     $r = hexdec(substr($hex, 0, 2));
    //     $g = hexdec(substr($hex, 2, 2));
    //     $b = hexdec(substr($hex, 4, 2));

    //     // Darken RGB values
    //     $r = max(0, $r - ($r * $percent / 100));
    //     $g = max(0, $g - ($g * $percent / 100));
    //     $b = max(0, $b - ($b * $percent / 100));

    //     // Convert back to HEX
    //     return sprintf('#%02x%02x%02x', $r, $g, $b);
    // }

    //=============================================================
    // CALLING BUTTON COMPONENT - AUTO TEXT COLOR =================

    // public $label;
    // public $iconURL;
    // public $url;
    // public $color;
    // public $hoverColor;
    // public $textColor;

    // public function mount($label = 'Click Me', $iconURL = null, $url = '/', $color = '#007bff')
    // {
    //     $this->label = $label;
    //     $this->iconURL = $iconURL;
    //     $this->url = $url;
    //     $this->color = $color;
    //     $this->hoverColor = $this->darkenColor($color, 15); // Calculate hover color
    //     $this->textColor = $this->getTextColorBasedOnBackground($color); // Determine text color
    // }

    // private function darkenColor($hex, $percent)
    // {
    //     // Convert HEX to RGB
    //     $hex = str_replace('#', '', $hex);
    //     $r = hexdec(substr($hex, 0, 2));
    //     $g = hexdec(substr($hex, 2, 2));
    //     $b = hexdec(substr($hex, 4, 2));

    //     // Darken RGB values
    //     $r = max(0, $r - ($r * $percent / 100));
    //     $g = max(0, $g - ($g * $percent / 100));
    //     $b = max(0, $b - ($b * $percent / 100));

    //     // Convert back to HEX
    //     return sprintf('#%02x%02x%02x', $r, $g, $b);
    // }

    // private function getTextColorBasedOnBackground($hex)
    // {
    //     // Convert HEX to RGB
    //     $hex = str_replace('#', '', $hex);
    //     $r = hexdec(substr($hex, 0, 2));
    //     $g = hexdec(substr($hex, 2, 2));
    //     $b = hexdec(substr($hex, 4, 2));

    //     // Calculate brightness (standard formula)
    //     $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

    //     // Return black text for light background, white text for dark background
    //     return $brightness > 155 ? '#000000' : '#ffffff';
    // }

    // ============================================================================
    // CALLING BUTTON COMPONENT - AUTO TEXT COLOR - font awesome ICON =============

    // public $label;
    // public $icon;
    // public $url;
    // public $color;
    // public $hoverColor;
    // public $textColor;

    // public function mount($label = 'Click Me', $icon = null, $url = '/', $color = '#007bff')
    // {
    //     $this->label = $label;
    //     $this->icon = $icon;
    //     $this->url = $url;
    //     $this->color = $color;
    //     $this->hoverColor = $this->darkenColor($color, 15); // Calculate hover color
    //     $this->textColor = $this->getTextColorBasedOnBackground($color); // Determine text color
    // }

    // private function darkenColor($hex, $percent)
    // {
    //     // Convert HEX to RGB
    //     $hex = str_replace('#', '', $hex);
    //     $r = hexdec(substr($hex, 0, 2));
    //     $g = hexdec(substr($hex, 2, 2));
    //     $b = hexdec(substr($hex, 4, 2));

    //     // Darken RGB values
    //     $r = max(0, $r - ($r * $percent / 100));
    //     $g = max(0, $g - ($g * $percent / 100));
    //     $b = max(0, $b - ($b * $percent / 100));

    //     // Convert back to HEX
    //     return sprintf('#%02x%02x%02x', $r, $g, $b);
    // }

    // private function getTextColorBasedOnBackground($hex)
    // {
    //     // Convert HEX to RGB
    //     $hex = str_replace('#', '', $hex);
    //     $r = hexdec(substr($hex, 0, 2));
    //     $g = hexdec(substr($hex, 2, 2));
    //     $b = hexdec(substr($hex, 4, 2));

    //     // Calculate brightness (standard formula)
    //     $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

    //     // Return black text for light background, white text for dark background
    //     return $brightness > 155 ? '#000000' : '#ffffff';
    // }


    //================================================================================
    // CALLING BUTTON COMPONENT - AUTO TEXT COLOR - WITH ALT MESSAGE =================

    public $label;
    public $iconURL;
    public $iconAlt;
    public $url;
    public $color;
    public $hoverColor;
    public $textColor;

    public function mount($label = 'Click Me', $iconURL = null, $iconAlt = 'Icon', $url = '/', $color = '#007bff')
    {
        $this->label = $label;
        $this->iconURL = $iconURL;
        $this->iconAlt = $iconAlt;
        $this->url = $url;
        $this->color = $color;
        $this->hoverColor = $this->darkenColor($color, 15); // Calculate hover color
        $this->textColor = $this->getTextColorBasedOnBackground($color); // Determine text color
    }

    private function darkenColor($hex, $percent)
    {
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $r = max(0, $r - ($r * $percent / 100));
        $g = max(0, $g - ($g * $percent / 100));
        $b = max(0, $b - ($b * $percent / 100));

        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    private function getTextColorBasedOnBackground($hex)
    {
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

        return $brightness > 155 ? '#000000' : '#ffffff';
    }
    
    public function render()
    {
        return view('livewire.user-panel.component.button');
    }
}
