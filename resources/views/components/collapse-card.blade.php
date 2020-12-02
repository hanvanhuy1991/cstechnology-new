<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{{ $title ?? null }}</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
