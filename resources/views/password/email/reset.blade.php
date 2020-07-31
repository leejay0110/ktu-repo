@component('mail::message')
# Hello!

You are receiving this email because we received a password reset request for your account.

Click on the reset button to set your password to: **pass1234**

Please ensure you change the password after the reset.

@component('mail::button', ['url' => $url ] )
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
