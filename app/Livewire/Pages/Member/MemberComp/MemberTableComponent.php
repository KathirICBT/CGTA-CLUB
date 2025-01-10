<?php

namespace App\Livewire\Pages\Member\MemberComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Component;

class MemberTableComponent extends Component
{
    // Property to hold data (usually passed from parent)
    public $members = [];

    // Property to hold table headers, can be defined based on data
    public array $headers = [];

    #[On('edit')]
    public function editMember($id)
    {
        // Log the ID and form type for testing
        error_log("Dispatching member-edit with ID: $id");

        // Redirect to the MemberForm route with the ID as a parameter
        return Redirect::route('member-form', ['id' => $id]);
    }


    // If you want to handle sorting or other actions, you can add methods or properties for those too.
    public function mount($members, $headers = []): void
    {
        // Initialize data and headers
        $this->members = $members;
        $this->headers = $headers;

        // Log the data along with its type
        foreach ($this->members as $key => $member) {
            error_log("Key: $key, Type: " . gettype($member) . ", Value: " . print_r($member, true));
        }
    }

    public function render()
    {
        return view('livewire.pages.member.member-comp.member-table-component');
    }
}
