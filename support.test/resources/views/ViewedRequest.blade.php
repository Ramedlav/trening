@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$view}}</div>
                    <div class="card-body">
                        <table>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{$request->description}}&nbsp;&nbsp;</td>
                                    <td><a class="btn btn-outline-primary" href="{{route('RequestShow',['id'=>$request->id])}}">Show request</a>
                                    </td>
                                    @if($request->statuse->id == '1')
                                        <td><p class="alert-success">{{$request->statuse->status}}</p>
                                        </td>
                                    @endif
                                    @if($request->statuse->id == '2')
                                        <td><p class="alert-info">{{$request->statuse->status}}</p></td>
                                    @endif
                                    @if($request->statuse->id == '3')
                                        <td><p class="alert-danger">{{$request->statuse->status}}</p></td>
                                    @endif
                                    @if($request->statuse->id == '4')
                                        <td><p class="alert-warning">{{$request->statuse->status}}</p></td>
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
