@extends('layouts.app')

@section('title', $gift->name.' - '.__('Edit').' '.__('Gift'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        {{ __('List: ') }}<a href="{{ route('console/list/edit', ['id' => $list->id]) }}">{{ $list->name }}</a>
                    </div>
                </div>

                @include('gift/form')
            </div>
        </div>
    </div>
@endsection
