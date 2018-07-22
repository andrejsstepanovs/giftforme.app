@extends('layouts.app')

@section('title', __('Lists').' - '.$list->name)

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{ $list->name }}</h1>
            <hr/>
            {!! $list->description !!}
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($list->gifts as $gift)
                <div class="card col-md-6">
                    <div class="card-header">
                        <a class="blacklink" href="{{ route('gift', ['id' => $gift->id]) }}" >
                            <h1 class="display-4">{{ $gift->name }}</h1>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!! $gift->description !!}
                        </p>
                        <!--@include('show/like')-->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
