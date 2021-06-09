@csrf

<div class="form-group">
    <label for="name"> {{ __("Name") }}: </label>
    <input type="text" name="name" value="{{ $permission->name ?? old('name') }}" class="form-control" placeholder="{{ __("Name") }}:">
</div>

<div class="form-group">
    <label for="description"> {{ __("Description") }}: </label>
    <input type="text" name="description" value="{{ $permission->description ?? old('description') }}" class="form-control" placeholder="{{ __("Description") }}:">
</div>

@include('admin.includes.button_save')