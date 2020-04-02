@extends('layouts.site')
@section('content')
    <div class="jumbotron">
    <div class="container">
        <h1>{{ $message }}</h1>

        <div id="comments">
            @foreach($coments as $coment)
                <label >name</label>
                <div id="name">{{$users[$coment->user_id]->name}}</div>
                <label>comment</label>
                <div>{{$coment->coment}}</div>

                {{--                --}}
                <form action="{{ route('deleteComment',['id'=>$coment->id]) }}" method="post">
{{--                    <input type="hidden" name="_method" value="DELETE">--}}
                    <button type="submit" class="btn btn-danger btn-sm" href="">DELETE</button>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                </form>
            @endforeach
        </div>

        <form method="post" action="{{route('addStore')}}">
            <div class="form-group">
                <label>title</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label>coment</label>
                <textarea class="form-control" name="coment"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success">OK</button>
            {{csrf_field()}}
        </form>

        <footer>
            <p>&copy; 2019 Ochev Vladimir </p>
        </footer>
    </div>
    </div>
@endsection
