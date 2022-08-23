@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a meal') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('meals-store')}}" method="post">
                        <label for="formName">Meal name</label><br>
                        <input id="formName" type="text" name="meal_title" /><br><br>
                        <label for="formDesc">Meal description</label><br>
                        <textarea id="formDesc"  class="formTextarea" form="creationForm" name="meal_description"></textarea><br><br>
                        <label>Photo:</label>
                        <input type="file" name="meal_photo" /><br>
                        @csrf
                        @method('post') 
                        <input type="submit" value="create" />
                    </form>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
