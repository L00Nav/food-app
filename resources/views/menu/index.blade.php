@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menus') }}</div>
                <div class="card-body">
                        @forelse($menus as $menu)
                            <h4>{{$menu->title}}</h4>
                        <div class="listButtons">
                            <a class="btn btn-outline-primary m-2" href="{{route('menus-show', $menu->id)}}">More details</a>
                            @if(Auth::user()->role > 9)
                            <a class="btn btn-outline-success m-2" href="{{route('menus-edit', $menu)}}">Edit</a>
                            <form class="delete" action="{{route('menus-delete', $menu)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                            </form>
                            @endif
                        </div>
                            <hr>
                        @empty
                        No menus at the moment. Sorry.
                        @endforelse
                    <a class="btn btn-outline-primary m-2" href="{{route('menus-create')}}">Add</a>  
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
