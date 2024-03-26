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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

        /**
         * If the event is new, add a default session and ticket
         * If not, get the sessions, tickets and its associations
         */
        if ($event->id === null) {
            $this->addDefaultSessionAndTicket();
        } else {
            $sessions = $event->eventSessions;
            $this->eventSessionForm->sessions = $sessions->toArray();
            $this->ticketForm->tickets = $event->tickets->toArray();

            // get associations between sessions and tickets
            foreach ($sessions as $session) {
                $eventSessionTickets = $session->eventSessionTickets;
                foreach ($eventSessionTickets as $eventSessionTicket) {
                    // get the ticket inside the array of tickets ($this->ticketForm->tickets)
                    // where the ticket id is the same as the eventSessionTicket ticket_id
                    $ticket = array_filter($this->ticketForm->tickets, function ($ticket) use ($eventSessionTicket) {
                        return $ticket['id'] === $eventSessionTicket->ticket_id;
                    });
                    // get the key of the ticket
                    $ticketKey = array_key_first($ticket);
                    // get index of the session with the id
                    $sessionKey = array_search($session->id, array_column($this->eventSessionForm->sessions, 'id'));
                    // add the session to the ticket
                    $this->ticketForm->tickets[$ticketKey]['sessions'][$sessionKey] = true;
                }
            }
        }
    }

    public function addDefaultSessionAndTicket()
    {
        $this->eventSessionForm->addSession([
            'name' => 'Sessão padrão',
            'description' => '',
            'max_capacity' => 0,
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->format('Y-m-d'),
            'type' => 0,
        ]);
        $this->ticketForm->addTicket([
            'name' => 'Bilhete padrão',
            'description' => '',
            'max_check_in' => 0,
            'max_tickets_per_order' => 0,
            'price' => 0,
            'currency' => 'EUR',
            'sessions' => [],
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
     * Saves the event and all it's sessions and tickets
     * or
     * updates the event and all it's sessions and tickets
     */
    public function save() {
        DB::transaction(function() {
            // if event doesn't have any ID, save event and it's sessions/tickets
            // else: updates all information
            if ($this->event->id === null) {
                // saves the event
                $event = $this->eventForm->store();
                // saves all sessions created
                $sessions = $this->eventSessionForm->store($event->id);
                // save all tickets created
                $tickets = $this->ticketForm->store($event->id);

                // associate tickets with sessions
                foreach ($tickets as $index => $ticket) {
                    $ticketSessions = array_keys($this->ticketForm->tickets[$index]['sessions']);
                    // get the sessions associated with the ticket
                    foreach ($ticketSessions as $session) {
                        $eventSessionTicket = new EventSessionTicket();
                        $this->fillEventSessionTicket($sessions[$session], $eventSessionTicket, $ticket, $event);
                    }
                }
            } else {
                $event = $this->eventForm->update();
                $sessions = $this->eventSessionForm->update($event->id);
                $tickets = $this->ticketForm->update($event->id);

                // update and/or create new associations between tickets and sessions
                foreach ($tickets as $index => $ticket) {
                    $ticketSessions = array_keys($this->ticketForm->tickets[$index]['sessions']);
                    // get the sessions associated with the ticket
                    foreach ($ticketSessions as $session) {
                        $eventSessionTicket = EventSessionTicket::where('event_session_id', $sessions[$session]['id'])
                            ->where('ticket_id', $ticket['id'])
                            ->first();
                        if ($eventSessionTicket === null) {
                            $eventSessionTicket = new EventSessionTicket();
                            $this->fillEventSessionTicket($sessions[$session], $eventSessionTicket, $ticket, $event);
                        }
                    }
                }
            }

            // redirect to the event page
            return redirect()->route('events.show', $event->id);
        });
    }

    public function render()
    {
        return view('livewire.event-creator');
    }

    /**
     * Fills the EventSessionTicket model with the necessary information
     * If the model is new, it will set its information to default values
     * If not, it will keep the information already set
     * @param $session
     * @param EventSessionTicket $eventSessionTicket
     * @param $ticket
     * @param Event $event
     */
    public function fillEventSessionTicket($session, EventSessionTicket $eventSessionTicket, $ticket, Event $event): void
    {
        $eventSessionTicket->event_session_id = $session->id;
        $eventSessionTicket->ticket_id = $ticket->id;
        $eventSessionTicket->limit = $eventSessionTicket->id === null ? 0 : $eventSessionTicket->limit;
        $eventSessionTicket->count = $eventSessionTicket->id === null ? 0 : $eventSessionTicket->count;
        $eventSessionTicket->scheduled_start = $eventSessionTicket->id === null ? $event->scheduled_start : $eventSessionTicket->scheduled_start;
        $eventSessionTicket->scheduled_end = $eventSessionTicket->id === null ? $event->scheduled_end : $eventSessionTicket->scheduled_end;
        $eventSessionTicket->save();
    }
}
