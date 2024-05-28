<?php

namespace App\Livewire;

use App\Models\AccessTicket;
use Livewire\Component;

class ValidateTransactions extends Component
{
    public $transactions = [];
    public $paid = [];
    public $approved = [];

    public function mount($transactions) {
        // $this->transactions should only have the transactions
        // that are not "deleted"
        $this->transactions = $transactions->filter(function ($transaction) {
            return !$transaction->deleted;
        });

        // Initialize the paid and approved arrays
        // with the values from the transactions
        foreach ($this->transactions as $transaction) {
            $this->paid[] = $transaction->paid;
            $this->approved[] = $transaction->approved;
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
        $this->transactions[$property]->paid = $value ? 1 : 0;
        $this->transactions[$property]->save();
    }

    public function updateApproved($property, $value) {
        // Remove "approved." from the property name
        $property = str_replace('approved.', '', $property);

        // Update the access ticket "approved" attribute
        $this->transactions[$property]->approved = $value ? 1 : 0;
        $this->transactions[$property]->save();
    }

    public function render()
    {
        return view('livewire.validate-access-tickets');
    }
}
