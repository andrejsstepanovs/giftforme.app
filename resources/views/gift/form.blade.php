<form method="POST" action="{{ route('admin/gift/save', ['id' => isset($gift) ? $gift->id : 0]) }}">
    @csrf

    <input type="hidden" name="gift_list_id" value="{{ $list->id }}">
    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Gift Name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', isset($gift) ? $gift->name : null) }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="description{{ isset($gift) ? $gift->id : 0 }}" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-8">
            <textarea id="description{{ isset($gift) ? $gift->id : 0 }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ old('description', isset($gift) ? $gift->description : null) }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-2 offset-md-4">
            <button type="submit" name="save" value="save" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
        @if(isset($gift))
            <div class="col-md-2">
                <button type="submit" name="delete" value="delete" class="btn btn-danger">
                    {{ __('Delete') }}
                </button>
            </div>
        @endif
    </div>
</form>

<script>
    jQuery('document').ready(function(){
        $("#description{{ isset($gift) ? $gift->id : 0 }}").summernote({
            placeholder: '{{ __('List description') }}',
            height: 200,
            focus: false
        });
    });
</script>