<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ViewContact extends Component
{

    public Model $record;

    public function render()
    {
        $this->record->status = 2;
        $this->record->save();
        return view('livewire.view-contact');
    }
}
