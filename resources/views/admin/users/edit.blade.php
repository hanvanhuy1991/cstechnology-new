<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Edit :model', ['model' => $user->email]) }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('users.update', $user->hash_key) }}" method="POST" class="form-ajax">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <x-text-field
                    name="first_name"
                    :placeholder="__('Micheal')"
                    :label="__('First name')"
                    :value="$user->first_name"
                    required
                >
                </x-text-field>

                <x-text-field
                    name="last_name"
                    :placeholder="__('Feo')"
                    :label="__('Last name')"
                    :value="$user->last_name"
                    required
                >
                </x-text-field>
                <x-text-field
                    name="email"
                    :placeholder="__('example@gmail.com')"
                    :label="__('Email')"
                    type="email"
                    :value="$user->email"
                    required
                >
                </x-text-field>

                <x-text-field
                    name="password"
                    placeholder="********"
                    :label="__('Enter password')"
                    type="password"
                >
                </x-text-field>

                <x-text-field
                    name="password_confirmation"
                    placeholder="********"
                    :label="__('Repeat your password')"
                    type="password"
                >
                </x-text-field>
                <div class="form-group row">
                    <label for="roles" class="col-lg-2 col-form-label text-lg-right">
                        <span class="text-danger">*</span>
                        {{ __('Roles') }}
                    </label>
                    <div class="col-lg-10">
                        <select id="roles" class="form-control-select2 js-select2" name="roles" data-placeholder="{{ __('Select Role') }}">
                            <option></option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'selected': null }}>{{ __($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">
                    <i class="icon-close2 mr-2"></i>
                    {{ __('Close') }}
                </button>
                <button type="submit" id="button-submit" class="btn bg-success">
                    <i class="mi-save mr-2"></i>{{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</div>
