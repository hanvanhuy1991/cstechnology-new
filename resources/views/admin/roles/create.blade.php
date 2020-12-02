<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Create role') }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('roles.store') }}" method="POST" class="form-ajax">
            @csrf
            <div class="modal-body">
            <x-text-field
                name="name"
                :placeholder="__('Admin, Member')"
                :label="__('Role Name')"
                required
            >

            </x-text-field>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="permission-group-head">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <h3>{{ __('Manage permissions') }}</h3>
                            </div>

                            <div class="col-md-8 col-sm-8">
                                <div class="btn-group permission-parent-actions float-right">
                                    <button type="button" class="btn btn-light allow-all">{{ __('Allow all') }}</button>
                                    <button type="button" class="btn btn-light deny-all">{{ __('Deny all') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($groupPermissions as $groupKey => $permissions)
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-md-12">
                        <div class="row border-bottom">
                            <div class="permission-parent-head clearfix">
                                <h5>{{ __($groupKey) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="permission-group mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="permission-group-head">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                        </div>

                                        <div class="col-md-8 col-sm-8">
                                            <div class="btn-group permission-group-actions float-right">
                                                <button type="button" class="btn btn-light allow-all">{{ __('Allow all') }}</button>
                                                <button type="button" class="btn btn-light deny-all">{{ __('Deny all') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    @foreach($permissions as $permission)
                                    <div class="permission-row">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-4">
                                                <span class="permission-label">
                                                    {{ __($permission->name)}}
                                                </span>
                                            </div>

                                            <div class="col-md-7 col-sm-8">
                                                <div class="form-group float-right mr-2">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="permissions[{{ $permission->name }}]" value="1" class="form-check-input-styled permission-allow" data-fouc>
                                                            {{ __('Allow') }}
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="permissions[{{ $permission->name }}]" value="0" checked class="form-check-input-styled permission-deny" data-fouc>
                                                            {{ __('Deny' )}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

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
