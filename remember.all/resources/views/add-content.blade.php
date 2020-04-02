@extends('layouts.site')
@section('content')


    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">{{ $header }}</h1>
                <p>{{ $message }}</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
            </div>
        </div>



        <div class="container">
            <div class="form">
                <form method="post" action="{{route('articleStore')}}">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" name="name_article">
                    </div>
                    <div class="form-group">
                        <label for="text">TEKCT</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label for="text">Short_TEKCT</label>
                        <input type="text" class="form-control" name="short_text">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div> <!-- /container -->

    </main>

    <footer class="container">
        <p>&copy; Ochev 2020</p>
    </footer>
@endsection
