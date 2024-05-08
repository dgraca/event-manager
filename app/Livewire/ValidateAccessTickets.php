<?php

namespace App\Livewire;

use App\Models\AccessTicket;
use Livewire\Component;

class ValidateAccessTickets extends Component
{
    public $accessTickets = [];
    public $paid = [];
    public $approved = [];

    public function mount($accessTickets) {
        $this->accessTickets = $accessTickets;

        // Initialize the paid array with the values of the access tickets "paid" attribute
        // and the approved array with the values of the access tickets "approved" attribute
        foreach ($this->accessTickets as $accessTicket) {
            $this->paid[$accessTicket->id] = $accessTicket->paid ? 1 : 0;
            $this->approved[$accessTicket->id] = $accessTicket->approved ? 1 : 0;
        }
    }

    public function updated($property, $value) {
        // If the property name starts with "paid."
        if (strpos($property, 'paid.') === 0) {
            $this->updatePaid($property, $value);
        }

        // If the property name starts with "approved."
        if (strpos($property, 'approved.') === 0) {
            $this->updateApproved($property, $value);
        }
    }

    public function updatePaid($property, $value) {
        // Remove "paid." from the property name
        $property = str_replace('paid.', '', $property);

        // Update the access ticket "paid" attribute
        $this->accessTickets[$property]->paid = $value ? 1 : 0;
        $this->accessTickets[$property]->save();
    }

    public function updateApproved($property, $value) {
        // Remove "approved." from the property name
        $property = str_replace('approved.', '', $property);

        // Update the access ticket "approved" attribute
        $this->accessTickets[$property]->approved = $value ? 1 : 0;
        $this->accessTickets[$property]->save();
    }

    public function render()
    {
        return view('livewire.validate-access-tickets');
    }
}
