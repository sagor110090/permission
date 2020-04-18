<div class="form-group">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : old('name')}}" required>
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group">
    <label for="email" class="control-label">{{ __('Email') }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}" required>
    <div class="invalid-feedback"> What's your email?</div>
</div>
<div class="form-group ">
    <label for="password" class="control-label">{{ __('Password') }}</label>
    <input class="form-control" name="password" type="password" id="password" required>
    <div class="invalid-feedback"> What's your password?</div>
</div>
<div class="form-group">
    <label for="permission" class="control-label">{{ __('Permission') }}</label>
    <select class="form-control selectric" name="permission">
        @foreach (\Sagor110090\Permission\Role::all() as $item)
            <option value="{{$item->id}}"
                @if(isset($user->id))
                    @if($user->id == $item->id)  selected @endif
                @endif>
                {{$item->name}}
            </option>
        @endforeach
      </select>
 
    <div class="invalid-feedback"> What's your permission?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
