<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Edit :model', ['model' => $prototype->presentation]) }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('prototypes.update', $prototype->hash_key) }}" method="POST" class="form-ajax">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <x-text-field
                    name="presentation"
                    :label="__('Presentation')"
                    :placeholder="__('Eg: Shoe, Shirt')"
                    :value="$prototype->presentation"
                    required
                >
                </x-text-field>

                <div class="form-group row">
                    <label for="option-types" class="col-lg-2 col-form-label text-lg-right">{{ __('Option Types') }}</label>
                    @php $selectedOption = $prototype->optionTypes->pluck('hash_key')->toArray() @endphp
                    <div class="col-lg-10">
                        <select multiple id="option-types" class="form-control-select2 js-select2" name="option_types[]" data-placeholder="{{ __('Please select') }}" data-dropdown-parent="#modal-ajax">
                            @foreach($optionTypes as $option)
                                <option value="{{ $option->hash_key }}" {{ in_array($option->hash_key, $selectedOption) ? 'selected' : null }}>
                                {{ $option->selectText() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="taxons" class="col-lg-2 col-form-label text-lg-right">{{ __('Taxons') }}</label>
                    <div class="col-lg-10">
                        <select multiple id="taxons" class="form-control-select2 js-select2" name="taxons[]" data-placeholder="{{ __('Please select') }}" data-dropdown-parent="#modal-ajax">
                            @foreach($prototype->taxons as $taxon)
                                <option value="{{ $taxon->hash_key }}" selected>
                                    {{ $taxon->selectText() }}
                                </option>
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
<script>
    (function($){
        setTaxonSelect('#taxons');
        $('#option-types').select2({
            width: '100%'
        });
    })(jQuery);
</script>
