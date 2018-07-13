@extends('layouts.app')

@section('title', __('User').' - '.$user->name)

@section('content')

    <div class="jumbotron">
        <div class="container">
            {!! $user->description !!}
        </div>
    </div>

    <div class="container">
        @if (count($lists))
            <div class="row">
                @foreach($lists as $list)
                    <div class="card col-md-6">
                        <div class="card-header">
                            <a class="blacklink" href="{{ route('show', ['id' => $list->id]) }}" >
                                <h1 class="display-4">{{ $list->name }}</h1>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {!! $list->description !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
