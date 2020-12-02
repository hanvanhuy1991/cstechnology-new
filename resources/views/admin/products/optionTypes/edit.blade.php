<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Edit :model', ['model' => $optionType->presentation]) }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{ route('option-types.update', $optionType->hash_key) }}" method="POST" class="form-ajax">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <x-text-field
                    name="presentation"
                    :label="__('Presentation')"
                    :placeholder="__('Eg: Color, Size')"
                    :value="$optionType->presentation"
                    required
                >

                </x-text-field>
                <button type="button" id="add-row" class="btn btn-sm btn-icon btn-info float-right">
                    <i class="icon icon-plus2"></i>
                    {{ __('Add values') }}
                </button>
                <div class="table-responsive">
                    <table class="table table-lg mb-2" id="option-values">
                        <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Display') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($optionType->values->isNotEmpty())
                                @foreach($optionType->values as $value)
                                    <tr class="value-row">
                                        <td>
                                            <div class="form-group my-0">
                                                <input type="text" placeholder="{{ __('purple, green, l, m') }}" class="form-control" name="values[{{ $loop->index }}][name]" value="{{ $value->name }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group my-0">
                                                <input type="text" class="form-control" placeholder="{{ __('#800080, #FFFFFF') }}" name="values[{{ $loop->index }}][presentation]" value="{{ $value->presentation }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="remove-row">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="value-row">
                                    <td>
                                        <div class="form-group my-0">
                                            <input type="text" placeholder="{{ __('purple, green, l, m') }}" class="form-control" name="values[0][name]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group my-0">
                                            <input type="text" class="form-control" placeholder="{{ __('#800080, #FFFFFF') }}" name="values[0][presentation]">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="remove-row">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
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
