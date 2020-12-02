<div class="form-group row">
    <label class="col-lg-2 col-form-label text-lg-right" for="{{ $name }}">
        @if($required)
            <span class="text-danger">*</span>
        @endif
        {{ $label }}
    </label>
    <div class="col-lg-10">
        <textarea name="{{ $name }}" class="form-control wysiwyg {{ $class ?? null }}" id="{{ $name }}" rows="3">
            {{ $slot }}
        </textarea>
    </div>
</div>
