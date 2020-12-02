@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */

    $queryString = app(\Spatie\QueryString\QueryString::class);
@endphp

<div class="mt-3 mt-lg-0 mr-lg-3">
    <div class="btn-group">
        <a href="{{ $paginator->url(1) }}" class="btn btn-light btn-icon {{ $paginator->currentPage() == 1 ? 'disabled' : null }}">
            <i class="fas fa-angle-double-left"></i>
        </a>
        @if ($paginator->onFirstPage())
            <a href="#" class="btn btn-light btn-icon disabled">
                <i class="fas fa-angle-left"></i>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-light btn-icon">
                <i class="fas fa-angle-left"></i>
            </a>
        @endif
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                {{ $paginator->firstItem() ?? 0 }} - {{ $paginator->lastItem() }} of {{ $paginator->total() }}
            </button>
            <div class="dropdown-menu dropdown-menu-left">
                <a href="{{ $queryString->toggle('perPage', '15') }}" class="dropdown-item">15 per page</a>
                <a href="{{ $queryString->toggle('perPage', '25') }}" class="dropdown-item">25 per page</a>
                <a href="{{ $queryString->toggle('perPage', '100') }}" class="dropdown-item">100 per page</a>
                <a href="{{ $queryString->toggle('perPage', '250') }}" class="dropdown-item">250 per page</a>
            </div>
        </div>
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-light btn-icon">
                <i class="fas fa-angle-right"></i>
            </a>
        @else
            <a href="#" class="btn btn-light btn-icon disabled">
                <i class="fas fa-angle-right"></i>
            </a>
        @endif
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn btn-light btn-icon {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : null }}">
            <i class="fas fa-angle-double-right"></i>
        </a>

    </div>
</div>
