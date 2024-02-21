<?php

namespace App\Livewire\Forms;

use App\Models\EventSessions;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventSessionForm extends Form
{
    public array $sessions = [];

    public $event_id;
    public $name;
    public $slug;
    public $description;
    public $max_capacity;
    public $start_date;
    public $end_date;
    public $rrule;
    public $type;
    public $status;

    public function addSession() {
        // Create a new instance of the EventSession model with default values
        $session = new EventSessions();

        $this->name = '';
        $this->description = '';
        $this->max_capacity = 0;
        $this->start_date = now();
        $this->end_date = now();
        $this->rrule = '';
        $this->type = 0;

        // Add the new sessions to the $sessions array
        $this->sessions[] = $session;
    }

    public function removeSession($id) {
        unset($this->sessions[$id]);
        $this->sessions = array_values($this->sessions);
    }
}
