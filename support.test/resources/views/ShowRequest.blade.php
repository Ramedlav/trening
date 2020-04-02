@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Support</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th><h1 class="alert">{{$request->description}}</h1></th>
                            </tr>
                            <tr>
                                <td><p class="alert-info">{{$request->request}}</p></td>
                            </tr>
{{--                            I need 'if' because we have a button that must to appear just if the answer exist
                                if для за кнопки--}}
                        @if($responses && $responses->count() && $request->statuse_id !=='3' || Auth::user()->role == 'admin' && $request->statuse_id !=='3')
                        @foreach( $responses as $response )
                                <tr>
                                    @if($response->user->name == Auth::user()->name)
                                        <td><b class="alert-primary">You</b><p class="alert-info">{{$response->response}}</p></td>
                                    @else
                                        <td><b class="alert-primary">{{$response->user->name}}</b><p class="alert-success">{{$response->response}}</p></td>
                                    @endif
                                </tr>
                        @endforeach
                                <tr><td><a class="btn btn-secondary" href="" data-toggle="modal" data-target="#exampleModal">response</a></td></tr>
                        @endif
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" >write the text</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{route('ResponseAdd')}}">
                    <div class="modal-body">
                        <textarea name="response"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="riquest_id" value="{{$request->id}}">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
