<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductsResources;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
     public function index()
    {
        $products = DB::table('products')->simplePaginate(10) ;


        return response()->json( ['products' =>ProductsResources::collection($products) , 'total_pages' =>$products->perPage()], 200);


    }
    public function getAllProducts()
    {
        $products = DB::table('products')->get();


        return response()->json( ['products' =>ProductsResources::collection($products)] , 200);


    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $data = $request->validated() ;
        $imagePath = null;

          if ($request->hasFile('image')) {
            $imagePath .=  $request->file('image')->store('images');
        }

        $data['image'] = $imagePath ??  '';
        $data['category_id'] =  1;
        // dd($data);
        Product::create($data) ;

             return response()->json(['success' => 'Product created successfully '], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found']) ;
        }
            return response()->json([
                $product ,
             ],200) ;

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {

        $data = $request->validated();

        $product = Product::findOrFail($id);

        $position = strpos($product->image, "images/");
        $path = substr($product->image, $position);
        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::delete(    $path );
            }
            $data['image'] = $request->file('image')->store('images');
        }

        $product->update($data);

        return response()->json(['success' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer',
        ]);
        Product::destroy($validated['ids']);

        return response()->json(['success' => 'Products deleted successfully.']);
    }
}