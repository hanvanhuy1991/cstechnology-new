<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Create Taxonomies') }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('taxonomies.store') }}" method="POST" class="form-ajax">
            @csrf
            <div class="modal-body">
                <x-text-field
                    name="name"
                    :label="__('Name')"
                    :placeholder="__('Eg: Categories')"
                    required
                >
                </x-text-field>
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
