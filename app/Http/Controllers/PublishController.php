<?php

namespace App\Http\Controllers;

use App\Models\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publish = Publish::latest()->paginate(5);

        return view('admin.publish.index', compact('publish'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        // dd($validator->errors());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
            ->with('error','Something went wrong');
            
        } else {
            Publish::create(['name' => $request->name]);

            return redirect()->route('publish.index')->with('success', 'Publisher saved successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publish $publish)
    {
        $data = $publish;

        return view('admin.publish.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publish $publish)
    {
        $data = $publish;

        return view('admin.publish.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publish $publish)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()
            ->with('error','Something went wrong');
            
        } else {
            $publish->update(['name' => $request->name]);

            return redirect()->route('publish.index')->with('success', 'Publisher updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publish $publish)
    {
        $publish->delete();

        return redirect()->route('publish.index')
        ->with('success','Publisher deleted successfully');
        
    }
}
