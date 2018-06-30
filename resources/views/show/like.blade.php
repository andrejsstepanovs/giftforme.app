<p>
    @if(!in_array($gift->id, session('likes', [])))
        <a class="btn btn-primary btn-lg" href="{{ route('like', ['id' => $gift->id]) }}">{{ __('Like') }} ({{ $gift->likes }})</a>
    @else
        <a class="btn btn-info btn-lg" href="{{ route('unlike', ['id' => $gift->id]) }}">{{ __('Liked') }} ({{ $gift->likes }})</a>
    @endif
</p>