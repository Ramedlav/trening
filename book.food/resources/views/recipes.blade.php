@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Ricepes</th>
                                <th>Description</th>
                                <th>Actions&emsp;</th>
                                <td><a class="btn btn-secondary" href="{{route('recipeAddShow')}}">Add Recipe</a></td>
                            </tr>

                            @forelse( $recipes as $recipe )

                                <tr>
                                    <td>{{$recipe->name}}&nbsp</td>

                                <td>{{$recipe->description}}&nbsp</td>

                                <td>
                                    <a class="btn btn-outline-primary" href="{{route('recipeShow',['id'=>$recipe->id])}}">Open</a>
                                    <form method="post" action="{{route('recipeDelete',['id'=>$recipe->id])}}">
                                        {{method_field('DELETE')}}
                                        {{@csrf_field()}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                                @empty
                                <p>sorry, but You have not the ricepes</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
