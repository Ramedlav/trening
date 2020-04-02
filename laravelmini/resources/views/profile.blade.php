@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <img src="uploads/avatars/{{ $user->avatar }}" style=" width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px; ">
                        <h1>{{ $user->name }}'s Profile</h1>


                            <form enctype="multipart/form-data" action="/profile" method="POST">
                                <label>Upload profile image</label>
                                <input type="file" name="avatar">
                                @csrf
                                <input type="submit" class="pull-right btn btn-sm btn-primary">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
