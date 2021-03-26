@component('mail::message')
# Payroll has been created.

Hi {{ $client->name }},

A payroll has been created.

PID: {{ $payroll->id }}
Period: {{ $payroll->period }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
