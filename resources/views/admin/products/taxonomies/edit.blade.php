@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header>
        <x-slot name='title'>
            <h4><i class="icon-pencil7 icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Edit :model', ['model' => $taxonomy->name]) }}</span></h4>
        </x-slot>
        {{ Breadcrumbs::render() }}
    </x-page-header>
@stop
@push('css')
    <style>
        .icon-md {
            font-size: 1.5rem;
        }
    </style>
@endpush

@push('js')
    <script>
        var adminTaxonomyPath = "{{ route('taxonomies.tree', $taxonomy) }}";
    </script>
    <script src="{{ mix('js/vendor/jstree.js') }}"></script>
    <script src="{{ mix('js/taxonomies_edit.js') }}"></script>
@endpush

@section('page-content')
    <!-- Inner container -->
    <form action="{{ route('taxonomies.update', $taxonomy) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex align-items-start flex-column flex-md-row">

            <!-- Left content -->
            <div class="w-100 order-2 order-md-1">

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
                                        :value="$taxonomy->name"
                                        required
                                    >
                                    </x-text-field>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">
                                    {{ __('Tree') }}
                                    <a class="text-default" data-toggle="collapse" data-target="#tree">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse show" id="tree">
                                    <div class="form-group">
                                        <div id="taxonomy-tree"></div>
                                    </div>
                                </div>
                                <div class="alert alert-info alert-styled-left alert-dismissible">
                                    * {{ __('Right click a child in the tree to access the menu for adding, deleting or sorting a child.') }}
                                </div>
                            </fieldset>
                        </x-collapse-card>
                    </div>
                </div>

            </div>
            <!-- /left content -->


            <!-- Right sidebar component -->
            <div class="sidebar-sticky w-100 w-md-auto order-1 order-md-2">
                <div class="sidebar sidebar-light sidebar-component sidebar-component-right sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="text-uppercase font-size-sm font-weight-semibold">{{ __('Publish') }}</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body text-center">
                            <form action="#">
                                <div class="btn-group">
                                    <button class="btn bg-success btn-block" data-loading><i class="mi-save mr-2"></i>{{ __('Save') }}</button>
                                    <button class="btn bg-success dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">{{ __('Update and close') }}</a>
                                        <a href="#" class="dropdown-item">{{ __('Update and create new') }}</a>
                                        <a href="#" class="dropdown-item">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /sidebar content -->
                </div>

            </div>
            <!-- /right sidebar component -->

        </div>
        <!-- /inner container -->
    </form>

@stop
