@component('mail::message')
# Client send support request to you


    name:{{$request->name}}

    theme: {{ $request->description }}

    text: {{$request->request}}


@component('mail::button', ['url' => 'support.test/AllRequest'])
Response to request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
