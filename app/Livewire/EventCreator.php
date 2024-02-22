<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use App\Livewire\Forms\EventSessionForm;
use App\Livewire\Forms\TicketForm;
use App\Models\Event;
use App\Models\Tickets;
use App\Models\Venue;
use Livewire\Attributes\On;
use Livewire\Component;

class EventCreator extends Component
{
    public EventForm $eventForm;
    public EventSessionForm $eventSessionForm;
    public TicketForm $ticketForm;

    public $event;
    public ?Venue $venue;
    public $venues;
    public $eventSessions;
    public $tickets;
    public $zones;

    /* component lifecycle */
    public function mount(Event $event)
    {
        $this->eventForm->setEvent($event);
        $this->venue = new Venue();
        $this->venues = auth()->user()->entities()->first()->venues()->get();
        $this->event = $event;

        $this->eventSessions = $this->eventSessionForm->sessions;
        $this->tickets = $this->ticketForm->tickets;
    }

    #[On('venue-created')]
    public function refreshVenues()
    {
        $this->venues = auth()->user()->entities()->first()->venues()->get(); // Get fresh venues
    }

    /* Forms methods */
    public function addSession() {
        $this->eventSessionForm->addSession();
    }

    public function removeSession(int $id) {
        $this->eventSessionForm->removeSession($id);
    }

    public function addTicket()
    {
        $this->ticketForm->addTicket();
    }

    public function removeTicket(int $id)
    {
        $this->ticketForm->removeTicket($id);
    }

    /**
     * TODO: Save the event and its related entities
     * !Maybe this will be segmented in save/update methods
     */
    public function save() {
        dd($this->event);
        // saves the event
        // associates the event with the chosen entity (or default)
        // saves the venue
        // associates the venue with the chosen entity (or default)
        // saves event session(s)
        // saves ticket(s)
        // associates the ticket with its respective event session
        // saves the zone(s)
        // associates the zone with its respective venue
    }

    public function render()
    {
        return view('livewire.event-creator');
    }
}
