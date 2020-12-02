@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header>
        <x-slot name='title'>
            <h4><i class="icon-plus-circle2 icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('New Product') }}</span></h4>
        </x-slot>
        {{ Breadcrumbs::render() }}
    </x-page-header>
@stop

@push('js')
    <script>
        $(function() {
            var prototypeSelect = $('#prototype_id');
            prototypeSelect.change(function() {
            var id = prototypeSelect.val();
            if (id.length) {
                let url = '/admin/prototypes/' + id + '/load-option';
                $('#product-form-prototype').load(url);
            } else {
                $('#product-form-prototype').empty();
            }
            })
            if (prototypeSelect.html() == "") {
                prototypeSelect.change();
            }
        });
    </script>
@endpush
@section('page-content')
        <!-- Inner container -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="d-flex align-items-start flex-column flex-md-row">

            <!-- Left content -->
            <div class="w-100 order-2 order-md-1 left-content">

                <div class="row">
                    <div class="col-md-12">
                        <x-collapse-card>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('General') }}
                                </legend>

                                <div class="collapse show" id="general">
                                    <x-text-field
                                        name="name"
                                        :label="__('Name')"
                                        :placeholder="__('T-Shirt')"
                                        required
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="sku"
                                        :label="__('SKU')"
                                        :placeholder="__('AR-2019')"
                                    >
                                    </x-text-field>
                                    <x-date-time-field
                                        name="available_on"
                                        :label="__('Available on')"
                                        required
                                        placeholder="03-04-2020"
                                    >
                                    </x-date-time-field>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="shipping_category_id">{{ __('Shipping Category') }}</label>

                                        <div class="col-lg-10">
                                            <select name="shipping_category_id" id="shipping_category_id" class="form-control js-select2" data-placeholder="{{ __('Select Ship Category') }}">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="prototype_id">{{ __('Prototype') }}</label>
                                        <div class="col-lg-10">
                                            <select name="prototype_id" id="prototype_id" class="form-control js-select2" data-placeholder="{{ __('Please Prototype') }}">
                                                <option></option>
                                                @foreach($prototypes as $prototype)
                                                    <option value="{{ $prototype->hash_key }}">{{ $prototype->selectText() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input type="hidden" name="status" value="0">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="status">
                                            {{ __('Status') }}
                                        </label>
                                        <div class="col-lg-10">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input id="status" name="status" value="1" type="checkbox" class="form-input-styled" data-fouc>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Pricing') }}
                                </legend>

                                <div class="collapse show" id="pricing">
                                    <x-text-field
                                        name="price"
                                        :label="__('Master price')"
                                        required
                                        placeholder="150"
                                    >
                                    </x-text-field>
                                    <div class="form-group" id="product-form-prototype">

                                    </div>
                                </div>
                            </fieldset>

                        </x-collapse-card>
                        <div class="d-flex justify-content-center align-items-center action" id="action-form">
                            <button type="button" class="btn btn-light">{{ __('Cancel') }}</button>
                            <div class="btn-group ml-3">
                                <button class="btn bg-success btn-block" data-loading><i class="mi-save mr-2"></i>{{ __('Save') }}</button>
                                <button class="btn bg-success dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">{{ __('Update and close') }}</a>
                                    <a href="#" class="dropdown-item">{{ __('Update and create new') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /left content -->


            <!-- Right sidebar component -->
            <div class="sidebar-secondary sidebar sidebar-light sidebar-component sidebar-component-right order-1 order-md-2 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">
                    <!-- Actions -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="text-uppercase font-size-sm font-weight-semibold">{{ __('Publish') }}</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                        </div>
                    </div>
                    <!-- /actions -->

                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /right sidebar component -->

        </div>
        <!-- /inner container -->
        </form>

@stop
