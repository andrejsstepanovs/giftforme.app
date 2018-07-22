@extends('layouts.app')

@section('title', __('Lists'))

@section('content')
    <div class="container">
        <h2>
            <a href="{{ route('user', ['id' => $user->id]) }}" class='blacklink'>{{ route('user', ['id' => $user->id]) }}</a>
            <a href="{{ route('console/profile') }}" type="button" class="btn btn-light">{{ __('Edit') }} {{ __('User') }}</a>
        </h2>
        
        <div>
            {!! $user->description !!}
        </div>
        
        @if (count($menuLists))
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ __('Sort') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Visibility') }}</th>
                    <th scope="col">{{ __('Views') }}</th>
                    <th scope="col">{{ __('Gifts') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menuLists as $list)
                    <tr>
                        <th>
                            <div style="float:left;">{{ $list->sort }}</div>
                            <div class="col"><a class="button" href="{{ route('console/list/sort/up', ['id' => $list->id]) }}" >{{ __('Up') }}</a></div>
                            <div class="w-100"></div>
                            <div class="col"><a class="button" href="{{ route('console/list/sort/down', ['id' => $list->id]) }}" >{{ __('Down') }}</a></div>
                        </th>
                        <td>
                            <a href="{{ route('console/list/edit', ['id' => $list->id]) }}">
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
