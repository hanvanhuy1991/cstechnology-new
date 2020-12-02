<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request$request)
    {
        $product = Product::with('taxons', 'media')->latest()->first();
        $variants = $product->variants->load('optionValues:id,name,presentation', 'priceMain');
        $avaiableValueIds = $variants->pluck('optionValues')->flatten()->pluck('id')->unique()->toArray();
        $product->load(['optionTypes' => function ($q) use ($avaiableValueIds){
            $q->with(['values' => function ($sub) use ($avaiableValueIds){
                $sub->whereIn('id', $avaiableValueIds);
            }]);
        }]);
        $variants->transform(function ($variant) {
            return [
                'display_price' => $variant->priceMain->amount,
                'is_product_available_in_currency' => true,
                'backorderable' => true,
                'id' => $variant->hash_key,
                'sku' => $variant->sku,
                'price' => $variant->priceMain->amount,
                "in_stock" => false,
                'purchasable' => true,
                'option_values' => $variant->optionValues->transform(function ($value) {
                    return [
                        'id' => $value->hash_key,
                        'name' => $value->name,
                        'presentation' => $value->presentation
                    ];
                })->toArray()
            ];
        });
        return view('shop.products.show', compact('product', 'variants'));
    }
}
