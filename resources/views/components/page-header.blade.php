<div class="page-header border-bottom-0 {{ $fixed ? 'page-fixed' : null }}" id="page-header">

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                {{ $title }}
            </div>
            {{ $right ?? null }}
        </div>

        {{ $slot }}
    </div>
</div>

