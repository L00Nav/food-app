@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Meal') }}</div>
                <div class="card-body">
                        @forelse($meals as $meal)
                            <h4>{{$meal->title}}</h4>
                        <div class="imageBox">
                            <img src="{{$meal->meal_photo}}">
                        </div>
                        <div class="listButtons">
                            <a class="btn btn-outline-primary m-2" href="{{route('meals-show', $meal->id)}}">More details</a>
                            @if(Auth::user()->role > 9)
                            <a class="btn btn-outline-success m-2" href="{{route('meals-edit', $meal)}}">Edit</a>
                            <form class="delete" action="{{route('meals-delete', $meal)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                            </form>
                            @endif
                        </div>
                            <hr>
                        @empty
                        We're out of food! How horrible!
                        @endforelse
                    <a class="btn btn-outline-primary m-2" href="{{route('meals-create')}}">Add</a>  
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
