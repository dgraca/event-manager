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

    public function rules() {
        return [
            'sessions.*.name' => 'required|string|max:255',
            'sessions.*.description' => 'nullable|string|max:65535',
            'sessions.*.max_capacity' => 'required|integer',
            'sessions.*.start_date' => 'required|date',
            'sessions.*.end_date' => 'required|date',
            'sessions.*.type' => 'required|integer',
            'sessions.*.status' => 'nullable|integer',
        ];
    }

    public function addSession($session = null) {
        $this->sessions[] = $session ?? [
            'name' => 'Nova Sessão',
            'description' => '',
            'max_capacity' => 0,
            'start_date' => now(),
            'end_date' => now(),
            'type' => null,
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
        // validate session fields
        $this->validate(attributes: \App\Models\EventSession::dynamicAttributeLabels());

        // create session
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

            // validate session fields
            $this->validate(attributes: \App\Models\EventSession::dynamicAttributeLabels());

            // update session
            $session = EventSession::find($s['id']);
            $session->fill($s);
            $session->save();
            $sessions[] = $session;
        }
        return $sessions;
    }
}
