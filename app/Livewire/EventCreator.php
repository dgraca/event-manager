<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use App\Livewire\Forms\EventSessionForm;
use App\Livewire\Forms\TicketForm;
use App\Models\Event;
use App\Models\EventSession;
use App\Models\EventSessionTicket;
use App\Models\Ticket;
use App\Models\Venue;
use Livewire\Attributes\On;
use Livewire\Component;
use Mockery\Exception;

class EventCreator extends Component
{
    public EventForm $eventForm;
    public EventSessionForm $eventSessionForm;
    public TicketForm $ticketForm;

    public $event;
    public $venues;

    /* component lifecycle */
    public function mount(Event $event)
    {
        $this->eventForm->setEvent($event);
        $this->venues = auth()->user()->entities()->first()->venues()->get();
        $this->event = $event;

        // initialize both tickets and sessions
        $this->eventSessionForm->addSession([
            'name' => 'Sessão padrão',
            'description' => '',
            'max_capacity' => 0,
            'start_date' => now(),
            'end_date' => now(),
            'type' => 0,
        ]);
        $this->ticketForm->addTicket([
            'name' => 'Bilhete padrão',
            'description' => '',
            'max_check_in' => 0,
            'max_tickets_per_order' => 0,
            'price' => 0,
            'currency' => 'EUR',
            'session_id' => 'session-0',
        ]);
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
        // saves event session(s)
        // saves ticket(s)
        // associates the ticket with its respective event session
        // saves the zone(s)
        // associates the zone with its respective venue

        // if event doesn't have any ID, save event and it's sessions/tickets
        // else: updates all information
        if ($this->event->id === null) {
            // saves the event
            $event = $this->eventForm->store();
            // saves all sessions created
            $sessions = $this->eventSessionForm->store($event->id);
            // save all tickets created
            $tickets = $this->ticketForm->store($event->id);

            // creates EventSessionTicket, which is a way to associate
            // one event session with multiple tickets
            // (and later to associate with access_tickets - user's entry ticket - as well)
            for ($j = 0; $j < count($tickets); $j++) {
                // retrieves the session ID associated to $ticket[j].
                // the format for the session ID in the ticket's array is: 'session-x', x>=0
                // e.g. ticket[0]['session_id'] => session-0 => (after regexp) 0
                // e.g. ticket[1]['session_id'] => session-0 => (after regexp) 0
                // e.g. ticket[2]['session_id'] => session-1 => (after regexp) 1
                preg_match('/[0-9]+/', $this->ticketForm->tickets[$j]['session_id'], $ticketSession);

                // associates the ticket with the session
                $eventSessionTicket = new EventSessionTicket();
                $eventSessionTicket->event_session_id = $sessions[$ticketSession[0]]->id;
                $eventSessionTicket->ticket_id = $tickets[$j]->id;
                $eventSessionTicket->limit = $sessions[$ticketSession[0]]->max_capacity;
                $eventSessionTicket->count = 0;
                $eventSessionTicket->scheduled_start = $event->scheduled_start;
                $eventSessionTicket->scheduled_end = $event->scheduled_end;
                $eventSessionTicket->save();
            }
        } else {
            $this->eventForm->update();
            $this->eventSessionForm->update();
            $this->ticketForm->update();
        }

        // redirect to the event page
        return redirect()->route('events.show', $event->id);
    }

    public function render()
    {
        return view('livewire.event-creator');
    }
}
