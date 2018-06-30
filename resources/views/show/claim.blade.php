<p>
    @if(!in_array($gift->id, session('claimed', [])))
        <a class="btn btn-success btn-lg" href="{{ route('claim', ['id' => $gift->id]) }}">{{ __('Claim') }}</a>
    @else
        <a class="btn btn-danger btn-lg" href="{{ route('unclaim', ['id' => $gift->id]) }}">{{ __('Claimed By You') }}</a>
    @endif
</p>