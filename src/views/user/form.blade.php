<div class="form-group {{ $errors->has('fname') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('First Name') }}</label>
    <input class="form-control" name="fname" type="text" id="fname" value="{{ isset($user->fname) ? $user->fname : old('fname')}}" required>
    {!! $errors->first('fname', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your first name?</div>
</div>
<div class="form-group {{ $errors->has('lname') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Last Name') }}</label>
    <input class="form-control" name="lname" type="text" id="lname" value="{{ isset($user->lname) ? $user->lname : old('lname')}}" required>
    {!! $errors->first('lname', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your last name?</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ __('Email') }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}" required>
    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your email?</div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ __('Password') }}</label>
    <input class="form-control" name="password" type="password" id="password" required>
    {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your password?</div>
</div>
<div class="form-group {{ $errors->has('permission') ? 'has-error' : ''}}">
    <label for="permission" class="control-label">{{ __('Permission') }}</label>
    <select class="form-control selectric" name="permission">
        @foreach (\Sagor110090\Permission\Role::all() as $item)
            <option value="{{$item->role}}"
                @if(isset($user->role))
                    @if($user->role == $item->name)  selected @endif
                @endif>
                {{$item->name}}
            </option>
        @endforeach
      </select>
      
    {!! $errors->first('permission', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your permission?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
