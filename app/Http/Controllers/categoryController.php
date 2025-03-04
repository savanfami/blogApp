<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $allCategory= categories::all();
        return view('categories.index',compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->input('name');
        $category=new categories();
        $category->name=$name;
        $category->save();

        return redirect()->back()->with('status', 'Category created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $cat)
    {
        $currentCatId=$cat->id;
        $editCat=categories::where('id',$currentCatId)->first();
        return view('categories.edit',compact('editCat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categories $cat)
    {
       
        $request->validate([
            'name' => 'required|string',
        ]);

        $name = $request->input('name');
        $cat->name=$name;
        $cat->save();

        return redirect()->back()->with('status', 'category updated Successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $cat)
    {
        $cat->delete();
        return redirect()->route('categories.index')->with('status', 'category deleted Successfully');
    }
}
