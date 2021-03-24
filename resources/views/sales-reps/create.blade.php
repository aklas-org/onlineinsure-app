<x-app-layout>
    <x-slot name="header">
        <x-page-header>Add Sales Rep Profile</x-page-header>
    </x-slot>

    <x-page-content>
        @if (session('success'))
            <x-alert class="sm:mb-6 lg:mb-8" type="success">
                {{ session('success') }}
            </x-alert>
        @endif

        <form method="post" action="{{ route('sales-reps.store') }}">
            @csrf
            <x-card>
                <x-card-item class="space-y-4">
                    <div>
                        <x-label for="name" value="Name" />
                        <x-input type="text" id="name" name="name"
                            :value="old('name')" class="block mt-1 w-full" />
                        <x-input-error for="name" />
                    </div>
                    <div>
                        <x-label for="commission_percentage"
                            value="Commission Percentage" />
                        <x-input type="text" id="commission_percentage"
                            name="commission_percentage"
                            :value="old('commission_percentage')"
                            class="block mt-1 w-full" />
                        <x-input-error for="commission_percentage" />
                    </div>
                    <div>
                        <x-label for="tax_rate" value="Tax Rate" />
                        <x-input type="text" id="tax_rate" name="tax_rate"
                            :value="old('tax_rate')"
                            class="block mt-1 w-full" />
                        <x-input-error for="tax_rate" />
                    </div>
                    <div>
                        <x-label for="address" value="Address" />
                        <x-input type="text" id="address" name="address"
                            :value="old('address')" class="block mt-1 w-full" />
                        <x-input-error for="address" />
                    </div>
                </x-card-item>
                <x-card-item class="flex items-center justify-end">
                    <x-button type="submit">Add</x-button>
                </x-card-item>
            </x-card>
        </form>
    </x-page-content>
</x-app-layout>
