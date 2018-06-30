<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('Name') }}</th>
        <th scope="col">{{ __('Likes') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach( $list->gifts as $gift)
            <tr>
                <th>{{ $gift->id }}</th>
                <td>
                    <a href="{{ route('admin/gift/edit', ['id' => $gift->id]) }}">{{ $gift->name }}</a>
                </td>
                <td>
                    {{ $gift->likes }}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>