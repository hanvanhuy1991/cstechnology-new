@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header fixed="true">
        <x-slot name='title'>
            <h4><i class="icon-cube icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Products') }}</span></h4>
        </x-slot>
        <x-slot name='right'>
            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('products.create') }}" type="button" class="btn btn-info">
                        <i class="icon-plus-circle2 mr-1"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            </div>
        </x-slot>
        {{ Breadcrumbs::render('products.index') }}
    </x-page-header>
@stop

@push('js')
    <script>
        Core.modalAjax.on('show.bs.modal', function() {
            $(this).find('.form-check-input-styled').uniform();
        })
    </script>
@endpush
@section('page-content')
    <x-card>
        <div class="navbar navbar-light navbar-expand-lg py-lg-2 rounded-top shadow-0 border-bottom-0">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-write">
                    <i class="icon-circle-down2"></i>
                </button>
            </div>

            <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-write">
                {{ $products->appends(request()->all())->links() }}

                <div class="mt-3 mt-lg-0 mr-lg-3">
                    <a href="{{ clear_filter("filter[trashed]") }}" type="button" class="btn btn-outline alpha-purple text-default">
                        <span class="d-none d-lg-inline-block ml-2">{{ __('Total') }}</span>
                        <span class="badge bg-primary badge-pill ml-auto">{{ $filterCount->total }}</span>
                    </a>
                    <a href="{{ filter('trashed', 'only') }}" type="button" class="btn btn-outline alpha-purple text-default {{ filter_active('trashed') ? 'active' : null }}">
                        <span class="d-none d-lg-inline-block ml-2">{{ __('Trashed') }}</span>
                        <span class="badge bg-danger badge-pill ml-auto">{{ $filterCount->trashed }}</span>
                    </a>
                </div>

                <div class="navbar-text ml-lg-auto"></div>

                <div class="ml-lg-3 mb-3 mb-lg-0">
                    <x-search-form></x-search-form>

                </div>
            </div>
        </div>
       <div class="card-body">
       <div class="table-responsive">
            <table class="table table-users">
                <thead>
                <tr>
                    <th>
                        <div class="btn-group">
                            <input type="checkbox" class="form-input-styled checkbox-all" data-fouc>
                        </div>
                    </th>
                    <th colspan="2">
                        <x-sort-link name="name">
                            {{ __('Name') }}
                        </x-sort-link>
                    </th>
                    <th>
                        <x-sort-link name="created_at">
                            {{ __('Created at') }}
                        </x-sort-link>
                    </th>
                    <th>
                        <x-sort-link name="updated_at">
                            {{ __ ('Updated at') }}
                        </x-sort-link>
                    </th>
                    <th class="text-center text-muted" style="width: 10px;"><i class="icon-checkmark3"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="table-inbox-checkbox">
                            <input type="checkbox" class="form-input-styled" data-fouc value="{{ $product->hash_key }}">
                        </td>
                        <td class="pr-0" style="width: 45px;">
                            <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->name }}" class="rounded" height="60">
                        </td>
                        <td>
                            <a href="#" class="font-weight-semibold">{{ $product->name }}</a>
                            <div class="text-muted font-size-sm">
                                {{ $product->variantMaster->sku }}
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center">
                                <i class="icon-calendar2 mr-2"></i>
                                {{ $product->createdAt() }}
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center">
                                <i class="icon-calendar2 mr-2"></i>
                                {{ $product->updatedAt() }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('products.edit', $product) }}" class="dropdown-item"><i class="icon-pencil7"></i>{{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" class="dropdown-item js-delete" data-url="{{ route('products.destroy', $product) }}"><i class="icon-trash"></i> {{ __('Remove') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex pt-3 mb-3">
            {{ $products->appends(request()->all())->links() }}
        </div>
       </div>

    </x-card>

@stop
