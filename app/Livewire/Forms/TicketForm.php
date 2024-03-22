<?php

namespace App\Livewire\Forms;

use App\Models\Ticket;
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

    public function addTicket($ticket = null)
    {
        // Add the new ticket to the $tickets array
        $this->tickets[] = $ticket ?? [
            'name' => 'Novo Bilhete',
            'description' => '',
            'max_check_in' => 0,
            'max_tickets_per_order' => 0,
            'price' => 0,
            'currency' => 'EUR',
            'sessions' => [],
        ];
    }

    public function removeTicket($id)
    {
        unset($this->tickets[$id]);
        $this->tickets = array_values($this->tickets);
    }

    public function store(int $event_id)
    {
        $tickets = [];
        foreach ($this->tickets as $t) {
            $tickets = $this->create($t, $event_id, $tickets);
        }
        return $tickets;
    }

    public function create($t, $event_id, $tickets) {
        $ticket = new Ticket($t);
        $ticket->event_id = $event_id;
        $ticket->save();
        $tickets[] = $ticket;
        return $tickets;
    }

    public function update($event_id)
    {
        $tickets = [];
        foreach ($this->tickets as $t) {
            // if the ticket doesn't exist, create it
            if (!isset($t['id'])) {
                $tickets = $this->create($t, $event_id, $tickets);
                continue;
            }

            $ticket = Ticket::find($t['id']);
            $ticket->fill($t);
            $ticket->save();
            $tickets[] = $ticket;
        }
        return $tickets;
    }
}
