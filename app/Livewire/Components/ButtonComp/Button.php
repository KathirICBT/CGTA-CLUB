<?php

namespace App\Livewire\Components\ButtonComp;

use Livewire\Component;

class Button extends Component
{
    public string $type = '';  // 'edit' or 'delete'
    public bool $icon = false; // Whether to show an icon
    public ?string $text = null; // Optional button text
    public $id;
    public ?string $href = null;  // Optional link for the button

    public function mount($type, $icon = null, $text = null, $id = null, $href = null)
    {
        $this->type = $type;
        $this->icon = $icon;
        $this->text = $text;
        $this->id = $id;
        $this->href = $href; // Initialize href

        // Debugging: Log the received ID
        error_log('Button ID: ' . $this->id);
    }

    public function emitAction()
    {
        error_log('emitAction is triggered: ');
        error_log("ID being emitted: $this->id");

        // Emit the action based on the button type
        if ($this->type === 'edit') {
            error_log('emitAction edit is triggered: ');
            $this->dispatch('edit', $this->id);  // Emit the event for editing the member
        } elseif ($this->type === 'delete') {
            $this->dispatch('delete', $this->id);  // Emit the event for deleting the member
        }
    }

    public function render()
    {
        return view('livewire.components.button-comp.button');
    }
}
