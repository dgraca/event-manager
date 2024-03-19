<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    public array $event;

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

    public function setEvent(Event $ev)
    {
        $this->event = [
            'entity_id' => $ev->entity_id ?? auth()->user()->entities->first()->id,
            'venue_id' => $ev->venue_id ?? 0,
            'name' => $ev->name ?? 'Evento padrão',
            'description' => $ev->description ?? '',
            'scheduled_start' => $ev->scheduled_start ?? now(),
            'scheduled_end' => $ev->scheduled_end ?? now(),
            'start_date' => $ev->start_date ?? now(),
            'end_date' => $ev->end_date ?? now(),
            'registration_note' => $ev->registration_note ?? '',
            'pre_approval' => $ev->pre_approval ?? 0,
            'max_capacity' => $ev->max_capacity ?? 0,
            'type' => $ev->type ?? 0,
            'status' => $ev->status ?? 0,
        ];
    }

    public function store()
    {
        // create new instance of event
        // TODO: validate event fields
        $event = new Event($this->event);
        $event->save();
        return $event;
    }

    public function update() {
        // TODO: update event here
    }
}
