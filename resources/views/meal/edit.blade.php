@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit meal') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('meals-update', $meal)}}" method="post">
                        <label for="formName">Meal name</label><br>
                        <input id="formName" type="text" name="meal_name" value="{{$meal->name}}" /><br><br>
                        <label for="formComp">Meal complexity</label><br>
                        <input id="formComp"  type="number" name="meal_complexity" value="{{$meal->complexity}}" /><br><br>
                        <label for="formFluff">Meal lore</label><br>
                        <textarea id="formFluff"  class="formTextarea" form="creationForm" name="meal_fluff">{{$meal->fluff}}</textarea><br><br>
                        <label for="formCrunch">Meal mechanics</label><br>
                        <textarea id="formCrunch"  class="formTextarea" form="creationForm" name="meal_crunch">{{$meal->crunch}}</textarea><br><br>
                        @csrf
                        @method('put') 
                        <input type="submit" value="Confirm" />
                    </form>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
