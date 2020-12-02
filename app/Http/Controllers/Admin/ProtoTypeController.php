<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PrototypeStoreRequest;
use App\Http\Requests\Admin\PrototypeUpdateRequest;
use App\OptionType;
use App\Prototype;
use App\Queries\PrototypeQuery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Prologue\Alerts\Facades\Alert;

class ProtoTypeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prototypes = new PrototypeQuery(Prototype::query());

        return view('admin.products.prototypes.index', [
            'prototypes' => $prototypes->paginate(request('perPage')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionTypes = OptionType::forSelect();

        return view('admin.products.prototypes.create', compact('optionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrototypeStoreRequest $request)
    {
        $prototype = Prototype::create($request->validated());
        $prototype->optionTypes()->sync($request->optionTypes());
        $prototype->taxons()->sync($request->taxons());
        Alert::success(__('Prototype ":model" has been successfully created!', ['model' => $prototype->presentation]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Prototype $prototype)
    {
        $optionTypes = OptionType::forSelect();
        $prototype->load(
            [
            'optionTypes',
            'taxons' => function ($q) {
                $q->with(['ancestors' => function ($sub) {
                    $sub->breadthFirst();
                }]);
            }, ]
        );

        return view('admin.products.prototypes.edit', compact('prototype', 'optionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PrototypeUpdateRequest $request, Prototype $prototype)
    {
        $prototype->update($request->validated());
        $prototype->optionTypes()->sync($request->optionTypes());
        $prototype->taxons()->sync($request->taxons());
        Alert::success(__('Prototype ":model" has been successfully updated!', ['model' => $prototype->presentation]))->flash();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prototype $prototype)
    {
        $prototype->optionTypes()->sync([]);
        $prototype->delete();
        Alert::success(__('Prototype ":model" has been successfully deleted!', ['model' => $prototype->presentation]))->flash();

        return response()->json(['status' => true]);
    }

    public function loadOption(Prototype $prototype, Request $request)
    {
        $options = $prototype->optionTypes;
        if ($options->isNotEmpty()) {
            $options->load('values');

            return view('admin.products.prototypes.ajaxOption', compact('options'))->render();
        }

        return new Response();
    }
}
