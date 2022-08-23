@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a meal') }}</div>
                <div class="card-body">                    
                    <h4>{{$meal->title}}</h4>
                    <p>{{$meal->description}}</p>
                    @if($meal->photo)
                    <div class="imageBox">
                        <img src="{{$meal->photo}}">
                    </div>
                    @else
                        <p>[No image]</p>
                    @endif
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
