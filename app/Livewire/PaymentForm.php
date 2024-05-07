<?php

namespace App\Livewire;

use App\Models\PaymentOption;
use Livewire\Component;

class PaymentForm extends Component
{
    public $entity_id;
    public $business_entity_name;
    public $vat;
    public $address;
    public $location;
    public $country;
    public $postcode;
    public $email;
    public $phone;
    public $data;
    public $currency;

    public $paymentOption;

    public function mount(PaymentOption $paymentOption)
    {
        // Sets paymentOption as a new one (default) to access its methods (could be static)
        $this->paymentOption = $paymentOption;

        // Sets default values for the form Or the values of the paymentOption
        $this->entity_id = $paymentOption ? $paymentOption->entity_id : auth()->user()->entities->first()->id;
        $this->business_entity_name = $paymentOption ? $paymentOption->business_entity_name : null;
        $this->vat = $paymentOption ? $paymentOption->vat : null;
        $this->address = $paymentOption ? $paymentOption->address : null;
        $this->location = $paymentOption ? $paymentOption->location : null;
        $this->country = $paymentOption ? $paymentOption->country : "PT";
        $this->postcode = $paymentOption ? $paymentOption->postcode : null;
        $this->email = $paymentOption ? $paymentOption->email : null;
        $this->phone = $paymentOption ? $paymentOption->phone : null;
        $this->data = $paymentOption ? $paymentOption->data : null;
        $this->currency = $paymentOption ? $paymentOption->currency : "EUR";
    }

    public function rules()
    {
        return PaymentOption::rules();
    }

    public function save() {
        // Check if the paymentOption is new or already exists
        if ($this->paymentOption->id === null) {
            $this->store();
        } else {
            $this->update();
        }

        // Redirects to the paymentOptions list
        return redirect()->route('payment-options.index');
    }

    // Creates a new paymentOption
    public function store()
    {
        // Validates the form fields
        $this->validate();

        // create new instance of PaymentOption
        $paymentOption = new PaymentOption($this->toArray());
        $paymentOption->save();
    }

    // Updates an existing paymentOption
    public function update() {
        // Validates the form fields
        $this->validate();

        // find event by ID and update it
        $paymentOption = PaymentOption::find($this->paymentOption->id);
        $paymentOption->fill($this->toArray());
        $paymentOption->save();
    }

    /**
     * Returns the form fields as an array
     *
     * @return array
     */
    private function toArray()
    {
        return [
            'entity_id' => $this->entity_id,
            'business_entity_name' => $this->business_entity_name,
            'vat' => $this->vat,
            'address' => $this->address,
            'location' => $this->location,
            'country' => $this->country,
            'postcode' => $this->postcode,
            'email' => $this->email,
            'phone' => $this->phone,
            'data' => $this->data,
            'currency' => $this->currency,
        ];
    }

    public function render()
    {
        return view('livewire.payment-form');
    }
}
