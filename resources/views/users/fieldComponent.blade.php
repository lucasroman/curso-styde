<div class="form-group col-sm-6">
    <label for={{ $name }}>{{ $label }}</label>
    @if ($name !== 'profession_id' )
        <input type={{ $type }} class="form-control" name={{ $name }} id={{ $name }}
            placeholder="Enter your {{ $name }} here" value="{{ old($name) }}">
    @else
        <select name={{ $name }} class="form-control"
            id={{ $name }}>
            @foreach($professions as $profession)
                <option value={{ $profession->id }}
                    {{-- Keep the profession entered previously --}}
                    @if (old('profession_id') == $profession->id)
                        selected
                    @endif>
                    {{ $profession->title }}
                </option>
            @endforeach
        </select><br>
    @endif

    {{-- Show error message in the field --}}
    @if ($errors->has($name))
        <br>
        <div class="alert alert-danger">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
