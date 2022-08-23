@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Establishments') }}</div>
                <div class="card-body">
                        @forelse($establishments as $establishment)
                            <h4>{{$establishment->title}}</h4>
                        <div class="listButtons">
                            <a class="btn btn-outline-primary m-2" href="{{route('establishments-show', $establishment->id)}}">More details</a>
                            @if(Auth::user()->role > 9)
                            <a class="btn btn-outline-success m-2" href="{{route('establishments-edit', $establishment)}}">Edit</a>
                            <form class="delete" action="{{route('establishments-delete', $establishment)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                            </form>
                            @endif
                        </div>
                            <hr>
                        @empty
                        No establishments are open at the moment. Sorry.
                        @endforelse
                    <a class="btn btn-outline-primary m-2" href="{{route('establishments-create')}}">Add</a>  
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
