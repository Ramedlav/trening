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
                                <th>Ingridients&emsp;&emsp;</th>

                                <th>Actions&emsp;&emsp;</th>
                                <td><a class="btn btn-secondary" href="" data-toggle="modal" data-target="#exampleModal">Add ingredient</a>&emsp;&emsp; </td>
                            </tr>

                            @forelse( $ingrids as $ingrid )

                                <tr>
                                    <td>{{$ingrid->ingrid}}</td>
                                    <td>
                                        <a href="">Action1&emsp;&emsp;</a>
                                    </td>
                                    <td>
                                    <form method="post" action="{{route('ingridDelete',['id'=>$ingrid->id])}}">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class=" btn-danger">&emsp;&Chi;&emsp;</button>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <p>Sorry, but You have not the Ingridients on the warehouse</p>
                            @endforelse
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" >Add ingredient</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('ingridAdd')}}">
                <div class="modal-body">
                    <label>*Name:</label>
                    <input name="ingrid"><br>
                    <label>Weigt:</label>
                    <input name="weight">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">ADD</button>
                </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

