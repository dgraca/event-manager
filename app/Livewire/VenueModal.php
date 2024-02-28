<?php

namespace App\Livewire;

use App\Models\Venue;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class VenueModal extends ModalComponent
{
    public Venue $venue;

    public $name;
    public $slug;
    public $address;
    public $location;
    public $country;
    public $postcode;
    public $latitude;
    public $longitude;
    public $email;
    public $phone;
    public $mobile;

    /**
     * Supported modal_max_width
     * 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function mount(Venue $venue)
    {
        $this->venue = $venue;
    }

    public function rules()
    {
        return Venue::rules();
    }

    public function save()
    {
        $this->validate();

        try {
            $this->venue->fill($this->only([
                'name',
                'address',
                'location',
                'country',
                'postcode',
                'latitude',
                'longitude',
                'email',
                'phone',
                'mobile'
            ]));

            // associate the venue with authenticated user's first entity
            $this->venue->entity_id = auth()->user()->entities()->first()->id;

            $this->venue->save();

        } catch (\Exception $e) {
            $this->dispatch('venue-error')->to(EventCreator::class);
            //$this->addError('name', $e->getMessage());
            return;
        }

        $this->closeModal();
        $this->dispatch('venue-created', ['state' => true])->to(EventCreator::class);
    }

    public function render()
    {
        return view('livewire.venue-modal');
    }
}
