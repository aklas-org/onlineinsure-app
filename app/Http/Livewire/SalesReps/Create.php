<?php

namespace App\Http\Livewire\SalesReps;

use App\Actions\SalesRep\CreateSalesRep;
use Livewire\Component;

class Create extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.sales-reps.create');
    }

    public function create(CreateSalesRep $action)
    {
        $action->create($this->state);

        $this->state = [];

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Sales rep has been added.']);
    }
}
