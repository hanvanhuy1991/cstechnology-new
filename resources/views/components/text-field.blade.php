<div class="form-group row">
    <label class="col-lg-2 col-form-label text-lg-right" for="{{ $name }}">
        @if($required)
            <span class="text-danger">*</span>
        @endif
        {{ $label }}
    </label>
    <div class="col-lg-10">
        <input
            id="{{ $name }}"
            class="form-control{{ $errors->has($name) ? ' border-danger' : null}}"
            {{ $attributes->merge(['value' => old($name) ?? $attributes['value']]) }}
            name="{{ $name }}"
            {{ $required ? 'required' : null }}
        >
        @if($icon)
            <div class="form-control-feedback">
                <i class="{{ $icon }} text-muted"></i>
            </div>
        @endif
        @if ($errors->has($name))
            <span class="form-text text-danger">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>

</div>
