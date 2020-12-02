@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header>
        <x-slot name='title'>
            <h4><i class="icon-pencil7 icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Update :model', ['model' => $product->name]) }}</span></h4>
        </x-slot>
        {{ Breadcrumbs::render() }}
    </x-page-header>
@stop

@push('js')
    <script src="{{ mix('js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ mix('js/editor.js') }}"></script>
    <script>

        Core.ready(function () {
            setTaxonSelect('#taxons');
        });

        let maxFileUpload = 8;
        Dropzone.options.productImages = {
            url: '{{ route('uploads') }}',
            maxFilesize: 2,
            maxFiles: maxFileUpload,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            headers: {
                'X-CSRF-TOKEN': window.Setting.csrf
            },
            success: function (file, response) {
                $('#product-form').append('<input type="hidden" name="new_images[]" value="' + response.file + '">')
                file.previewElement.classList.add("dz-success")
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.hasOwnProperty('id')) {
                    $('#product-form').find('input[name="images[]"][value="' + file.id + '"]').remove()
                } else {
                    $('#product-form').find('input[name="new_images[]"][value="' + file.name + '"]').remove()
                }
            },

            init: function () {
                var myDropzone = this;
                this.on("addedfile", function(file) {
                    file.previewElement.addEventListener("click", function() {
                        myDropzone.removeFile(file);
                    });
                });
                @if($product->getMedia('images')->isNotEmpty())
                    @foreach($product->getMedia('images') as $key => $image)
                        let mockFile_{{$key}} = { name: '{{ $image->file_name }}', size: '{{ $image->size }}', id: '{{ $image->hash_key }}'};
                        myDropzone.displayExistingFile(mockFile_{{$key}}, '{{ $image->getFullUrl('thumb') }}');
                        $('#product-form').append('<input type="hidden" name="images[]" value="{{ $image->hash_key }}">');
                    @endforeach
                @endif
                let fileCountOnServer = '{{ $product->getMedia('images')->count() }}';
                myDropzone.options.maxFiles = myDropzone.options.maxFiles - fileCountOnServer;
                myDropzone.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                    error('Max file reached');
                });
            }
        }
    </script>
@endpush
@section('page-content')
        <!-- Inner container -->
        <form action="{{ route('products.update', $product) }}" method="POST" id="product-form">
            @csrf
            @method('PUT')
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
                                    <x-text-field
                                        name="name"
                                        :label="__('Name')"
                                        :placeholder="__('T-Shirt')"
                                        required
                                        :value="$product->name"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="sku"
                                        :label="__('SKU')"
                                        :placeholder="__('AR-2019')"
                                        :value="$product->variantMaster->sku"
                                    >
                                    </x-text-field>
                                    <x-editor-field
                                        name="description"
                                        :label="__('Description')"
                                    >
                                        {{ $product->description }}
                                    </x-editor-field>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="shipping_category_id">{{ __('Shipping Category') }}</label>
                                        <div class="col-lg-10">
                                            <select name="shipping_category_id" id="shipping_category_id" class="form-control js-select2" data-placeholder="{{ __('Please select') }}">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="tax_category_id">{{ __('Tax Category') }}</label>
                                        <div class="col-lg-10">
                                            <select name="tax_category_id" id="tax_category_id" class="form-control js-select2" data-placeholder="{{ __('Select Tax Category') }}">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="taxons">{{ __('Taxons') }}</label>
                                        <div class="col-lg-10">
                                            <select name="taxons[]" id="taxons" class="form-control" multiple>
                                                @foreach($product->taxons as $taxon)
                                                    <option value="{{ $taxon->hash_key }}" selected="selected">{{ $taxon->selectText() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <x-date-time-field
                                        name="available_on"
                                        :label="__('Available on')"
                                        required
                                        placeholder="03-04-2020"
                                        :value="$product->available_on"
                                    >
                                    </x-date-time-field>
                                    <x-date-time-field
                                        name="discontinue_on"
                                        :label="__('Discontinue on')"
                                        placeholder="03-04-2020"
                                        :value="$product->discontinue_on"
                                    >
                                    </x-date-time-field>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Images') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#images">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="images">
                                    <div class="form-group">
                                        <label for="image">{{ __('Upload your image') }}</label>
                                        <div class="dropzone" id="product-images">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Pricing') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#pricing">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="pricing">
                                    <x-text-field
                                        name="price"
                                        :label="__('Master price')"
                                        required
                                        placeholder="150"
                                        :value="$product->variantMaster->priceMain->amount"
                                    >
                                    </x-text-field>

                                    <x-text-field
                                        name="cost_price"
                                        :label="__('Cost price')"
                                        placeholder="150"
                                        :value="$product->variantMaster->cost_price"
                                    >
                                    </x-text-field>

                                    <div class="form-group row">
                                        <input type="hidden" name="promotionable" value="0">
                                        <label class="col-lg-2 col-form-label text-lg-right">
                                            {{ __('Promotionable') }}
                                        </label>
                                        <div class="col-lg-10">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input name="promotionable" value="1" type="checkbox" class="form-check-input-styled" {{ $product->isPromotionable() ? 'checked' : null }} data-fouc>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input type="hidden" name="status" value="0">
                                        <label class="col-lg-2 col-form-label text-lg-right">
                                            {{ __('Status') }}
                                        </label>
                                        <div class="col-lg-10">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input name="status" value="1" type="checkbox" class="form-input-styled" {{ $product->status == 1 ? 'checked' : null }} data-fouc>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Seo') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#seo">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="seo">
                                    <x-text-field
                                        name="meta_title"
                                        :label="__('Meta title')"
                                        placeholder="..."
                                        :value="$product->meta_title"
                                    >
                                    </x-text-field>

                                    <x-text-field
                                        name="meta_description"
                                        :label="__('Meta description')"
                                        placeholder="..."
                                        :value="$product->meta_description"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="meta_keywords"
                                        :label="__('Meta keywords')"
                                        placeholder="..."
                                        :value="$product->meta_keywords"
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
            <div class="sidebar-sticky w-100 w-md-auto order-1 order-md-2">
                <div class="sidebar sidebar-light sidebar-component sidebar-component-right sidebar-expand-md">
                    <!-- Sidebar content -->
                    <div class="sidebar-content">
                        <!-- Actions -->
                        <div class="card">
                            <div class="card-body p-0">
                                <ul class="nav nav-sidebar" data-nav-type="accordion">
                                    <li class="nav-item">
                                        <a href="{{ route('products.edit', $product) }}" class="nav-link {{ request()->route()->getName() == 'products.edit' ? 'active' : null }}"><i class="icon-pencil"></i> {{ __('Details') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('products.variants.index', $product) }}" class="nav-link"><i class="icon-grid5"></i> {{ __('Variants') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-list3"></i> {{ __('Properties') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-home2"></i> {{ __('Stock') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /actions -->

                    </div>
                    <!-- /sidebar content -->
                </div>
            </div>
            <!-- /right sidebar component -->

        </div>
        <!-- /inner container -->
        </form>

@stop
