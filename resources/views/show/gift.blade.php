@extends('layouts.app')

@section('title', __('Gift').' - '.$gift->name)

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">
                <a class="blacklink" href="{{ route('show', ['id' => $gift->giftList->id]) }}" >{{ $gift->giftList->name }}</a>
                >
                <a class="blacklink" href="{{ route('gift', ['id' => $gift->id]) }}" >{{ $gift->name }}</a>
            </h1>
            <hr/>
            {!! $gift->description !!}
        </div>
    </div>

    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('show/like')
            </div>
            <div class="col-md-6">
                @include('show/claim')
            </div>
        </div>
    </div>
@endsection
