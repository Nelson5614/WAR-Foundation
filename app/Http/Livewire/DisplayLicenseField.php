<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisplayLicenseField extends Component

{
    public $role_id;
    public $license_number;

    public function render()
    {

        return view('livewire.display-license-field');
    }
}
