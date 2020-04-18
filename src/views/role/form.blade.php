<div class="form-group">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($role->name) ? $role->name : old('name')}}" required>
    <div class="invalid-feedback"> What's your name?</div>
</div>
@php
isset($role->permission) ? $permission = json_decode($role->permission) : $permission = ['nothing'];
        
@endphp
<div class="form-group">
    <label for="permission" class="control-label">{{ __('Permission') }}</label>
    @foreach (DB::table('permissions')->get() as $item)
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="permission[]" {{ in_array($item->name, $permission) ? 'checked' : '' }} value="{{$item->name}}" id="{{$loop->iteration}}">
        <label class="custom-control-label" for="{{$loop->iteration}}">{{$item->name}}</label>
        </div>
    @endforeach
    <div class="invalid-feedback"> What's your permission?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
