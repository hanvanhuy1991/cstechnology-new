@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header fixed="true">
        <x-slot name='title'>
            <h4><i class="icon-cube icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Variants') }}</span></h4>
        </x-slot>
        <x-slot name='right'>
            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('products.variants.create', ['product' => $product]) }}" type="button" class="btn btn-info">
                        <i class="icon-plus-circle2 mr-1"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            </div>
        </x-slot>
        {{ Breadcrumbs::render('products.variants.index', $product) }}
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
        <div class="navbar navbar-light navbar-expand-lg py-lg-2 rounded-top shadow-0">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-write">
                    <i class="icon-circle-down2"></i>
                </button>
            </div>

            <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-write">
                {{ $variants->appends(request()->all())->links() }}

                <div class="navbar-text ml-lg-auto"></div>

                <div class="ml-lg-3 mb-3 mb-lg-0">
                    <x-search-form></x-search-form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-users table-lg">
                    <thead>
                    <tr>
                        <th>
                            <div class="btn-group">
                                <input type="checkbox" class="form-input-styled checkbox-all" data-fouc>
                            </div>
                        </th>
                        <th></th>
                        <th>
                            {{ __('Option') }}
                        </th>
                        <th>
                            <x-sort-link name="sku">
                                {{ __('SKU') }}
                            </x-sort-link>
                        </th>
                        <th>
                            <x-sort-link name="price">
                                {{ __('Price') }}
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
                    <tbody id="sortable">
                    @foreach($variants as $variant)
                        <tr>
                            <td class="table-inbox-checkbox">
                                <input type="checkbox" class="form-input-styled" data-fouc value="{{ $variant->hash_key }}">
                            </td>
                            <td>
                                <i class="icon-dots dragula-handle"></i>
                            </td>
                            <td>
                                @foreach($options as $id => $option)
                                    {{ $option }}: {{ $variant->optionValues->firstWhere('option_type_id', $id)->presentation ?? __('Unset') }} {{ !$loop->last ? ', ' : null }}
                                @endforeach
                            </td>
                            <td>{{ $variant->sku }}</td>
                            <td>{{ $variant->priceMain->amount }}</td>
                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                    {{ $variant->createdAt() }}
                                </div>
                            </td>
                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                    {{ $variant->updatedAt() }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('products.variants.edit', compact('product', 'variant')) }}" class="dropdown-item"><i class="icon-pencil7"></i>{{ __('Edit') }}</a>
                                            <a href="javascript:void(0)" class="dropdown-item js-delete" data-url="{{ route('products.variants.destroy', compact('product', 'variant')) }}"><i class="icon-trash"></i> {{ __('Remove') }}</a>
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
                {{ $variants->appends(request()->all())->links() }}
            </div>
        </div>

    </x-card>

@stop
