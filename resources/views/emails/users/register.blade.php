@component('mail::message')
# Registration on Laracamp

Hi, {{ $user->name }}
<br>
Thank you for register to the Laracamp. Now your account can access all the camp in Laracamp.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent