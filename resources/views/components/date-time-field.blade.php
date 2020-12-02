<div class="form-group row">
    <label class="col-lg-2 col-form-label text-lg-right" for="{{ $name }}">
        @isset($required)
            <span class="text-danger">*</span>
        @endisset
        {{ $label }}
    </label>
    <div class="col-lg-10">
        <input
            id="{{ $name }}"
            class="datetime-picker form-control{{ $errors->has($name) ? ' border-danger' : null}}"
            {{ $attributes }}
            name="{{ $name }}"
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
