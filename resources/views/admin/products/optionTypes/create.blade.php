<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Create option types') }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('option-types.store') }}" method="POST" class="form-ajax">
            @csrf
            <div class="modal-body">
                <x-text-field
                    name="presentation"
                    :label="__('Presentation')"
                    :placeholder="__('Eg: Color, Size')"
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
