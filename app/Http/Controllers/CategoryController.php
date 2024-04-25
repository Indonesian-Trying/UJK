<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(5);

        return view('admin.categories.index', compact('category'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ]);

        // dd($validator->errors());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
            ->with('error','Something went wrong');
            
        } else {
            Category::create(['name' => $request->name]);

            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data = $category;

        return view('admin.categories.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = $category;

        return view('admin.categories.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
            ->with('error','Something went wrong');
            
        } else {
            $category->update(['name' => $request->name]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success','Category deleted successfully');
        
    }
}
