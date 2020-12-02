<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UploadController
{
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => ['mimes:jpeg,jpg,png' , 'required', 'max:2048'],
            ],
            [
                'file.mimes' => __('File upload is invalid'),
                'file.max' => __("File too big"),
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first('file'),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $file = $request->file('file')->store('tmp/uploads');

        return response()->json([
            'file' => $file,
            'status' => true,
        ]);
    }
}
