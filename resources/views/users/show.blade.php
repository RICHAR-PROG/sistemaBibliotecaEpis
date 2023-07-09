<input type="hidden" name="id" value="{{ $usuarios->id }}">

<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $usuarios->name }}">
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('institutional mail') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ $usuarios->email }}">
    </div>
</div>


<div class="row mb-3">
    <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>

    <div class="col-md-6">
        <input id="ID" type="text" class="form-control" name="ID" placeholder="DNI" value="{{ $usuarios->dni }}">
    </div>
</div>

<div class="row mb-3">
    <label for="type_user" class="col-md-4 col-form-label text-md-end">{{ __('User type') }}</label>

    <div class="col-md-6">
        <select name="type_user">
            <option value="admin" {{ $usuarios->type_user == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $usuarios->type_user == 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Actualizar') }}
        </button>
    </div>
</div>
