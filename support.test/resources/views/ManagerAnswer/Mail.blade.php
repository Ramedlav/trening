@component('mail::message')
# You have a new answer

{{$response->name}} send you the answer
in request "{{$response->description}}".

@component('mail::button', ['url' => 'support.test/Request/'.$response->request_id])
Go to support
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
