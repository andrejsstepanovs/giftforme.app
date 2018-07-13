@extends('layouts.app')

@section('title', __('Profile'))

@section('content')

    <div class="container">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <h2>
            <a href="{{ route('user', ['id' => $user->id]) }}" class='blacklink'>{{ $user->email }}</a>
        </h2>
        <form method="POST" action="{{ route('admin/profile') }}">
            @csrf
            <div id="descriptioneditbox">
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ old('description', $user->description) }}</textarea>
            </div>
            @if ($errors->has('description'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
            <div id="descriptionpreviewbox">
                @if ($user->description)
                    {!! $user->description !!}
                @else
                    <button type="button" class="btn btn-primary">{{ __('Edit') }}</button><br /><br /><br />
                @endif
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </form>
    </div>

    <script>
        jQuery('document').ready(function(){
            var editBox=$("#descriptioneditbox");
            var viewBox=$("#descriptionpreviewbox");
            viewBox.click(function(){
                editBox.toggle();
                viewBox.toggle();
                if (editBox.is(':visible')) {
                    $("#description").summernote({
                        placeholder: '{{ __('Gift description') }}',
                        height: 300,
                        focus: false
                    });
                }
            });
        });
    </script>
    <style>
        #descriptioneditbox {
            display: none;
        }
        #descriptionpreviewbox {
            display: block;
        }
    </style>

@endsection