@component('mail::message')
# Client send you answer

Please, give you comment

@component('mail::button', ['url' => 'support.test/AllRequest'])
Go to support
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
