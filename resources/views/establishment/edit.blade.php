@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit establishment') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('establishments-update', $establishment)}}" method="post">
                        <label for="formName">Establishment name</label><br>
                        <input id="formName" type="text" name="establishment_name" value="{{$establishment->name}}" /><br><br>
                        <label for="formComp">Establishment complexity</label><br>
                        <input id="formComp"  type="number" name="establishment_complexity" value="{{$establishment->complexity}}" /><br><br>
                        <label for="formFluff">Establishment lore</label><br>
                        <textarea id="formFluff"  class="formTextarea" form="creationForm" name="establishment_fluff">{{$establishment->fluff}}</textarea><br><br>
                        <label for="formCrunch">Establishment mechanics</label><br>
                        <textarea id="formCrunch"  class="formTextarea" form="creationForm" name="establishment_crunch">{{$establishment->crunch}}</textarea><br><br>
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
