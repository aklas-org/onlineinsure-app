@props(['type' => 'info'])

@php
$types = [
    'info' => 'blue',
    'success' => 'green',
    'warning' => 'yellow',
    'danger' => 'red',
    'error' => 'red',
];

$icons = [
    'info' => 's-information-circle',
    'success' => 's-check-circle',
    'warning' => 's-exclamation',
    'danger' => 's-x-circle',
    'error' => 's-x-circle',
];

@endphp

<div {{ $attributes->merge(['class' => 'rounded-md bg-' . $types[$type] . '-50 p-4 shadow']) }}
    x-data="" x-ref="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            @svg('heroicon-' . $icons[$type], 'h-5 w-5 text-' . $types[$type] .
            '-400')
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-' . $types[$type] . '-800">
                {{ $slot }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button"
                    class="inline-flex bg-{{ $types[$type] }}-50 rounded-md p-1.5 text-{{ $types[$type] }}-500 hover:bg-{{ $types[$type] }}-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-{{ $types[$type] }}-50 focus:ring-{{ $types[$type] }}-600"
                    x-on:click="$refs.alert.remove()">
                    <span class="sr-only">Dismiss</span>
                    @svg('heroicon-s-x', 'h-5 w-5 fill-current')
                </button>
            </div>
        </div>
    </div>
</div>
