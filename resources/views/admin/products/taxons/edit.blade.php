@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header>
        <x-slot name='title'>
            <h4><i class="icon-pencil7 icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Edit :model', ['model' => $taxon->name]) }}</span></h4>
        </x-slot>
        {{ Breadcrumbs::render() }}
    </x-page-header>
@stop

@push('js')
    <script src="{{ mix('js/vendor/dropzone.min.js') }}"></script>
    <script>
        let maxFileUpload = 1;
        Dropzone.options.taxonImages = {
            url: '{{ route('uploads') }}',
            maxFilesize: 2,
            maxFiles: maxFileUpload,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            headers: {
                'X-CSRF-TOKEN': window.Setting.csrf
            },
            success: function (file, response) {
                $('#taxon-form').append('<input type="hidden" name="new_images" value="' + response.file + '">')
                file.previewElement.classList.add("dz-success")
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.hasOwnProperty('id')) {
                } else {
                    $('#taxon-form').find('input[name="new_images"][value="' + file.name + '"]').remove()
                }
            },

            init: function () {
                var myDropzone = this;
                this.on("addedfile", function (file) {
                    file.previewElement.addEventListener("click", function () {
                        myDropzone.removeFile(file);
                    });
                    if (this.fileTracker) {
                        this.removeFile(this.fileTracker);
                    }
                    this.fileTracker = file;
                });

                @if($taxon->getMedia('main')->isNotEmpty())
                    @foreach($taxon->getMedia('main') as $key => $image)
                    let mockFile_{{$key}} = { name: '{{ $image->file_name }}', size: '{{ $image->size }}', id: '{{ $image->hash_key }}'};
                    myDropzone.displayExistingFile(mockFile_{{$key}}, '{{ $image->getFullUrl() }}');
                    @endforeach
                @endif

            }
        }
    </script>
@endpush

@section('page-content')
    <!-- Inner container -->
    <form action="{{ route('taxons.update', $taxon) }}" method="POST" id="taxon-form">
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
                                        :placeholder="__('Shirt, Men')"
                                        required
                                        :value="$taxon->name"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="slug"
                                        :label="__('Slug')"
                                        placeholder=""
                                        required
                                        :value="$taxon->slug"
                                    >
                                    </x-text-field>

                                    <x-editor-field
                                        name="description"
                                        :label="__('Description')"
                                    >
                                        {{ $taxon->description }}
                                    </x-editor-field>

                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Banner') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#banner">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="banner">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-lg-right" for="image">{{ __('Upload your image') }}</label>
                                        <div class="col-lg-10">
                                            <div class="dropzone" id="taxon-images">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('General') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#seo">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="seo">
                                    <x-text-field
                                        name="meta_title"
                                        :label="__('Meta Title')"
                                        placeholder=""
                                        :value="$taxon->meta_title"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="meta_description"
                                        :label="__('Meta Description')"
                                        placeholder=""
                                        :value="$taxon->meta_description"
                                    >
                                    </x-text-field>
                                    <x-text-field
                                        name="meta_keywords"
                                        :label="__('Meta Keywords')"
                                        placeholder=""
                                        :value="$taxon->meta_keywords"
                                    >
                                    </x-text-field>
                                </div>
                            </fieldset>

                        </x-collapse-card>
                        <div class="d-flex justify-content-center align-items-center action" id="action-form">
                            <a href="{{ url()->previous() }}" class="btn btn-light"><i class="icon-close2 mr-2"></i>{{ __('Cancel') }}</a>
                            <div class="btn-group ml-3">
                                <button class="btn bg-success btn-block" data-loading><i class="mi-save mr-2"></i>{{ __('Save') }}</button>
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
