@extends('admin.layouts.app')

@section('title', Breadcrumbs::pageTitle())

@section('page-header')
    <x-page-header fixed="true">
        <x-slot name='title'>
            <h4><i class="icon-equalizer icon-2x mr-2"></i> <span class="font-weight-semibold">{{ __('Option Types') }}</span></h4>
        </x-slot>
        <x-slot name='right'>
            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <button data-url="{{ route('option-types.create') }}" id="button-create" type="button" class="btn btn-info" >
                        <i class="icon-plus-circle2 mr-1"></i>
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </x-slot>
        {{ Breadcrumbs::render('option-types.index') }}
    </x-page-header>
@stop

@push('js')
    <script src="{{ mix('js/option_types_index.js') }}"></script>
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

                {{ $optionTypes->appends(request()->all())->links() }}

                <div class="navbar-text ml-lg-auto"></div>

                <div class="ml-lg-3 mb-3 mb-lg-0">
                    <x-search-form></x-search-form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-optionstable-lg">
                    <thead>
                    <tr>
                        <th>
                            <div class="btn-group">
                                <input type="checkbox" class="form-input-styled checkbox-all" data-fouc>
                            </div>
                        </th>
                        <th></th>
                        <th>
                            <x-sort-link name="name">
                                {{ __('Option type name') }}
                            </x-sort-link>
                        </th>
                        <th>
                            <x-sort-link name="presentation">
                                {{ __('Presentation') }}
                            </x-sort-link>
                        </th>
                        <th>
                            <x-sort-link name="position">
                                {{ __('Position') }}
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
                    @foreach($optionTypes as $option)
                        <tr>
                            <td class="table-inbox-checkbox">
                                <input type="checkbox" class="form-input-styled" data-fouc value="{{ $option->hash_key }}">
                            </td>
                            <td>
                                <i class="icon-dots dragula-handle"></i>
                            </td>
                            <td>{{ $option->name }}</td>
                            <td>{{ $option->presentation }}</td>
                            <td>{{ $option->position }}</td>
                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                    {{ $option->createdAt() }}
                                </div>
                            </td>
                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                    {{ $option->updatedAt() }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item js-edit" data-url="{{ route('option-types.edit', $option->hash_key) }}"><i class="icon-pencil7"></i>{{ __('Edit') }}</a>
                                            <a href="javascript:void(0)" class="dropdown-item js-delete" data-url="{{ route('option-types.destroy', $option->hash_key) }}"><i class="icon-trash"></i> {{ __('Remove') }}</a>
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
                {{ $optionTypes->appends(request()->all())->links() }}
            </div>
        </div>

    </x-card>

@stop