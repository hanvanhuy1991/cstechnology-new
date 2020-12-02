@php
    $currentSearchQuery = request()->get('filter')['search'] ?? null;
@endphp
<form action="{{ request()->url() }}" method="GET">
    <div class="form-group-feedback form-group-feedback-right">
        <input id="filter[search]" type="search" name="filter[search]" value="{{ $currentSearchQuery }}" class="form-control wmin-200" placeholder="{{ __('Search') }}...">
        <div class="form-control-feedback">
            <i class="icon-search4 font-size-base text-muted"></i>
        </div>
    </div>
</form>
