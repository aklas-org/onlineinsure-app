<div {{ $attributes->merge(['class' => 'rounded-md p-4 shadow']) }}
    wire:ignore.self
    x-data="{
        message: '',
        type: 'info',
        colors: {
            'info': 'blue',
            'success': 'green',
            'warning': 'yellow',
            'danger': 'red',
            'error': 'red'
        },
        icons: {
            'info': 's-information-circle',
            'success': 's-check-circle',
            'warning': 's-exclamation',
            'danger': 's-x-circle',
            'error': 's-x-circle',
        }
    }"
    x-bind:class="'bg-' + colors[type] + '-50'"
    x-show="message"
    x-on:alert.window="message = $event.detail.message; type = $event.detail.type">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-icon name="heroicon-s-information-circle"
                class="h-5 w-5"
                x-show="type == 'info'"
                x-bind:class="'text-' + colors[type] + '-400'" />
            <x-icon name="heroicon-s-check-circle"
                class="h-5 w-5"
                x-show="type == 'success'"
                x-bind:class="'text-' + colors[type] + '-400'" />
            <x-icon name="heroicon-s-exclamation"
                class="h-5 w-5"
                x-show="type == 'warning'"
                x-bind:class="'text-' + colors[type] + '-400'" />
            <x-icon name="heroicon-s-x-circle"
                class="h-5 w-5"
                x-show="type == 'danger'"
                x-bind:class="'text-' + colors[type] + '-400'" />
            <x-icon name="heroicon-s-x-circle"
                class="h-5 w-5"
                x-show="type == 'error'"
                x-bind:class="'text-' + colors[type] + '-400'" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium"
                x-bind:class="'text-' + colors[type] + '-800'"
                x-text="message">
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button"
                    class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2"
                    x-bind:class="[
                        'bg-' + colors[type] + '-50',
                        'text-' + colors[type] + '-500',
                        'hover:bg-' + colors[type] + '-100',
                        'focus:ring-offset-' +  colors[type] + '-50',
                        'focus:ring-' + colors[type] + '-600']"
                    x-on:click="message = ''">
                    <span class="sr-only">Dismiss</span>
                    <x-icon name="heroicon-s-x" class="h-5 w-5 fill-current" />
                </button>
            </div>
        </div>
    </div>
</div>
