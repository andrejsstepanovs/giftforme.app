@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($lists))
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Visibility') }}</th>
                    <th scope="col">{{ __('Views') }}</th>
                    <th scope="col">{{ __('Gifts') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <th>{{ $list->id }}</th>
                        <td>
                            <a href="{{ route('admin/list/edit', ['id' => $list->id]) }}">
                                {{ $list->name }}
                            </a>
                        </td>
                        <td>
                            @if($list->visibility == 'public')
                                <a href="{{ route('show', ['id' => $list->id]) }}">
                                    {{ __($list->visibility) }}
                                </a>
                            @else
                                {{ __($list->visibility) }}
                            @endif
                        </td>
                        <th>{{ $list->views }}</th>
                        <td>{{ count($list->gifts) }} {{ __('Gifts') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            @include('/list/form')
        @endif
    </div>
@endsection
