@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table>
{{--                            @if($recipe)--}}
{{--<tr></tr>--}}
                            <tr>
                                <th><h1>{{$recipe->name}}</h1></th>
                            </tr>
                            <tr>
                                <td>{{$recipe->recipe}}</td>

                            </tr>

                        </table>



{{--                            <tr>--}}
{{--                                @if()--}}
                            <div><br>
                                <b>Ingridients:</b>
                                    @forelse($ingrids as $ingrid)

                                        <div>{{$ingrid->ingrid}}<a href="#">Delete</a></div>

                                    @empty
                                        <tr>Sorry, but the recipe don'nt have Ingridients</tr>
                                    @endforelse



                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


