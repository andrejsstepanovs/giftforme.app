<form method="POST" action="{{ route('admin/list/save', ['id' => $list->id ?: 0 ]) }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('List Name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', isset($list) ? $list->name : null) }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right" for="visibility">{{ __('Visibility') }}</label>
        <div class="col-md-8">
            <select name="visibility" id="visibility" class="form-control{{ $errors->has('private') ? ' is-invalid' : '' }}">
                <option value="private"  {{ old('visibility', $list->visibility == 'private' ? 'selected' : '') }} >{{ __('Private') }}</option>
                <option value="public" {{ old('visibility', $list->visibility == 'public' ? 'selected' : '') }} >{{ __('Public') }}</option>
            </select>

            @if ($errors->has('private'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('private') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="listdescriptiontextarea{{ $list->id ?: 0 }}" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
        <div class="col-md-8" id="listdescriptioneditbox{{ $list->id ?: 0 }}">
            <textarea id="listdescriptiontextarea{{ $list->id ?: 0 }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ old('description', $list->description ?: null) }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-8" id="listdescriptionpreviewbox{{ $list->id ?: 0 }}">
            {!! $list->description !!}
        </div>
    </div>

    <div class="form-group row col-md-6">
        <div class="col-md-2 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
        @if(isset($list))
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
        var editBox=$("#listdescriptioneditbox{{ $list->id ?: 0 }}");
        var viewBox=$("#listdescriptionpreviewbox{{ $list->id ?: 0 }}");
        viewBox.click(function(){
            editBox.toggle();
            viewBox.toggle();
            if (editBox.is(':visible')) {
                $("#listdescriptiontextarea{{ $list->id ?: 0 }}").summernote({
                    placeholder: '{{ __('List description') }}',
                    height: 400,
                    focus: false
                });
            }
        });
    });
</script>
<style>
    #listdescriptioneditbox{{ $list->id ?: 0 }} {
        display: none;
    }
    #listdescriptionpreviewbox{{ $list->id ?: 0 }} {
        display: block;
    }
</style>