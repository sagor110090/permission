<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input  class="form-control" name="name" type="text" {{ isset($role->name) ?? ($role->name == 'Super Admin') ?? 'disabled'  }} id="name" value="{{ isset($role->name) ? $role->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<?php

if (isset($role->permission)) {
    ($role->permission)!='null'  ? $permission = json_decode($role->permission) : $permission = ['nothing'];
}else{
    $permission = ['nothing'];
}
?>
<div class="form-group {{ $errors->has('permission') ? 'has-error' : ''}}">
    <label for="permission" class="control-label">{{ __('Permission') }}</label>
    @foreach (DB::table('permissions')->get() as $item)

        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="permission[]" {{ in_array($item->name, $permission) ? 'checked' : '' }} value="{{$item->name}}" id="{{$loop->iteration}}">
        <label class="custom-control-label" for="{{$loop->iteration}}">{{$item->name}}</label>
        </div>
    @endforeach
    {!! $errors->first('permission', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your permission?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
