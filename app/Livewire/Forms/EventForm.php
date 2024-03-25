<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Carbon\Carbon;
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
            'id' => $ev->id ?? null,
            'entity_id' => $ev->entity_id ?? auth()->user()->entities->first()->id,
            'venue_id' => $ev->venue_id ?? 0,
            'name' => $ev->name ?? 'Evento padrão',
            'description' => $ev->description ?? '',
            'scheduled_start' => $ev->scheduled_start ?? Carbon::now()->format('Y-m-d'),
            'scheduled_end' => $ev->scheduled_end ?? Carbon::now()->format('Y-m-d'),
            'start_date' => $ev->start_date ?? Carbon::now()->format('Y-m-d'),
            'end_date' => $ev->end_date ?? Carbon::now()->format('Y-m-d'),
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
        // TODO: validate event fields
        $event = Event::find($this->event['id']);
        $event->fill($this->event);
        $event->save();
        return $event;
    }
}
