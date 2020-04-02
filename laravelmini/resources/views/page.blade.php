@extends('layouts.site')
@section('content')
    <div class="container">
        <h1>{{ $message }}</h1>
        <div class="">
            <ul class="">
                @foreach($categories as $category)
                    <li>
{{--                        <a class="btn btn-outline-primary" >SHOW&raquo;</a>--}}
                        <a href="{{ route('articleShow',['id'=>$category->id]) }}">{{$category->name_category}}</a>
                    </li>
                @endforeach
            </ul>

        </div>

    <footer>
        <p>&copy; 2019 Ochev Vladimir </p>
    </footer>
    </div>
@endsection
