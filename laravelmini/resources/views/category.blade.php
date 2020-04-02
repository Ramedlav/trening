@extends('layouts.site')
@section('content')
    <div class="container">
        <h1>{{ $message }}</h1>
             <div class="">
                <br>
                 {{$category->name_category}}
                 <br>
                {{$category->text}}
             </div>

        <footer>
            <p>&copy; 2019 Ochev Vladimir </p>
        </footer>

    </div>

@endsection
