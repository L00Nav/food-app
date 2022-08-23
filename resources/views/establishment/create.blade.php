@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a establishment') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('establishments-store')}}" method="post">
                        <label for="formName">Establishment name</label><br>
                        <input id="formName" type="text" name="establishment_title" /><br><br>
                        <label for="formMenu">Menu</label><br>
                        <select id="formMenu" name="menu_id">
                            @foreach($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select><br><br>
                        <label for="formName">Establishment address</label><br>
                        <input id="formName" type="text" name="establishment_address" /><br><br>
                        <label for="formName">Establishment code</label><br>
                        <input id="formName" type="text" name="establishment_code" /><br><br>
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
