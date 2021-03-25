<x-app-layout>
    <x-slot name="header">
        <x-page-header>Payroll PDF</x-page-header>
    </x-slot>

    <x-page-content>
        <div class="flex items-center justify-between">
            <div>Adviser No: {{ $payroll->salesRep->id }}<span class="ml-3">{{ $payroll->salesRep->name }}</span></div>
            <div></div>
        </div>
    </x-page-content>
</x-app-layout>
