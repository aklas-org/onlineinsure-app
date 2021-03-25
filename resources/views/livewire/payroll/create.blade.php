<div>
    <form wire:submit.prevent="create">
        <x-card>
            <x-card-item class="space-y-4">
                <div>
                    <x-label
                        for="sales_rep_id"
                        value="Sales Rep" />
                    <x-select id="sales_rep_id"
                        wire:model.defer="state.sales_rep_id"
                        class="block mt-1 w-full">
                        <option value="">-</option>
                        @foreach ($this->salesReps as $salesRep)
                            <option value="{{ $salesRep->id }}">
                                {{ $salesRep->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="sales_rep_id" />
                </div>
                <div>
                    <x-label
                        for="period"
                        value="Period" />
                    <x-input
                        x-data=""
                        x-ref="input"
                        x-init="new Pikaday({
                                field: $refs.input,
                                pickWholeWeek: true,
                                showDaysInNextAndPreviousMonths: true,
                                toString(date, format){
                                    let dateStart = moment(date).startOf('week').format('MM/DD/YYYY');
                                    let dateEnd = moment(date).endOf('week').format('MM/DD/YYYY');

                                    return dateStart + ' - ' + dateEnd;
                                },
                                onSelect: function(date){
                                    $wire.set('state.period', this.toString());
                                }
                            })"
                        type="text"
                        id="period"
                        name="period"
                        wire:model.defer="state.period"
                        class="block mt-1 w-full" />
                    <x-input-error for="period" />
                </div>
                <div>
                    <x-label
                        for="bonus"
                        value="Bonuses" />
                    <x-input
                        type="text"
                        id="bonus"
                        name="bonus"
                        wire:model.defer="state.bonus"
                        class="block mt-1 w-full" />
                    <x-input-error for="bonus" />
                </div>
                <div>
                    <x-label
                        for="client_count"
                        value="Number of Clients" />
                    <x-input
                        type="text"
                        id="client_count"
                        name="client_count"
                        class="block mt-1 w-full"
                        wire:model="clientCount" />
                    <x-input-error for="client_id" />
                </div>
                @foreach ($state['client_id'] as $clientIdKey => $clientId)
                    <div>
                        <x-label for="{{ 'client_id.' . $clientIdKey }}"
                            :value="'Client ' . ($clientIdKey + 1)" />
                        <div>
                            <x-select
                                wire:model.defer="{{ 'state.client_id.' . $clientIdKey }}"
                                name="client_id[]"
                                class="block mt-1 w-full">
                                <option value="">-</option>
                                @foreach ($this->clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}></option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error
                            for="{{ 'client_id.' . $clientIdKey }}" />
                    </div>
                @endforeach
                <div>
                    <x-label
                        for="commission"
                        value="Commission" />
                    <x-input
                        type="text"
                        id="commission"
                        name="commission"
                        wire:model.defer="state.commission"
                        class="block mt-1 w-full" />
                    <x-input-error for="commission" />
                </div>
            </x-card-item>
            <x-card-item class="flex items-center justify-end">
                <x-button type="submit">Create</x-button>
            </x-card-item>
        </x-card>
    </form>
</div>
