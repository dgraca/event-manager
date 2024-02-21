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

    public function mount()
    {
        $this->venue = new Venue();
    }

    public function rules()
    {
        return Venue::rules();
    }

    public function save()
    {
        $this->validate();

        //$this->venue->fill([
        //    'name' => $this->name,
        //]);
        //
        //$this->venue->save();
    }

    public function render()
    {
        return view('livewire.venue-modal');
    }
}
