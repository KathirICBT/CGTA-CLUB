<?php

namespace App\Livewire\Pages\Member\MemberComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class MemberCard extends Component
{
    // Property to hold data (usually passed from parent)
    public $datas = [];


    public function editMember($id)
    {
        // Log the ID and form type for testing
        error_log("Dispatching member-edit with ID: $id");

        // Redirect to the MemberForm route with the ID as a parameter
        return Redirect::route('member-form', ['id' => $id]);
    }

    public function deleteMember($id): void
    {
        // Log the ID for testing
        error_log("Dispatching member-delete with ID: $id");

        // Dispatch an event with the member's ID
        $this->dispatch('member-delete', id: $id);
    }

    // If you want to handle sorting or other actions, you can add methods or properties for those too.
    public function mount($datas): void
    {
        error_log('mount method in MemberCard is triggered');

        // Initialize data and headers
        $this->datas = $datas;

        // Log the data along with its type
        foreach ($this->datas as $key => $data) {
            error_log("Key: $key, Type: " . gettype($data) . ", Value: " . print_r($data, true));
        }

    }
    public function render()
    {
        return view('livewire.pages.member.member-comp.member-card');
    }
}
