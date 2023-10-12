<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\CategoryRequest;

use Exception;
use PDOException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = category::get();
            return response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $data = category::create($request->all());
            return response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
           
            return response()->json(['status' => true, 'data' => $category]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data failed to get','error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return response()->json(['status' => true, 'message' => 'data has been updated']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data failed to update','error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {

            $data = $category->delete();
            return response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
