@component('mail::message')
# Register Camp {{ $checkout->camp->title }}

Hi, {{ $checkout->user->name }}
Thank you for register on <b>{{ $checkout->camp->title }}</b> camp. Please see the payment instruction on your dashboard
page.

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent