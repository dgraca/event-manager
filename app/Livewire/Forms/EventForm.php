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
    public $status;

    public function rules()
    {
        return [
            'event.venue_id' => 'required|integer',
            'event.name' => 'required|string|max:255',
            'event.description' => 'nullable|string|max:65535',
            'event.scheduled_start' => 'required',
            'event.scheduled_end' => 'required',
            'event.start_date' => 'required',
            'event.end_date' => 'required',
            'event.registration_note' => 'nullable|string|max:65535',
            'event.status' => 'required|integer',
        ];
    }

    public function setEvent(Event $ev)
    {
        $this->event = [
            'id' => $ev->id ?? null,
            'entity_id' => $ev->entity_id ?? auth()->user()->entities->first()->id,
            'venue_id' => $ev->venue_id ?? null,
            'name' => $ev->name ?? 'Evento padrão',
            'description' => $ev->description ?? '',
            'scheduled_start' => $ev->scheduled_start?->format('Y-m-d H:i') ?? Carbon::now()->format('Y-m-d H:i'),
            'scheduled_end' => $ev->scheduled_end?->format('Y-m-d H:i') ?? Carbon::now()->format('Y-m-d H:i'),
            'start_date' => $ev->start_date?->format('Y-m-d H:i') ?? Carbon::now()->format('Y-m-d H:i'),
            'end_date' => $ev->end_date?->format('Y-m-d H:i') ?? Carbon::now()->format('Y-m-d H:i'),
            'registration_note' => $ev->registration_note ?? '',
            'pre_approval' => $ev->pre_approval ?? 0,
            'status' => $ev->status ?? null,
        ];
    }

    public function store()
    {
        // validate event fields
        $this->validate(attributes: \App\Models\Event::dynamicAttributeLabels());

        // create new instance of event
        $event = new Event($this->event);
        $event->save();
        return $event;
    }

    public function update() {
        // validate event fields
        $this->validate(attributes: \App\Models\Event::dynamicAttributeLabels());

        // find event by ID and update it
        $event = Event::find($this->event['id']);
        $event->fill($this->event);
        $event->save();
        return $event;
    }
}
