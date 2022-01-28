@component('mail::message')
# Update Payment Status on Laracamp

Hi, {{ $checkout->user->name }}
Your enrolled <b>{{ $checkout->camp->title }}</b> camp is updated to success payment. Enjoy your learning process on
Laracamp. Click button below to see your dashboard;

@component('mail::button', ['url' => route('dashboard')])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent