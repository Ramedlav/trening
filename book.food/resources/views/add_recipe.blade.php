@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                    <FORM method="POST" action="{{route('recipeAdd')}}">
                        <H1>Add recipe</H1>
                        <hr/>
                        <label>Name: </label>
                        <input name="name"><br>
                        <label>Description: </label>
                        <input name="description"><br>
                        <label>Recipe: </label><br>
                        <textarea name="recipe" ></textarea><br>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <hr/>
                        <label>Ingredients: </label><br>
                        <table>
                            <tr id="ingrids">
                                <td>
                                    <select id="ingrid">
                                        @foreach($ingrids as $ingrid)
                                        <option value="{{$ingrid->id}}">{{$ingrid->ingrid}}</option>
                                        @endforeach
                                    </select> <label>weigh:</label>&emsp;<input name="weigh">&emsp;<input type = "button" id="add_ingrid" class="btn btn-success" value="Add" >
                                </td>

                            </tr>

                        </table>
                        <hr/>
                        <button type="submit" class="btn btn-success">ADD</button>
                        @csrf
                    </FORM>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var elem = document.getElementById('add_ingrid');
        var ingrid = document.getElementById('ingrid');
        var ingrids = document.getElementById('ingrids');
        var newelem = document.createElement("td");
        var a = ingrid.value;
        newelem.setAttribute('id',a);
        newelem.innerHTML = ingrid.innerHTML;
        elem.onclick = function () {
            ingrids.append(newelem);
        };
    });
</script>
@endsection
