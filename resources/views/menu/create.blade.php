@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a menu') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('menus-store')}}" method="post">
                        <label for="formName">Menu name</label><br>
                        <input id="formName" type="text" name="menu_name" /><br><br>
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
