@component('mail::message')
#Request was Closed

User {{$request->user_name}} close Request:

Theme: {{$request->description}}


@component('mail::button', ['url' => 'support.test/Request/'.$request->id])
show the request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
