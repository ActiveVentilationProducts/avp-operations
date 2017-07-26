@component('mail::message')
# Inventory Low!  Order More {{ $paint->color }}

You are below safe levels of {{ $paint->color }}!
Current count is {{ $paint->units_available }}

@component('mail::button', ['url' => 'http://google.com'])
Order More Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
