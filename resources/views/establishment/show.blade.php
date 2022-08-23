@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a establishment') }}</div>
                <div class="card-body">                    
                    <h4>{{$establishment->title}}</h4>
                    <p>Menu: {{$establishment->getMenu->title}}</p>
                    <p>Address:<br>{{$establishment->address}}</p>
                    <p>Code:<br>{{$establishment->code}}</p>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
