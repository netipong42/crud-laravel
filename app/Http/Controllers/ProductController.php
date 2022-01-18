<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view("products.index")->with("products", $products);
    }


    public function create()
    {
        $types = Type::all();
        return view("products.create")->with("types", $types);
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'price' => 'required',
                'stock' => 'required',
                'img_file' => 'required|mimes:jpeg,png,jpg|max:2048',
                'type_id' => 'required'
            ],
            [
                // name
                'name.required' => 'required name',
                'name.max' => 'max 20 keyword',
                // price
                'price.required' => 'required price',
                // stock
                'stock.required' => 'required stock',
                // img
                'img_file.required' => 'required img',
                'img_file.mimes' => 'file type jpeg,png.jpg',
                'img_file.max' => 'size max 2048 mb',
                // type
                'type_id.required' => 'required type',
            ]
        );

        $file = Storage::disk('public')->put('images', $request->img_file);
        $test = $request->all();
        $test['img'] = $file;
        unset($test['img_file']);
        $products = Product::create($test);
        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $types = Type::all();
        return view("products.edit")
            ->with("product", $product)
            ->with("types", $types);
    }


    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'price' => 'required',
                'stock' => 'required',
                'img_file' => 'mimes:jpeg,png,jpg|max:2048',
                'type_id' => 'required'
            ],
            [
                // name
                'name.required' => 'required name',
                'name.max' => 'max 20 keyword',
                // price
                'price.required' => 'required price',
                // stock
                'stock.required' => 'required stock',
                // img
                'img_file.mimes' => 'file type jpeg,png.jpg',
                'img_file.max' => 'size max 2048 mb',
                // type
                'type_id.required' => 'required type',
            ]
        );
        $prepareData = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'type_id' => $request->type_id
        ];
        if ($request->img_file) {
            $file = Storage::disk('public')->put('images', $request->img_file);
            $prepareData['img'] = $file;
        }
        $products = Product::find($product->id);
        if ($products->img && $request->img_file) {
            unlink('storage/' . $products->img);
        }
        $products->update($prepareData);
        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $products = Product::find($product->id);
        if ($product->img) {
            unlink('storage/' . $products->img);
        }
        $products->delete();
        return redirect()->route('products.index');
    }
}
