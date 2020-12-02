<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OptionTypeStoreRequest;
use App\Http\Requests\Admin\OptionTypeUpdateRequest;
use App\OptionType;
use App\OptionValue;
use App\Queries\OptionTypeQuery;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class OptionTypeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionTypeQuery = new OptionTypeQuery(OptionType::query());

        return view('admin.products.optionTypes.index', [
            'optionTypes' => $optionTypeQuery->paginate(request('perPage')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.optionTypes.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionTypeStoreRequest $request)
    {
        $optionType = OptionType::create($request->validated());
        Alert::success(__('Option Type ":model" has been successfully created!', ['model' => $optionType->presentation]))->flash();

        return response()->json(['status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(OptionType $optionType)
    {
        $optionType->load('values');

        return view('admin.products.optionTypes.edit', compact('optionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(OptionTypeUpdateRequest $request, OptionType $optionType)
    {
        $optionType->update($request->validated());
        $updatedOptions = [];
        foreach ($request->input('values') as $optionValue) {
            $value = OptionValue::updateOrCreate(
                ['name' => $optionValue['name'], 'option_type_id' => $optionType->id],
                ['presentation' => $optionValue['presentation']]
            );
            $updatedOptions[] = $value->id;
        }
        OptionValue::where('option_type_id', $optionType->id)->whereNotIn('id', $updatedOptions)->delete();

        Alert::success(__('Option Type ":model" has been successfully updated!', ['model' => $optionType->presentation]))->flash();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(OptionType $optionType)
    {
        $optionType->values->each->delete();
        $optionType->delete();
        Alert::success(__('Option Type ":model" has been successfully deleted!', ['model' => $optionType->presentation]))->flash();

        return response()->json(['status' => true]);
    }

    public function sortHandle(Request $request)
    {
        $sortedIds = decodeArray($request->ids, OptionType::class);
        $minPosition = OptionType::whereIn('id', $sortedIds)->min('position');
        OptionType::setNewOrder($sortedIds, $minPosition);

        return response()->json([
            'status' => true,
            'url' => route('option-types.index'),
        ]);
    }
}
