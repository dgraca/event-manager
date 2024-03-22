<?php

namespace App\Livewire\Forms;

use App\Models\EventSession;
use Cviebrock\EloquentSluggable\Sluggable;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventSessionForm extends Form
{
    // Will hold the sessions, used for livewire form
    public array $sessions = [];

    public $event_id;

    public function addSession($session = null) {
        $this->sessions[] = $session ?? [
            'name' => 'Nova Sessão',
            'description' => '',
            'max_capacity' => 0,
            'start_date' => now(),
            'end_date' => now(),
            'type' => 0,
        ];
    }

    public function removeSession($id) {
        unset($this->sessions[$id]);
        $this->sessions = array_values($this->sessions);
    }

    public function store(int $event_id) {
        $sessions = [];
        foreach ($this->sessions as $s) {
            $sessions = $this->create($s, $event_id, $sessions);
        }
        return $sessions;
    }

    public function create($s, $event_id, $sessions) {
        $session = new EventSession($s);
        $session->event_id = $event_id;
        $session->save();
        $sessions[] = $session;
        return $sessions;
    }

    public function update($event_id) {
        $sessions = [];
        foreach ($this->sessions as $s) {
            // if the session doesn't exist, create it
            if (!isset($s['id'])) {
                $sessions = $this->create($s, $event_id, $sessions);
                continue;
            }
            $session = EventSession::find($s['id']);
            $session->fill($s);
            $session->save();
            $sessions[] = $session;
        }
        return $sessions;
    }
}
