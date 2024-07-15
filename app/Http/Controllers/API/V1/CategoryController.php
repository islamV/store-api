<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResources;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get() ;
        return response()->json(CategoryResources::collection($categories), 200);

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request) ;
        $category =  Category::create($request->validated()) ;

             return response()->json(['success' => 'Category created successfully '], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found']) ;
        }
            return response()->json($category,200) ;

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = Category::find($id) ;
        if (!$category) {
            return response()->json(['error' => 'Category not found'] ,404) ;
        }
            $category->name = $request->name ;
            $category->save() ;
            return response()->json(['success' => 'Category updated successfully ']) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $category = Category::find($id) ;
        if (!$category) {
            return response()->json(['error' => 'Category not found'] , 404) ;
        }
              Category::destroy($id) ;
            return response()->json(['success' => 'Category Deleted successfully '],) ;

    }

}