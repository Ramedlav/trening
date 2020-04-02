@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Support</div>
                    <div class="card-body">
                        <FORM method="POST" action="{{route('RequestAdd')}}">
                            <H1>Add request</H1>
                            <hr/>
                            <label>file: </label>
                            <input type="file"><br>
                            <label>Description: </label>
                            <input name="description"><br>
                            <label>Request: </label><br>
                            <textarea name="request" ></textarea><br>
{{--                            передаю напрямую ID статуса. обычно так не делаю--}}
{{--                            но в условиях небыло сказанно о смене языки или --}}
{{--                            о других условиях, которые мешают мне так сделать--}}
                            <input type="hidden" name="statuse_id" value="4">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <hr/>
                            <button type="submit" class="btn btn-success">ADD</button>
                            @csrf
                        </FORM>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
