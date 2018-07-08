<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Lists') }}</a>
    <div class="dropdown-menu" aria-labelledby="dropdown">
        <a class="dropdown-item" href="{{ route('admin') }}">{{ __('All') }}</a>
        <div class="dropdown-divider"></div>

        @foreach($lists as $list)
            <a class="dropdown-item" href="{{ route('admin/list/edit', ['id' => $list->id]) }}">{{ $list->name }} ({{ __($list->visibility) }})</a>
        @endforeach

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('admin/list/edit', ['id' => 0]) }}">{{ __('New') }}</a>
    </div>
</li>