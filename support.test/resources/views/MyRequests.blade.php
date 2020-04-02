@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My requests</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Support</th>
                                <th>Actions</th>
                                </tr>
                                @forelse( $requests as $request )
                                    <tr>
                                        <td>{{$request->description}}&nbsp;&nbsp;</td>
                                        <td><a class="btn btn-outline-primary" href="{{route('RequestShow',['id'=>$request->id])}}">Show request</a></td>
                                        @if($request->statuse_id != '3')
                                            <td><a class="btn btn-outline-danger" href="{{route('CloseRequest',['id'=>$request->id])}}">Close request</a></td>
                                            <td><p class="alert-success">{{$request->statuse->status}}</p></td>
                                        @else
                                            <td><p class="alert-danger">Closed</p></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
