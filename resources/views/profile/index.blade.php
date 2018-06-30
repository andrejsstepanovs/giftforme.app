@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <h2>{{ $user->email }}</h2>

        <form method="POST" action="{{ route('admin/profile') }}">
            @csrf
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ old('description', $user->description) }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif

            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </form>
    </div>

    <script>
        jQuery('document').ready(function(){
            $("#description").summernote({
                placeholder: '{{ __('About you') }}',
                height: 300,
                focus: true
            });
        });
    </script>


@endsection