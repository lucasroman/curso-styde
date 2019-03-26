{{-- This component render a field for a form --}}
{{-- This component is useful for both the create or edit form. But for the view
to work, this one should always receive a user. Empty in the case of creating
and full in the case of editing.--}}

<div class="form-group ">
    <label for={{ $name }}>{{ $label }}</label>

    @if ($name !== 'profession_id' )
        <input type={{ $type }} class="form-control" name={{ $name }}
            id={{ $name }}
            placeholder="Enter your {{ $name }} here"
            {{-- Not show old password because show up very long --}}
            value="{{ ($name == 'password') ? '' :
                old($name, $user->$name) }}">

    @else
        <select name={{ $name }} class="form-control"
            id={{ $name }}>
            @foreach($professions as $profession)
                <option value={{ $profession->id }}
                    @if ((old('profession_id') == $profession->id) or
                        ($user->profession_id == $profession->id))
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
