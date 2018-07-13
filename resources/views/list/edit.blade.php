@extends('layouts.app')

@section('title', $list->name.' - '.__('Edit').' '.__('List'))

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="jumbotron">
        <div class="container">
            @if($list->id)
                <a href="{{ route('show', ['id' => $list->id]) }}" target="_blank" >{{ __('Preview') }}</a>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @include('/list/form')
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                @if(count($list->gifts))
                    <div class="card">
                        <div class="card-header">{{ __('Gifts') }}</div>
                        @include('/gift/table')
                    </div>
                @endif
                @if($list->id)
                    <div class="card">
                        <div class="card-header">{{ __('New Gift') }}</div>
                        <br/>
                        @include('/gift/form')
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
