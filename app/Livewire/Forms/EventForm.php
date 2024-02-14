<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    public ?Event $event;

    public $entity_id;
    public $venue_id;
    public $name;
    public $slug;
    public $description;
    public $scheduled_start;
    public $scheduled_end;
    public $start_date;
    public $end_date;
    public $registration_note;
    public $pre_approval;
    public $max_capacity;
    public $type;
    public $status;

    public function setEvent(Event $event)
    {
        $this->entity_id = $event->entity_id;
        $this->venue_id = $event->venue_id;
        $this->name = $event->name;
        $this->slug = $event->slug;
        $this->description = $event->description;
        $this->scheduled_start = $event->scheduled_start;
        $this->scheduled_end = $event->scheduled_end;
        $this->start_date = $event->start_date;
        $this->end_date = $event->end_date;
        $this->registration_note = $event->registration_note;
        $this->pre_approval = $event->pre_approval;
        $this->max_capacity = $event->max_capacity;
        $this->type = $event->type;
        $this->status = $event->status;
    }

    public function store()
    {
        //$this->validate();
        // Store the event
    }

    public function update()
    {
        //$this->validate();
        // Update the event
    }
}
