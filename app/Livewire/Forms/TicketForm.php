<?php

namespace App\Livewire\Forms;

use App\Models\Tickets;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TicketForm extends Form
{
    public array $tickets = [];

    public $event_id;
    public $zone_id;
    public $name;
    public $description;
    public $max_check_in;
    public $max_tickets_per_order;
    public $price;
    public $currency;

    public function addTicket()
    {
        // Create a new instance of the Ticket model with default values
        $ticket = new Tickets();

        $ticket->event_id = 0;
        $ticket->zone_id = 0;
        $ticket->name = '';
        $ticket->description = '';
        $ticket->max_check_in = 0;
        $ticket->max_tickets_per_order = 0;
        $ticket->price = 0;
        $ticket->currency = 'EUR';

        // Add the new ticket to the $tickets array
        $this->tickets[] = $ticket;
    }

    public function removeTicket($id)
    {
        unset($this->tickets[$id]);
        $this->tickets = array_values($this->tickets);
    }
}
