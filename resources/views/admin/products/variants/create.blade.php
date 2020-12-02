@extends('admin.layouts.app')

@section('title', 'Create')

@section('page-header')
    <x-page-header>
        <x-slot name='title'>
            <h4><i class="icon-plus-circle2 icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Create Variant') }}</span></h4>
        </x-slot>
        {{ Breadcrumbs::render('products.variants.create', $product) }}
    </x-page-header>
@stop

@push('js')
@endpush
@section('page-content')

    <!-- Inner container -->
    <form action="{{ route('products.variants.store', ['product' => $product]) }}" method="POST">
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
                                    <a class="text-default" data-toggle="collapse" data-target="#general">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="general">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="tax_category_id">{{ __('Tax Category') }}</label>
                                        <div class="col-lg-10">
                                            <select name="tax_category_id" id="tax_category_id" class="form-control js-select2" data-placeholder="{{ __('Select Tax Category') }}">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <x-text-field
                                        name="sku"
                                        :label="__('SKU')"
                                        required
                                    >
                                    </x-text-field>

                                    <x-text-field
                                        name="cost_price"
                                        :label="__('Cost Price')"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="price"
                                        :label="__('Price')"
                                        required
                                    >
                                    </x-text-field>

                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Option') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#option">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>
                                <div class="collapse show" id="option">
                                    @foreach($options as $option)
                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label text-lg-right" for="option_{{ $option->hash_key }}">
                                                <span class="text-danger">*</span>
                                                {{ $option->presentation }}
                                            </label>

                                            <div class="col-lg-10">
                                                <select name="option_values[{{ $option->hash_key }}]" id="option_{{ $option->hash_key }}" class="form-control js-select2 {{ $errors->has('option_values') ? 'border-danger' : null}}" data-placeholder="{{ __('Select Option') }}">
                                                    <option></option>
                                                    @foreach($option->values as $value)
                                                        <option value="{{ $value->hash_key }}">{{ $value->presentation }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('option_values'))
                                                    <span class="form-text text-danger">
                                                        {{ $errors->first('option_values') }}
                                                    </span>
                                                @endif
                                                @if ($errors->has('option_values.'.$option->hash_key))
                                                    <span class="form-text text-danger">
                                                        {{ $errors->first('option_values.'.$option->hash_key) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Shipping') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#shipping">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="shipping">
                                    <x-text-field
                                        name="weight"
                                        :label="__('Weight')"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="height"
                                        :label="__('Height')"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="width"
                                        :label="__('Width')"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="depth"
                                        :label="__('Depth')"
                                    >
                                    </x-text-field>
                                </div>
                            </fieldset>

                        </x-collapse-card>
                        <div class="d-flex justify-content-center align-items-center action" id="action-form">
                            <a href="{{ url()->previous() }}" class="btn btn-light"><i class="icon-close2 mr-2"></i>{{ __('Cancel') }}</a>
                            <div class="btn-group ml-3">
                                <button class="btn bg-success btn-block" data-loading><i class="mi-save mr-2"></i>{{ __('Save') }}</button>
                                <button class="btn bg-success dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item submit-type" data-submit_type="submit_and_back">{{ __('Save And Close') }}</a>
                                    <a href="javascript:void(0)" class="dropdown-item submit-type" data-submit_type="submit_and_create">{{ __('Save And Create New') }}</a>
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
