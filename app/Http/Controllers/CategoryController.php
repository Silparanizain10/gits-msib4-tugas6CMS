<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
        ]);

        $categories = Category::create([
            'name' => $request-> name,
        ]);
        return redirect()->route('category.index')->with('success','Category added successfully');
    } 
    public function edit($id)
    {
        $categories = Category::find($id);

        return view('category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $categories = Category::find($id);
        $categories->update($data);

        return redirect()->route('category.index')->with('success','Category updated successfully');
    }
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect()->route('category.index')->with('success','Category removed successfully');
    }

}
