<?php

namespace App\Http\Livewire\Payroll;

use App\Actions\Payroll\CreatePayroll;
use App\Models\Client;
use App\Models\SalesRep;
use Livewire\Component;

class Create extends Component
{
    public $state = [
        'client_id' => [],
    ];

    public $clientCount = 0;

    public function render()
    {
        return view('livewire.payroll.create');
    }

    public function getSalesRepsProperty()
    {
        return SalesRep::oldest('name')->get();
    }

    public function getClientsProperty()
    {
        return Client::oldest('name')->get();
    }

    public function updatedClientCount($value)
    {
        $this->state['client_id'] = [];

        for ($i = 1; $i <= $value; $i++) {
            $this->state['client_id'][] = '';
        }
    }

    public function create(CreatePayroll $action)
    {
        $payroll = $action->create($this->state);

        return redirect(route('pdfs.show', ['payroll' => $payroll->id]));
    }
}
